<?php

namespace App\Http\Controllers;

use App\Department;
use App\Distribution;
use App\Product;
use DB;
use App\PurchaseDetails;
use App\Supplier;
use  App\Http\Controllers\test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class PurchaseDetailsController extends Controller
{

    public function index()
    {
        $purchase_details = PurchaseDetails::latest()->paginate(30);
        return view('purchase.index', compact('purchase_details'))->with('i', (request()->input('page', 1) - 1) * 30);;
    }


    public function create()
    {
        $products = Product::where('status', 1)->get();
        $suppliers = Supplier::where('status', 1)->get();
        $departments = Department::where('status', 1)->get();
        return view('purchase.add', compact('products', 'suppliers', 'departments'));
    }


    public function store(Request $request)
    {
        // $request->validate([
        //     'department_id' => 'required',

        // ]);
        //     if(Product::find($request->product_id)->where('status', 1)){
        //     $this-> purchase_details($request);


        // }

        //     return back();
        $a = new PurchaseDetails();
        $a->product_id = $request->product_id;
        $a->date_of_purchase = $request->date_of_purchase;
        $a->supplier_id = $request->supplier_id;
        $a->invoice_number = $request->invoice_number;
        $a->purchase_order_number = $request->purchase_order_number;
        $a->quantity_purchased = $request->quantity_purchased;
        $a->rate_per_unit = $request->rate_per_unit;
        $a->total = $request->rate_per_unit * $request->quantity_purchased;
        $a->process_adopted = $request->process_adopted;
        $a->date_of_delivery = $request->date_of_delivery;
        $a->purpose_of_purchase = $request->purpose_of_purchase;
        $a->department_id = $request->department_id;
        $a->head = $request->head;
        $a->save();
        if ($request->department_id != "") {
            $this->distribution($request);
        }
        session()->flash('alert-success',  'Details Added!!');
        return redirect('/purchase');
    }

    protected function distribution($request)
    {
        $a = new Distribution();
        $a->purchase_order_number = $request->purchase_order_number;
        $a->product_id = $request->product_id;
        $a->department_id = $request->department_id;
        $a->date_of_issue = date('Y-m-d');
        $a->quantity = $request->quantity_purchased;
        $a->intender =$request->intender;
        $a->save();


        session()->flash('alert-success',  'Details Added!!');
        return redirect('/purchase');
    }

    public function show(PurchaseDetails $purchaseDetails)
    {
        //
    }


    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $purchase = PurchaseDetails::findorFail($id);
        $departments = Department::where('status', 1)->get();
        $products = Product::where('status', 1)->get();
        $suppliers = Supplier::where('status', 1)->get();
        return view('purchase.edit', compact('purchase', 'departments', 'products', 'suppliers'));
    }


    public function update(Request $request, $purchase)
    {
        $purchase = Crypt::decrypt($purchase);
        $a = PurchaseDetails::findorFail($purchase);

        $a->product_id = $request->product_id;
        $a->date_of_purchase = $request->date_of_purchase;
        $a->supplier_id = $request->supplier_id;
        $a->invoice_number = $request->invoice_number;
        // $a->purchase_order_number = $request->purchase_order_number;//major update....
        $a->date_of_delivery = $request->date_of_delivery;
        $a->quantity_purchased = $request->quantity_purchased;
        $a->rate_per_unit = $request->rate_per_unit;
        $a->total = $request->rate_per_unit * $request->quantity_purchased;
        $a->process_adopted = $request->process_adopted;
        $a->purpose_of_purchase = $request->purpose_of_purchase;
        $a->department_id = $request->department_id;
        $a->head = $request->head;
        if ($request->old_pon == $request->purchase_order_number) {
            $a->purchase_order_number = $request->purchase_order_number;
        } else {
            $a->purchase_order_number = $request->purchase_order_number;
            $distributions = Distribution::where('purchase_order_number', $request->old_pon)->get();
            foreach ($distributions as $distribution) {
                $d = Distribution::findorFail($distribution->id);
                $d->purchase_order_number = $request->purchase_order_number;
                $d->save();
            }
        }
        $a->save();
        if ($request->department_id != "") {
            $this->distribution($request);
        }
        session()->flash('alert-success',  'Details Updated!!');
        return redirect('/purchase');
    }


    public function destroy($id)
    {
        $a = PurchaseDetails::where('id', $id)->first();
        PurchaseDetails::destroy($id);
        $pon = $a->purchase_order_number;
        $data = Distribution::where('purchase_order_number', $pon)->get();
        foreach ($data as $d) {
            Distribution::destroy($d->id);
        }

        return redirect('/distribution')->with('alert-success', 'Details Removed');
    }
}
