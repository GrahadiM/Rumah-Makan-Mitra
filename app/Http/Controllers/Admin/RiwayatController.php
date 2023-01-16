<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RiwayatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd($request->all());
        $day = Carbon::now()->format('d');
        $month = Carbon::now()->addMonth(1)->format('m');
        $year = Carbon::now()->format('Y');
        if ($request->day) {
            $data['data'] = Transaction::whereDate($day);
        } elseif ($request->month) {
            $data['data'] = Transaction::with('customer')->where('MONTH(tgl_penjemputan)', $month )->latest('id')->get();
        } elseif ($request->year) {
            $data['data'] = Transaction::with('customer')->where('YEAR(tgl_penjemputan)', $year )->latest('id')->get();
        } else {
            $data['data'] = Transaction::with('customer')->latest('id')->get();
        }

        $data['total'] = 0;
        foreach ($data['data'] as $item) {
            $data['total'] += $item->total;
        }
        return view('admin.riwayat.index', $data, [
            'day' => $day,
            'month' => $month,
            'year' => $year,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
