<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\UpdatePasswordRequest;

class ProfileController extends Controller
{
    public function edit(Request $request)
    {
        return view('admin.profile.edit', [
            'user' => $request->user
        ]);
    }

    public function update(UpdateProfileRequest $request)
    {
        $request->user()->update(
            $request->all()
        );

        return redirect()->route('profile.edit')->with('success', 'Profile berhasil diupdate!');
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
            Auth::user()->update($input);
        }

        Alert::success('Data Profile Berhasil Diubah');
        return redirect()->back();
    }

    public function password(UpdatePasswordRequest $request)
    {
        $request->user()->update([
            'password' => Hash::make($request->get('password'))
        ]);

        return redirect()->route('profile.edit')->with('success', 'Password berhasil diupdate!');
    }
}
