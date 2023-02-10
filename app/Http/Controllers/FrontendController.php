<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\Cart;
use App\Models\User;
use Midtrans\Config;
use App\Models\Address;
use App\Models\Product;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Support\Str;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use App\Helper\SettingHelper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\UpdatePasswordRequest;

class FrontendController extends Controller
{
    public function list()
    {
        // $data = Product::all();
        $data = Product::with('category')->orderBy('category_id')->get()->groupBy(function($data) { return $data->category->name; });
        // foreach($products as $name => $product) {
        //     foreach($product as $item) {
        //         $data = $item;
        //     }
        // }
        $response = [
            'success' => true,
            'products' => $data,
            'message' => 'success',
        ];
        return response()->json($response, 200);
    }

    public function index()
    {
        $data['title'] = NULL;
        $data['categories'] = Category::all();
        $data['items'] = Product::latest('id')->get();
        $data['favorite'] = Product::where('favorite', 'true')->paginate(4);
        $data['products'] = Product::with('category')->orderBy('category_id')->get()->groupBy(function($data) { return $data->category->name; });
        // foreach($data['products'] as $name => $product) {
        //     echo '<ul>';
        //         echo '<li>' . $name . '</li>';

        //         echo '<ul>';
        //         foreach($product as $item) {
        //             echo '<li>Item: ' . $item->name . '</li>';
        //         }
        //         echo '</ul>';

        //     echo '</ul>';
        // }
        // dd($data['products']);
        return view('frontend.index', $data);
    }

    public function category($id)
    {
        $data['title'] = 'Instant Order';
        $data['favorite'] = Product::where('favorite', 'true')->paginate(4);
        $data['products'] = Product::with('category')->orderBy('category_id')->get()->groupBy(function($data) { return $data->category->name; });
        return view('frontend.category', $data);
    }

    public function akun()
    {
        $data['title'] = 'Ubah Profile';
        return view('frontend.akun', $data);
    }

    public function update_akun(Request $request)
    {
        $data = User::findOrFail(Auth::user()->id);
        $data->firstname = $request->firstname;
        $data->lastname = $request->lastname;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->save();

        if($data != NULL) {
            Alert::success('Berhasil Ubah Profil');
            return back();
        } else {
            Alert::error('Gagal Ubah Profil');
            return back();
        }
    }

    public function password()
    {
        $data['title'] = 'Ubah Password';
        return view('frontend.password', $data);
    }

    public function update_password(UpdatePasswordRequest $request)
    {
        $request->user()->update([
            'password' => Hash::make($request->get('password'))
        ]);

        Alert::success('Password Anda Berhasil di Ganti');
        return back();
    }

    public function riwayat()
    {
        $data['title'] = 'Riwayat';
        $data['instan'] = Transaction::with('customer','address')->where('customer_id', Auth::user()->id)->where('type', 'instan')->latest('id')->get();
        $data['katering'] = Transaction::with('customer','address')->where('customer_id', Auth::user()->id)->where('type', 'katering')->latest('id')->get();
        return view('frontend.riwayat', $data);
    }

    public function bantuan()
    {
        $data['title'] = 'Bantuan';
        return view('frontend.bantuan', $data);
    }

    public function review()
    {
        $data['title'] = 'Nilai dan Ulasan';
        return view('frontend.review', $data);
    }

    public function post_cart(Request $request)
    {
        $atr = Cart::with('product', 'customer')->where([
			['customer_id', Auth::user()->id],
			['product_id', $request->product_id],
            ['type', $request->type],
		])->first();

		$qty = $request->qty == NULL ? 1 : $request->qty;
		$new = false;
		if (!$atr) {
			$atr = new Cart();
			$new = true;
		}

        $atr->customer_id = Auth::user()->id;
        $atr->product_id = $request->product_id;
        $atr->type = $request->type;

        if ($new) {
            $atr->qty = $qty;
        } else {
            $atr->qty = $atr->qty + $qty;
        }

        $data = Address::with('user')->where([
            ['user_id', Auth::user()->id],
            ['type', 'UTAMA'],
        ])->first();

        if ($data == NULL || empty($data)) {
            Alert::warning('Data Alamat Anda Kosong!');
            return redirect()->route('fe.alamat');
        }

        $tr = Transaction::with('customer')->where([
            ['customer_id', Auth::user()->id],
            ['status', 'PENDING'],
            ['type', $request->type],
        ])->first();

        if ($request->type == 'instan') {
            $tgl_pesanan = $request->tgl_pesanan == NULL ? Carbon::now() : $request->tgl_pesanan;
        } else {
            $tgl_pesanan = $request->tgl_pesanan == NULL ? Carbon::now()->addDay() : $request->tgl_pesanan;
        }

        $new = false;
        if (!$tr) {
            $tr = new Transaction();
            $new = true;
        }

        $tr->address_id = $data->id;
        if ($new) {
            $tr->kode_transaksi = 'TRX-' . mt_rand(00000, 99999).time();
            $tr->customer_id = Auth::user()->id;
            $tr->type = $request->type;
            $tr->tgl_pesanan = $tgl_pesanan;
        } else {
            $tr->tgl_pesanan = $tgl_pesanan;
        }
        $tr->save();

        $atr->save();

        Alert::success('Data Berhasil Ditambahkan');
        return back();
    }

