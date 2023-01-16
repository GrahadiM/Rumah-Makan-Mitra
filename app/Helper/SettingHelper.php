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
        $start = '09:00:00';
        $end = '21:00:00';
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
}
