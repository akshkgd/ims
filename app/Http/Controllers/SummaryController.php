<?php

namespace App\Http\Controllers;

use App\Department;
use App\Distribution;
use App\Product;
use App\PurchaseDetails;
use App\Summary;
use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use PhpParser\Node\Stmt\Return_;

class SummaryController extends Controller
{
    public function productwpd($id)
    {
        $id = Crypt::decrypt($id);
        $a = Product::findorFail($id);
        $totalPurchase = PurchaseDetails::where('product_id', $id)->sum('quantity_purchased');
        $distribution = Distribution::where('product_id', $id)->sum('quantity');
        $purchaseDetails = PurchaseDetails::where('product_id', $id)->get();
        return view('purchaseDetail', compact('a', 'purchaseDetails', 'totalPurchase', 'distribution'))->with('i');
    }

    public function supplierwpd($id)
    {
        $id = Crypt::decrypt($id);
        $a = Supplier::findorFail($id);
        $purchaseDetails = PurchaseDetails::where('supplier_id', $id)->get();
        return view('supplierwpd', compact('a', 'purchaseDetails'))->with('i');
    }
    public function orderNumberwdd($id)
    {
        $id = Crypt::decrypt($id);
        $a = Distribution::first()->where('purchase_order_number', $id);
        if ($a->count() > 0) {
            $distributionDetails = Distribution::where('purchase_order_number', $id)->get();
            return view('orderNumberwdd', compact('distributionDetails'))->with('i');
        } else {
            return redirect()->back();
        }
    }

    public function productwdd($id)
    {
        $id = Crypt::decrypt($id);
        $a = Product::findorFail($id);
        $totalPurchase = PurchaseDetails::where('product_id', $id)->sum('quantity_purchased');
        $distribution = Distribution::where('product_id', $id)->sum('quantity');
        $distributionDetails = Distribution::where('product_id', $id)->get();
        return view('productwdd', compact('a',  'totalPurchase', 'distribution', 'distributionDetails'))->with('i');
    }

    public function departmentwdd($id)
    {
        $id = Crypt::decrypt($id);
        $a = Department::findorFail($id);
        $totalPurchase = PurchaseDetails::where('department_id', $id)->get();
        
        $distributionDetails = Distribution::where('department_id', $id)->get();
        return view('departmentwdd', compact('a',  'totalPurchase',  'distributionDetails'))->with('i');
    }
    public function ponwd($pon)
    {
        $pon = Crypt::decrypt($pon);
        $purchaseDetails = PurchaseDetails::where('purchase_order_number', $pon)->get();
        $distributionDetails = Distribution::where('purchase_order_number', $pon)->get()    ;
        return view('ponwd', compact('purchaseDetails', 'distributionDetails'))->with('i')->with('j');
    }
}