    public function update_cart(Request $request, $id)
    {
        $atr = Cart::findOrFail($id);

        $atr->qty = $request->qty;
        $atr->update();

        Alert::success('Data Berhasil Diubah');
        return back();
    }

    public function minus(Request $request, $id)
    {
        $atr = Cart::findOrFail($id);

        if ($request->qty == 0) {
            Cart::destroy($id);
        } else {
            $atr->qty = $request->qty;
            $atr->save();
        }

        Alert::success('Data Berhasil Diubah');
        return back();
    }

    public function plus(Request $request, $id)
    {
        $atr = Cart::findOrFail($id);

        $atr->qty = $request->qty;
        $atr->save();

        Alert::success('Data Berhasil Diubah');
        return back();
    }

    public function delete_cart($id)
    {
        Cart::destroy($id);

        Alert::success('Data Berhasil Dihapus');
        return back();
    }

    public function update_note(Request $request, $id)
    {
        // dd($request->all());
        $atr = Transaction::with('customer')->where([
			['customer_id', Auth::user()->id],
			['status', 'PENDING'],
            ['type', $request->type],
            ['id', $id],
		])->first();

        $atr->note = $request->note;
        // dd($atr->address);
        $atr->update();

        Alert::success('Data Note Berhasil Diubah');
        return back();
    }

    // public function pay(Request $request, $id)
    // {
    //     Config::$serverKey = config('services.midtrans.serverKey');
    //     Config::$isProduction = config('services.midtrans.isProduction');
    //     Config::$isSanitized = config('services.midtrans.isSanitized');
    //     Config::$is3ds = config('services.midtrans.is3ds');

    //     // dd($request->all());
    //     // $atr = Transaction::with('customer')->where([
	// 	// 	['customer_id', Auth::user()->id],
	// 	// 	['status', 'PENDING'],
    //     //     ['type', $request->type],
    //     //     ['id', $request->id],
	// 	// ])->latest('id')->first();
    //     $atr = Transaction::with('customer')->find($id);
    //     $atr->total_harga = (int) $request->total_harga;
    //     $atr->status = 'PROSES';
    //     $atr->snap_token = $request->snap_token == NULL ? mt_rand(00000, 99999).time() : $request->snap_token;
    //     $atr->update();

    //     $carts = Cart::with('product')->where('customer_id', Auth::user()->id)->get();
    //     foreach ($carts as $item) {

    //         $op = new OrderProduct;
    //         $op->transaction_id = $atr->id;
    //         $op->product_id = $item->product->id;
    //         $op->qty = $item->qty == NULL ? 1 : $item->qty;
    //         $atr->type = $request->type;
    //         $op->save();

    //         Cart::destroy($item->id);
    //     }

    //     Alert::success('Silahkan Segera Proses Pembayaran Anda!');
    //     return redirect()->route('fe.invoice', $atr->id);
    // }

    public function pay(Request $request, $id)
    {
        $atr = Transaction::with('customer')->find($id);
        $atr->total_harga = (int) $request->total_harga;
        $atr->status = 'PROSES';
        $atr->snap_token = $request->snap_token == NULL ? mt_rand(00000, 99999).time() : $request->snap_token;
        $atr->type = $request->type;
        $atr->update();
        $carts = Cart::with('product')->where('customer_id', Auth::user()->id)->get();
        foreach ($carts as $cart) {

            $op = new OrderProduct;
            $op->transaction_id = $atr->id;
            $op->product_id = $cart->product->id;
            $op->qty = $cart->qty == NULL ? 1 : $cart->qty;
            $op->save();

            Cart::destroy($cart->id);
        }

        $transaction = Transaction::find($id);
        $orders = $transaction->order_product;
        $customer = $transaction->customer;

        //Set Your server key
        Config::$serverKey = SettingHelper::midtrans_api();
        // Uncomment for production environment
        // Config::$isProduction = true;
        Config::$isSanitized = Config::$is3ds = true;
        Config::$overrideNotifUrl = route('midtrans_notify');

        $transaction_details = array(
            'order_id' => $transaction->kode_transaksi,
            'gross_amount' => round($transaction->total_harga),
        );

        $item_details = [];
        foreach($orders as $order) {
            $product = $order->product;
            $item = array(
                'id' => $product->id,
                'price' => $product->price+$product->price*(10/100),
                'quantity' => $order->qty,
                'name' => $product->name
            );
            array_push($item_details, $item);
        }

        // Optional
        // $billing_address = array(
        //     'first_name'    => "Andri",
        //     'last_name'     => "Litani",
        //     'address'       => "Mangga 20",
        //     'city'          => "Jakarta",
        //     'postal_code'   => "16602",
        //     'phone'         => "081122334455",
        //     'country_code'  => 'IDN'
        // );

        // Optional
        // $shipping_address = array(
        //     'first_name'    => "Obet",
        //     'last_name'     => "Supriadi",
        //     'address'       => "Manggis 90",
        //     'city'          => "Jakarta",
        //     'postal_code'   => "16601",
        //     'phone'         => "08113366345",
        //     'country_code'  => 'IDN'
        // );

        $customer_details = array(
            'first_name'    => $customer->firstname,
            'last_name'     => $customer->lastname,
            'email'         => $customer->email,
            'phone'         => $customer->phone,
        );

        // Optional, remove this to display all available payment methods
        // $enable_payments = array('credit_card','cimb_clicks','mandiri_clickpay','echannel');

        $params = [
            'transaction_details' => $transaction_details,
            'item_details' => $item_details,
            'customer_details' => $customer_details,
            'callbacks' => [
                'finish' => route('payments_finish')
            ]
        ];

        try {
          // Get Snap Payment Page URL
          $paymentUrl = \Midtrans\Snap::createTransaction($params)->redirect_url;
          return redirect($paymentUrl);
        }
        catch (Exception $e) {
            return dd($e->getMessage());
        }
    }

