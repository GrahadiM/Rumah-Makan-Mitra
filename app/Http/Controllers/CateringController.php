<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Address;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class CateringController extends Controller
{
    public function catering()
    {
        $data['title'] = 'Katering';
        $data['favorite'] = Product::where('favorite', 'true')->paginate(4);
        $data['products'] = Product::with('category')->orderBy('category_id')->get()->groupBy(function($data) { return $data->category->name; });
        return view('frontend.catering', $data);
    }

    public function resto_catering()
    {
        $data['title'] = 'Resto Katering';
        $data['products'] = Product::with('category')->orderBy('category_id')->get()->groupBy(function($data) { return $data->category->name; });
        return view('frontend.resto_catering', $data);
    }

    public function cart_catering()
    {
        $data['title'] = 'Keranjang Katering';
        $data['items'] = Cart::with('product', 'customer')->where([
			['customer_id', Auth::user()->id],
			['type', 'katering'],
		])->get();
        $data['adr'] = Transaction::with('customer', 'address')->where([
			['customer_id', Auth::user()->id],
			['type', 'katering'],
			['status', 'PENDING'],
		])->first();
        $data['address'] = Address::with('user')->where([
			['user_id', Auth::user()->id],
		])->get();
        // dd($data['adr']);
        $data['total'] = 0;
        foreach ($data['items'] as $item) {
            $data['total'] += $item['qty']*$item['product']->price;
        }
        if ($data['adr'] == NULL) {
            Alert::warning('Keranjang Kosong, Silahkan Tentukan Tanggal Terlebih dahulu!');
            return redirect()->route('fe.resto_catering');
        } else {
            return view('frontend.cart_catering', $data);
        }
    }

    public function post_catering(Request $request)
    {
        // dd(Carbon::now()->addDay());
        $data = Address::with('user')->where([
			['user_id', Auth::user()->id],
			['type', 'UTAMA'],
		])->first();

        if ($data == NULL || empty($data)) {
            Alert::warning('Data Alamat Anda Kosong!');
            return redirect()->route('fe.alamat');
        }

        $atr = Transaction::with('customer')->where([
			['customer_id', Auth::user()->id],
			['type', $request->type],
		])->first();

		$tgl_pesanan = $request->tgl_pesanan == NULL ? Carbon::now()->addDay() : $request->tgl_pesanan;
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

        Alert::success('Data Berhasil Ditambahkan');
        return back();
    }

    public function update_catering(Request $request)
    {
        dd($request->all());
        $atr = Transaction::with('customer')->where([
			['customer_id', Auth::user()->id],
			['status', 'PENDING'],
		])->first();

        $atr->tgl_pesanan = $request->tgl_pesanan;
        $atr->update();

        Alert::success('Data Berhasil Diubah');
        return back();
    }
}
