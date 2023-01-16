<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Address;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class InstanController extends Controller
{
    public function instan()
    {
        $data['title'] = 'Instant Order';
        $data['products'] = Product::with('category')->orderBy('category_id')->get()->groupBy(function($data) { return $data->category->name; });
        return view('frontend.instant', $data);
    }

    public function resto_instan()
    {
        $data['title'] = 'Resto Instan Order';
        $data['products'] = Product::with('category')->orderBy('category_id')->get()->groupBy(function($data) { return $data->category->name; });
        return view('frontend.resto_instan', $data);
    }

    public function cart_instan()
    {
        $data['title'] = 'Keranjang Instan Order';
        $data['items'] = Cart::with('product', 'customer')->where([
            ['customer_id', Auth::user()->id],
			['type', 'instan'],
		])->get();
        $data['adr'] = Transaction::with('customer', 'address')->where([
			['customer_id', Auth::user()->id],
			['type', 'instan'],
		])->first();
        $data['address'] = Address::with('user')->where([
			['user_id', Auth::user()->id],
		])->get();
        // dd($data['address']->all());
        $data['total'] = 0;
        foreach ($data['items'] as $item) {
            $data['total'] += $item['qty']*$item['product']->price;
        }
        if ($data['adr'] == NULL) {
            Alert::warning('Keranjang Kosong, Silahkan Tentukan Tanggal Terlebih dahulu!');
            return redirect()->route('fe.resto_instan');
        } else {
            return view('frontend.cart_instan', $data);
        }
    }
}
