<?php

namespace App\Http\Controllers;

use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use Carbon\Carbon;
use App\Models\Cart;
use App\Models\User;
use App\Models\Address;
use App\Models\Product;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\UpdatePasswordRequest;
use App\Models\OrderProduct;

class FrontendController extends Controller
{
    public function list()
    {
        $products = Product::with('category')->orderBy('category_id')->get()->groupBy(function($data) { return $data->category->name; });
        foreach($products as $name => $product) {
            foreach($product as $item) {
                $data = $item;
            }
        }
        $response = [
            'success' => true,
            'data'    => $data,
            'message' => 'success',
        ];
        return response()->json($response, 200);
    }

    public function index()
    {
        $data['title'] = NULL;
        $data['categories'] = Category::all();
        $data['items'] = Product::latest('id')->get();
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
        return view('frontend.index', $data);
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
        $data['instan'] = Transaction::with('customer','address')->where('type', 'instan')->latest('id')->get();
        $data['katering'] = Transaction::with('customer','address')->where('type', 'katering')->latest('id')->get();
        return view('frontend.riwayat', $data);
    }

    public function bantuan()
    {
        $data['title'] = 'Bantuan';
        return view('frontend.bantuan', $data);
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

    public function pay(Request $request, $id)
    {
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        // dd($request->all());
        // $atr = Transaction::with('customer')->where([
		// 	['customer_id', Auth::user()->id],
		// 	['status', 'PENDING'],
        //     ['type', $request->type],
        //     ['id', $request->id],
		// ])->latest('id')->first();
        $atr = Transaction::with('customer')->find($id);
        $atr->total_harga = (int) $request->total_harga;
        $atr->status = 'PROSES';
        $atr->snap_token = $request->snap_token == NULL ? mt_rand(00000, 99999).time() : $request->snap_token;
        $atr->update();

        $carts = Cart::with('product')->where('customer_id', Auth::user()->id)->get();
        foreach ($carts as $item) {

            $op = new OrderProduct;
            $op->transaction_id = $atr->id;
            $op->product_id = $item->product->id;
            $op->qty = $item->qty == NULL ? 1 : $item->qty;
            $atr->type = $request->type;
            $op->save();

            Cart::destroy($item->id);
        }

        Alert::success('Silahkan Segera Proses Pembayaran Anda!');
        return redirect()->route('fe.invoice', $atr->id);
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
}
