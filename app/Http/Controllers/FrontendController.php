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
        return response() -> json(['status' => 200, 'posts' => $data]);
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

        if($data != null) {
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
		])->first();

		$qty = $request->qty == null ? 1 : $request->qty;
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

        if ($request->type == 'instan') {
            $data = Address::with('user')->where([
                ['user_id', Auth::user()->id],
                ['type', 'UTAMA'],
            ])->first();

            $atr = Transaction::with('customer')->where([
                ['customer_id', Auth::user()->id],
                ['type', $request->type],
            ])->first();

            $tgl_pesanan = $request->tgl_pesanan == null ? Carbon::now()->addDay() : $request->tgl_pesanan;
            $new = false;
            if (!$atr) {
                $atr = new Transaction();
                $new = true;
            }

            $atr->address_id = $data->id;
            if ($new) {
                $atr->kode_transaksi = 'TRX-' . mt_rand(00000, 99999);
                $atr->customer_id = Auth::user()->id;
                $atr->type = $request->type;
                $atr->tgl_pesanan = $tgl_pesanan;
            } else {
                $atr->tgl_pesanan = $tgl_pesanan;
            }
            $atr->save();
        }

        $atr->save();

        return redirect()->back()->with('Sukses', 'Data Berhasil Ditambahkan');
    }

    public function update_cart(Request $request, $id)
    {
        $atr = Cart::findOrFail($id);

        $atr->qty = $request->qty;
        $atr->update();

        return back()->with('Sukses', 'Data Berhasil Diubah');
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

        return back()->with('Sukses', 'Data Berhasil Diubah');
    }

    public function plus(Request $request, $id)
    {
        $atr = Cart::findOrFail($id);

        $atr->qty = $request->qty;
        $atr->save();

        return back()->with('Sukses', 'Data Berhasil Diubah');
    }

    public function delete_cart($id)
    {
        Cart::destroy($id);

        return back()->with('Sukses', 'Data Berhasil Dihapus');
    }

    public function update_note(Request $request, $id)
    {
        $atr = Transaction::with('customer')->where([
			['customer_id', Auth::user()->id],
			['status', 'PENDING'],
			// ['id', $id],
		])->first();

        $atr->address_id = $request->address;
        // dd($atr->address);
        $atr->update();

        Alert::success('Data Note Berhasil Diubah');
        return back();
    }
}
