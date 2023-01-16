<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Support\Facades\Auth;

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

        return redirect()->back()->with('success', 'Upload photo profile berhasil ditambahkan!');
    }

    public function password(UpdatePasswordRequest $request)
    {
        $request->user()->update([
            'password' => Hash::make($request->get('password'))
        ]);

        return redirect()->route('profile.edit')->with('success', 'Password berhasil diupdate!');
    }
}
