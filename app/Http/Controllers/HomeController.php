<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Address;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\OrderProduct;
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

            $total = 0;
            $products = Product::with('order_product')->orderBy('id')->get()->groupBy(function($data) { return $data->qty; });;
            $data = OrderProduct::with('product')->orderBy('product_id')->get()->groupBy(function($data) { return $data->product->id; });
            // dd($data);
            // foreach($data as $qty => $product) {
            //     foreach($product as $item) {
            //         if ($item->product_id == $item->product->id) {
            //             $total += $item->qty;
            //         }
            //     }
            // }

            // DONUT CHART
            // $chart1 = Transaction::where('status', 'SUCCESS')->sum('total_harga');
            // $success = number_format($chart1, 0, '', '.');
            // $chart2 = Transaction::where('status', 'PENDING')->sum('total_harga');
            // $pending = number_format($chart2, 0, '', '.');
            // $chart3 = Transaction::where('status', 'PROSES')->sum('total_harga');
            // $proses = number_format($chart3, 0, '', '.');
            // $chart4 = Transaction::whereNotIn('status', ['SUCCESS','PENDING','PROSES'])->sum('total_harga');
            // $fail = number_format($chart4, 0, '', '.');

            // PIE CHART
            $success = Transaction::where('status', 'SUCCESS')->sum('total_harga');
            $pending = Transaction::where('status', 'PENDING')->sum('total_harga');
            $proses = Transaction::where('status', 'PROSES')->sum('total_harga');
            $fail = Transaction::whereNotIn('status', ['SUCCESS','PENDING','PROSES'])->sum('total_harga');

            return view('admin.dashboard.index',[
                'title' => 'Dashboard',
                'products' => $products,
                'data' => $data,
                'total' => $total,
                'user' => User::all()->count(),
                'transaction' => Transaction::where('status', 'SUCCESS')->get()->count(),
                'money' => Transaction::where('status', 'SUCCESS')->sum('total_harga'),
                'success' => $success,
                'pending' => $pending,
                'proses' => $proses,
                'fail' => $fail,
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
