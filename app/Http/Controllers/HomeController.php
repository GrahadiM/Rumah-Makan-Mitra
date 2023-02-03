<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tr = Address::where([
            ['user_id', Auth::user()->id],
            ['type', 'UTAMA'],
        ])->get();
        if (auth()->user()->hasRole('admin')) {
            return view('admin.dashboard.index',[
                'title' => 'Dashboard',
                'user' => User::all()->count(),
            ]);
        }
        elseif (auth()->user()->hasRole('customer')) {
            if (empty($tr) || $tr == NULL) {
                return redirect()->route('fe.alamat');
            } else {
                return redirect()->route('fe.index');
            }
        }
        else {
            return redirect()->route('fe.index');
        }
    }
}
