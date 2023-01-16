<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionMiddleware
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
        $tr = Transaction::with('customer')->where([
			['customer_id', Auth::user()->id],
			['status', 'PENDING'],
			// ['id', $id],
		])->first();
        if (!$tr) {
            return redirect()->route('fe.alamat');
        }
        return $next($request);
    }
}
