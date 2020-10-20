@extends('layouts.ims')
@section('content')

<div class="content">
    <h4>Purchase Details</h4>
    <div class="row">
        <div class="col-lg-12">
            <div class="">
                <table class="table  table-bordered">

                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Product</th>
                        <th>Purchase Order Number</th>
                        <th>Date of Delivery</th>
                        <th>Invoice Number</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Process Adopted</th>
                        <th>Head</th>
                        <th>Purpose of Purchase</th>
                        <th>Supplier</th>
                        

                    </tr>

                    @foreach($purchaseDetails as $purchase)
                    <tr>
                        <th>{{ ++$i }}</th>
                        <td>{{$purchase->date_of_purchase->format('d M Y')}}</td>
                        <td> {{$purchase->item->name}}</td>
                        <td>{{$purchase->purchase_order_number}}</td>
                        <td>{{$purchase->date_of_delivery->format('d M Y')}}</td>
                        <td>{{$purchase->invoice_number}}</td>
                        <td>{{$purchase->quantity_purchased}}</td>
                        <td>{{$purchase->rate_per_unit}}</td>
                        <td>{{$purchase->total}}</td>
                        <td>{{$purchase->process_adopted}}</td>
                        <th>{{$purchase->head}}</th>
                        <td>{{$purchase->purpose_of_purchase}}</td>
                        <td>{{$purchase->supplier->name}} </td>
                        
                    </tr>
                    @endforeach

                </table>
               
            </div>


        </div>
    </div>
</div>



<div class="content">
   
    
        
    
    <div class="row">
        <div class="col-lg-12">
            <div class="">
                <h4> Distribution Details</h4>
                <table class="table  table-bordered">
                    
                        <tr>
                            <th>#</th>
                            
                            <th>Product</th>
                            <th>Date of Distribution</th>
                            <th>Purchase Order Number</th>
                            <th>Quantity</th>
                            <th>department</th>
                            <th>Intender</th>
                            
                            

                        </tr>
                    
                        @foreach($distributionDetails as $distribution)
                        <tr>
                            <th>{{ ++$j }}</th>
                            <td>{{$distribution->item->name}}</td>
                            <td>{{$distribution->date_of_issue}}</td>
                            
                            <td>{{$distribution->purchase_order_number}}</td>
                            
                            <td>{{$distribution->quantity}}</td>
                            <td>{{$distribution->department->name}}</td>
                            <td>{{$distribution->intender}}</td>
                            
                            
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