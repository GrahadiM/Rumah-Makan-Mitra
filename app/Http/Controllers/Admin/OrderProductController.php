<?php

namespace App\Http\Controllers\Admin;

use App\Models\Clothes;
use App\Models\Transaction;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.order_products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        $dt = new OrderProduct;
        $dt->transaction_id = $request->tr_id;
        $dt->name = $request->name;
        $dt->qty = $request->qty;
        $dt->detail = $request->detail;
        $dt->created_at = now();
        $dt->save();

        return redirect()->route('admin.order_products.show', $request->tr_id)
                        ->with('success','Transaction created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request ,$id)
    {
        $data['tr'] = Transaction::find($id);
        $data['data'] = OrderProduct::where('transaction_id', $id)->get();
        return view('admin.order_products.index', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tr = Transaction::find($id);
        return view('admin.order_products.edit',compact('tr'));
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
        $tr = OrderProduct::find($id);
        $tr->delete();
        return redirect()->back()->with('success','Transaction deleted successfully.');
    }
}
