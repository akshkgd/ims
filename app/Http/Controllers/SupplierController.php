<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::where('status', 1)->get();
        return view('supplier.index', compact('suppliers'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supplier.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $a = new Supplier();
        $a->name = $request->name;
        $a->save();
        session()->flash('alert-warning',  'Supplier Added');
        return redirect('/supplier');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $supplier = Supplier:: findorFail($id);
        return view('supplier.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $supplier)
    {
        $supplier = Crypt::decrypt($supplier);
     $a = Supplier::findorFail($supplier);
     $a->name = $request->name;
     $a->save();
     session()->flash('alert-warning',  'Supplier Updated');
     return redirect('/supplier');
    }
    public function del( $id)
    {
        $id = Crypt::decrypt($id);
        $a = Supplier::findorFail($id);
        $a->status = 0;
        $a->save();
        session()->flash('alert-warning',  'Supplier Removed');
        return redirect('/supplier');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        //
    }
}
