<?php

namespace App\Http\Controllers;

use App\Department;
use App\Distribution;
use App\PurchaseDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class DistributionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $distributionDetails = Distribution::latest()->paginate(30);
        return view('distribution.index', compact('distributionDetails'))->with('i', (request()->input('page', 1) - 1) * 30);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::where('status', 1)->get();
        return view('distribution.add', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $a = new Distribution();

        $a->purchase_order_number = $request->purchase_order_number;
        $purchase = PurchaseDetails::where('purchase_order_number', $request->purchase_order_number)->first();
        $b = $purchase->product_id;
        $a->product_id = $b;
        $a->department_id = $request->department_id;
        $a->date_of_issue = $request->date_of_issue;
        $a->quantity = $request->quantity;
        $a->save();
        session()->flash('alert-success',  'Details Added!!');
        return redirect('/distribution');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Distribution  $distribution
     * @return \Illuminate\Http\Response
     */
    public function show(Distribution $distribution)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Distribution  $distribution
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $distribution = Distribution::findorFail($id);
        $departments = Department::where('status', 1)->get();
        return view('distribution.edit', compact('distribution', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Distribution  $distribution
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $distribution)
    {
        $distribution = Crypt::decrypt($distribution);
        $a = Distribution::findorFail($distribution);
        if ($request->old_pon == $request->purchase_order_number) {
            $a->purchase_order_number = $request->purchase_order_number;
        } else {
            $temp = PurchaseDetails::where('purchase_order_number', $request->purchase_order_number)->get();
            if ($temp->count() > 0) {
                $a->purchase_order_number = $request->purchase_order_number;
            } else {
                return redirect('distribution')->with('alert-danger', 'Purchase Order number does not exist.');
            }
        }
        if ($request->department_id == "") {
            $a->department_id = $request->old_did;
        } else {
            $a->department_id = $request->department_id;
        }

        $a->date_of_issue = $request->date_of_issue;
        $a->quantity = $request->quantity;
        $a->save();
        session()->flash('alert-warning',  'Details Updated');
        return redirect('/distribution');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Distribution  $distribution
     * @return \Illuminate\Http\Response
     */
    public function destroy($distribution)
    {
        $a = Distribution::findorFail($distribution);
        Distribution::destroy($a->id);
        return redirect('/distribution')->with('alert-warning', 'Data Deleted!!');
    }
}
