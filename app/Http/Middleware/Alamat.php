<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Alamat
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $tr = Address::where([
            ['user_id', Auth::user()->id],
            ['type', 'UTAMA'],
        ])->get();
        if (!$tr || empty($tr) || $tr == NULL) {
            return redirect()->route('fe.alamat');
        }
        return $next($request);
    }
}
