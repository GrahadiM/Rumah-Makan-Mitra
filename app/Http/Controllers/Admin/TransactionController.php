<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Transaction::with('customer','package','employe','category')->latest('id')->get();
        return view('admin.transactions.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.transactions.create');
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
            'cost' => 'required',
            'status' => 'required',
        ]);

        $dt = new Transaction;
        $dt->cost = $request->cost;
        $dt->status = $request->status;
        $dt->created_at = now();
        $dt->save();

        return redirect()->route('admin.transactions.index')
                        ->with('success','Transaction created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dt = Transaction::find($id);
        return view('admin.transactions.show',compact('dt'));
    }

    public function detail($id)
    {
        $dt = Transaction::find($id);
        return view('admin.transactions.show',compact('dt'));
    }

    public function status($id)
    {
        $dt = Transaction::find($id);
        $categories = Category::all();
        return view('admin.transactions.status',compact('dt','categories'));
    }

    public function status_update(Request $request, $id)
    {
        request()->validate([
            'status' => 'required',
        ]);
        $dt = Transaction::find($id);
        $dt->status = $request->status;
        $dt->created_at = now();
        $dt->update();

        return redirect()->route('admin.transactions.index')
                        ->with('success','Transaction updated successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dt = Transaction::find($id);
        $categories = Category::all();
        return view('admin.transactions.edit',compact('dt','categories'));
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
        request()->validate([
            'cost' => 'required',
            'status' => 'required',
        ]);
        $dt = Transaction::find($id);
        $dt->cost = $request->cost;
        $dt->status = $request->status;
        $dt->tgl_penerimaan = now();
        // $dt->tgl_pengambilan = $request->tgl_pengambilan;
        $dt->update();

        return redirect()->route('admin.transactions.index')
                        ->with('success','Transaction updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dt = Transaction::find($id);
        $dt->delete();

        return redirect()->route('admin.transactions.index')
                        ->with('success','Transaction deleted successfully');
    }
}
