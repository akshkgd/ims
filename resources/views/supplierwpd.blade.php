@extends('layouts.ims')
@section('content')

<div class="content">
    <h4>{{$a->name}} - Summary</h4>
    <div class="card justify-content-between d-flex">
    <div>
    <span>Supplier Name</span>
    <h1 class="card-title">{{$a->name}}</h1>
    </div>  
    
    <h1 class="card-title">{{$a->category}}</h1>
    
        
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="">
                <h4>{{$a->name}} Purchase Details</h4>
                <table class="table  table-bordered">
                    
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Product</th>
                            <th>Purchase Order Number</th>
                            <th>Invoice Number</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th>Process Adopted</th>
                            <th>Purpose of Purchase</th>
                            

                        </tr>
                    
                        @foreach($purchaseDetails as $purchase)
                        <tr>
                            <th>{{ ++$i }}</th>
                            <td>{{$purchase->date_of_purchase}}</td>
                            <td>{{$purchase->item->name}}</td>
                            <td>{{$purchase->purchase_order_number}}</td>
                            <td>{{$purchase->invoice_number}}</td>
                            <td>{{$purchase->quantity_purchased}}</td>
                            <td>{{$purchase->rate_per_unit}}</td>
                            <td>{{$purchase->total}}</td>
                            <td>{{$purchase->process_adopted}}</td>
                            <td>{{$purchase->purpose_of_purchase}}</td>
                            
                        </tr>
                        @endforeach
                    
                </table>
                <div class="text-center mt-20">
                
                </div>
            </div>
            

        </div>
    </div>
</div>
@endsection