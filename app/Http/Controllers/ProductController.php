<?php

namespace App\Http\Controllers;

use App\Distribution;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Session;
use App\PurchaseDetails;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('status', 1)->get();

        return view('product.index', compact('products'))
            ->with('i');
    }
    public function archive()
    {
        $products = Product::where('status', 0)->get();

        return view('product.archive', compact('products'))
            ->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $a = new Product();
        $a->name = $request->name;
        $a->category = $request->category;
        $a->reorderThreshold = $request->reorderThreshold;
        $a->save();
        session()->flash('alert-warning',  'Product Added');
        return redirect('/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $product = Product::findorFail($id);
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $product)
    {
        $product = Crypt::decrypt($product);
        $a = Product::findorFail($product);
        $a->name = $request->name;
        $a->category = $request->category;
        $a->reorderThreshold = $request->reorderThreshold;
        $a->save();
        session()->flash('alert-warning',  'Product Updated');
        return redirect('/product');
    }
    public function del( $product)
    {
        $product = Crypt::decrypt($product);
        $a = Product::findorFail($product);
        $ifpurchase = PurchaseDetails::where('product_id', $product)->get();
        if($ifpurchase->count()>0){
            $a->status = 0;
            $a->save();
            session()->flash('alert-warning',  'Product Archived');
            return redirect('/product/archive');
        }
        else{
            Product::destroy($product);
            session()->flash('alert-warning',  'Product Removed');
            return redirect('/product');
        }
        

    }

    public function restore($id)
    {
        $id = Crypt::decrypt($id);
        $product = Product::findorFail($id);
        $product->status = 1;
        $product->save();
        session()->flash('alert-success', 'Product Restored');
        return redirect('/products/archive');
    }
    


    public function delete($id)
    {
        $id = Crypt::decrypt($id);
        
        Product::destroy($id);

        $purchase = PurchaseDetails::where('product_id', $id)->get();
        foreach ($purchase as $p) {
            PurchaseDetails::destroy($p->id);
        }

        $distribution = Distribution::where('product_id', $id)->get();
        foreach ($distribution as $d) {
            Distribution::destroy($d->id);
        }
        session()->flash('alert-success', 'Product Deleted');
        return redirect('/products/archive');

    }



   
}
