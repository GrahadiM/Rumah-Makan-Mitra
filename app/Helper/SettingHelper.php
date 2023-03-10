<?php

namespace App\Helper;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingHelper
{
    public static function getSetting()
    {
        $settings = \App\Models\SettingWebsite::get()->first();
        return $settings;
    }

    public static function getDisable()
    {
        $start = '00:00:00';
        $end = '24:00:00';
        $button = Carbon::now()->between($start, $end) ? NULL : 'disabled';
        return $button;
    }

    public static function getDay()
    {
        $day = \App\Models\Transaction::with('customer')->where([
			['customer_id', Auth::user()->id],
			['status', 'PENDING'],
			['type', 'katering'],
		])->latest('id')->first();

        // $today = $day->tgl_pesanan;
        // $dd = Carbon::parse($today)->format('d');
        // $mm = Carbon::parse($today)->format('M');
        // $yyyy = Carbon::parse($today)->format('Y');
        // $hh = Carbon::parse($today)->format('H');
        // $m = Carbon::parse($today)->format('i');

        // $tgl_pesanan = $yyyy.'-'.$mm.'-'.$dd.'T'.$hh.':'.$m;
        // return $tgl_pesanan;

        // $day = \App\Models\Transaction::where('customer_id', Auth()->user()->id)->where('status', 'Pending')->where('tgl_penerimaan', '=', NULL)->latest('id')->get()->first();
        return $day;
    }

    public static function getTransaction()
    {
        $data_tr = \App\Models\Transaction::with('customer')->where([
			['customer_id', Auth::user()->id],
			['status', 'PENDING'],
			// ['id', $id],
		])->first();
        // $data_tr = \App\Models\Transaction::where('customer_id', Auth()->user()->id)->where('status', 'Pending')->where('tgl_penerimaan', '=', NULL)->latest('id')->get()->first();
        return $data_tr;
    }

    public function upload(Request $request)
    {
        // Snippet Code for Validation Image Start
        $request->validate([
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        // Snippet Code End

        if ($avatar = $request->file('avatar')) {
            $destinationPath = 'images/avatar/';
            $profileImage = date('YmdHis') . "." . $avatar->getClientOriginalExtension();
            $avatar->move($destinationPath, $profileImage);
            $input['avatar'] = $profileImage;
            $user = User::findOrFail(Auth::user()->id);
            $user->update($input);
        }

        return redirect()->back()->with('success', 'Upload photo profile berhasil ditambahkan!');
    }

    public function getTotal(Request $request, $total)
    {
        $total_price = $total+($total*(10/100));
        return $total_price;
    }

    public static function midtrans_api()
    {
        $midtrans_sanbox     = env('MIDTRANS_SANDBOX');
        $midtrans_production = env('MIDTRANS_PRODUCTION');
        $midtrans_mode       = env('MIDTRANS_MODE');

        if($midtrans_mode == 'sanbox'){
            return $midtrans_sanbox;
        }
        if($midtrans_mode == 'production'){
            return $midtrans_production;
        }
    }
}