    public function invoice(Request $request, $id)
    {
        $data['transaksi'] = Transaction::with('customer')->where([
			['customer_id', Auth::user()->id],
            ['id', $id],
		])->latest('id')->first();
        $data['items'] = OrderProduct::where('transaction_id', $data['transaksi']->id)->get();

        return view('frontend.invoice', $data);
    }

    public function midtrans_notify(Request $request)
    {
        // dd($request->all());
        $transaction = $request->transaction_status;
        $order_id = $request->order_id;
        $status_code = $request->status_code;
        $gross_amount = $request->gross_amount;
        $serverkey = SettingHelper::midtrans_api();
        $generate_signature = hash('sha512',$order_id.$status_code.$gross_amount.$serverkey);
        $signature = $request->signature_key;
        if($generate_signature != $signature) {
            return 'Request Invalid';
        }

        $trx = Transaction::firstWhere('kode_transaksi', $order_id);
        $status_code = $trx->update([
            'payment_status' => 2,
            'status' => 'SUCCESS'
        ]);

        if($trx->payment_status == 2) {
            return 'Transaksi sudah dibayar!';
        }

        function success($order_id, $trx) {
            $trx->update([
                'payment_status' => 2,
                'status' => 'SUCCESS'
            ]);
            if($trx) {
                return 'success';
            } else {
                return 'failed/error';
            }
        }

        if ($transaction == 'capture') {
            return success($order_id, $trx);
        } else if ($transaction == 'settlement') {
            // TODO set payment status in merchant's database to 'Settlement'
            return success($order_id, $trx);
        } else if ($transaction == 'pending') {
            // TODO set payment status in merchant's database to 'Pending'
            $trx->update([
                'payment_status' => 1,
                'status' => 'PENDING',
            ]);
        } else if ($transaction == 'expire') {
            // TODO set payment status in merchant's database to 'expire'
            $trx->update([
                'payment_status' => 3,
                'status' => 'CANCEL',
            ]);
        }
    }

    public function payments_finish(Request $request) {
        // return dd('Pembayaran sedang diproses');
        $data['transaksi'] = Transaction::with('customer', 'order_product')->where([
			['customer_id', Auth::user()->id],
            ['kode_transaksi', $request->order_id,],
            // ['status', Str::upper($request->transaction_status)],
        ])->first();
        // dd($data['transaksi']);

        // $data['items'] = $data['transaksi']->order_product;
        // $data['items'] = OrderProduct::where('transaction_id', $data['transaksi']->id)->get();

        return view('frontend.invoice', $data);
    }

    public function midtrans_pays(Request $request) {
        // return dd('Pembayaran sedang diproses');
        $data['transaksi'] = Transaction::with('customer', 'order_product')->where([
            ['id', $request->order_id,],
            // ['kode_transaksi', $request->order_id,],
            // ['status', Str::upper($request->transaction_status)],
        ])->first();
        // dd($data['transaksi']);
        $data['transaksi']->update([
            'payment_status' => 2,
            'status' => 'SUCCESS'
        ]);

        // $data['items'] = $data['transaksi']->order_product;
        // $data['items'] = OrderProduct::where('transaction_id', $data['transaksi']->id)->get();

        return back();
    }

    public function invoices(Request $request) {
        // return dd('Pembayaran sedang diproses');
        $data['transaksi'] = Transaction::with('customer', 'order_product')->where([
            ['id', $request->order_id,],
        ])->first();

        return view('frontend.invoice', $data);
    }
}
