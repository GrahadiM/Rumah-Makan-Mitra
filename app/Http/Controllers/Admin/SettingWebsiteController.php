<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SettingWebsite;
use Illuminate\Support\Facades\Storage;

class SettingWebsiteController extends Controller
{
    public function index()
    {
        $setting = SettingWebsite::get()->first();
        // dd($setting->logo);
        return view('admin.setting-website.update', compact('setting'));
    }

    public function update(Request $request, SettingWebsite $setting)
    {
        $this->validate($request, [
            'logo' => 'nullable|image|mimes:jpg,png,jpeg|max:2000',
            'favicon' => 'nullable|mimes:jpg,png,jpeg,ico|max:1000',
            'title_web' => 'required|string|max:100',
            'footer_web' => 'required|string|max:150',
            'version_web' => 'nullable|string',
            'wa' => 'required|numeric',
            'phone' => 'required|numeric',
            'mail' => 'required|string',
            'address' => 'required|string',
            'working_hours' => 'nullable|string',
            'desc_footer' => 'nullable|string',
        ]);

        $data = $request->only(['title_web', 'footer_web', 'version_web', 'wa', 'phone', 'mail', 'address', 'working_hours', 'desc_footer']);

        if($request->hasFile('logo')){
            $logo = $this->uploadGambar($request->logo);

            if($setting->logo != "logo_default.png"){
                Storage::disk('local')->delete($setting->logo);
            }

            $data['logo'] = $logo;
        }

        if($request->hasFile('favicon')){
            $favicon = $this->uploadGambar($request->favicon);

            if($setting->favicon != "favicon_default.ico"){
                Storage::disk('local')->delete($setting->favicon);
            }

            $data['favicon'] = $favicon;
        }

        // dd($data);
        $setting = SettingWebsite::get()->first();
        $setting->update($data);

        session()->flash('success', "Data has been updated!!");

        //redirect user
        return redirect()->back();
    }

    public function uploadGambar($gambar)
    {
        $path = implode('/', [ 'public', 'images', 'setting' ] );
        return Storage::disk('local')->putFile($path, $gambar);
        // return $gambar->getClientOriginalName();
    }
}
