<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AddressController extends Controller
{

    public function alamat()
    {
        // $data['provinces'] = Province::all();
        // $data['regencies'] = Regency::all();
        // $data['districts'] = District::all();
        // $data['villages'] = Village::all();
        $data['title'] = 'Alamat';
        $data['items'] = Address::all();
        return view('frontend.alamat', $data);
    }

    public function post_alamat(Request $request)
    {
        // dd($request->all());
        $data = Address::with('user', 'customer')->where([
			['user_id', Auth::user()->id],
			['type', 'UTAMA'],
		])->first();

		$new = false;
		if (!$data) {
            $new = true;
		}

        $atr = new Address;
        $atr->user_id = Auth::user()->id;
        $atr->title = strtoupper($request->title);
        $atr->name = $request->name;
        $atr->wa = $request->wa;
        $atr->phone = $request->phone;
        $atr->address = $request->address;
        $atr->provinsi = strtoupper($request->provinsi);
        $atr->kabupaten = strtoupper($request->kabupaten);
        $atr->kecamatan = strtoupper($request->kecamatan);
        $atr->pos = $request->pos;

        if ($new) {
            $atr->type = 'UTAMA';
        } else {
            $atr->type = 'UMUM';
        }

        $atr->save();

        Alert::success('Alamat Anda Berhasil di Tambahkan!');
        return back();
    }

    public function update_alamat(Request $request)
    {
        // dd($request->all());
        $atr = Address::with('user', 'customer')->where([
			['id', $request->id],
			['user_id', Auth::user()->id],
		])->first();

        $atr->user_id = Auth::user()->id;
        $atr->title = strtoupper($request->title);
        $atr->name = $request->name;
        $atr->wa = $request->wa;
        $atr->phone = $request->phone;
        $atr->address = $request->address;
        $atr->provinsi = strtoupper($request->provinsi);
        $atr->kabupaten = strtoupper($request->kabupaten);
        $atr->kecamatan = strtoupper($request->kecamatan);
        $atr->pos = $request->pos;
        $atr->save();

        Alert::success('Alamat Anda Berhasil di Ubah!');
        return back();
    }

    public function delete_alamat(Request $request)
    {
        $atr = Address::where([
			['id', $request->id],
			['user_id', Auth::user()->id],
		])->first();

        $atr->delete();

        Alert::success('Alamat Anda Berhasil di Hapus!');
        return back();
    }

    public function set_alamat(Request $request)
    {
        // dd($request->all());
        $atr = Address::with('user', 'customer')->where([
			['id', $request->id],
			['user_id', Auth::user()->id],
			['type', 'UMUM'],
		])->first();

        $data = Address::with('user', 'customer')->where([
			['user_id', Auth::user()->id],
			['type', 'UTAMA'],
		])->first();

        // if ($request->type == 'UTAMA') {
        //     $data->type = 'UMUM';
        //     $data->save();
        // }
        if ($request->type == 'UMUM') {
            if (!empty($data)) {
                $data->type = 'UMUM';
                $data->save();
            }
            $atr->type = 'UTAMA';
            $atr->save();
        }

        Alert::success('Alamat Anda Berhasil di Ubah Menjadi Utama!');
        return back();
    }

    public function update_address(Request $request, $id)
    {
        $atr = Transaction::with('customer')->where([
			['customer_id', Auth::user()->id],
			['status', 'PENDING'],
			['type', $request->type],
		])->first();
        // dd($atr);

        $atr->address_id = $request->address;
        $atr->update();

        Alert::success('Data Alamat Berhasil Diubah');
        return back();
    }
}
