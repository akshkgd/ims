@extends('layouts.ims')
@section('content')

<div class="content">
    <h4>Product wise Summary</h4>
    <div class="card justify-content-between d-flex">
    <div>
    <span>Product Name</span>
    <h1 class="card-title">{{$a->name}}</h1>
    </div>  
    
    <h1 class="card-title">{{$a->category}}</h1>
    <div>
    <span>Quantity Purchased</span>
    <h1 class="card-title">{{$totalPurchase}}</h1>
    </div>
    <div>
    <span> Quantity Distributed</span>
    <h1 class="card-title">{{$distribution}}</h1>
    </div>
    <div>
    <span>Quantity Remaining</span>
    <h1 class="card-title">{{$totalPurchase - $distribution}}</h1>
    </div>
    @if($a->reorderThreshold !="")
    <div>
    <span>Reorder Threshold limit</span>
    <h1 class="card-title">{{$a->reorderThreshold}}</h1>
    </div>
    @endif
        
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="">
                <h4>{{$a->name}} Purchase Details</h4>
                <table class="table  table-bordered">
                    
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Purchase Order Number</th>
                            <th>Invoice Number</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th>Process Adopted</th>
                            <th>Purpose of Purchase</th>
                            <th>Supplier</th>

                        </tr>
                    
                        @foreach($purchaseDetails as $purchase)
                        <tr>
                            <th>{{ ++$i }}</th>
                            <td>{{$purchase->date_of_purchase}}</td>
                            <td> {{$purchase->purchase_order_number}}</td>
                            <td>{{$purchase->invoice_number}}</td>
                            <td>{{$purchase->quantity_purchased}}</td>
                            <td>{{$purchase->rate_per_unit}}</td>
                            <td>{{$purchase->total}}</td>
                            <td>{{$purchase->process_adopted}}</td>
                            <td>{{$purchase->purpose_of_purchase}}</td>
                            <td>  {{$purchase->supplier->name}} </td>
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