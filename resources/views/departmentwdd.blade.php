@extends('layouts.ims')
@section('content')

<div class="content">
    <h4>Distribution - Summary</h4>
    <div class="card justify-content-between d-flex">
    <div>
    <span>Department Name</span>
    <h1 class="card-title">{{$a->name}}</h1>
    </div>  
    
    <h1 class="card-title"></h1>
    
        
    </div>
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
                            <th>Distribution Details</th>
                            <th>Quantity</th>
                            
                            
                            

                        </tr>
                    
                        @foreach($distributionDetails as $distribution)
                        <tr>
                            <th>{{ ++$i }}</th>
                            <td>{{$distribution->item->name}}</td>
                            <td>{{$distribution->date_of_issue}}</td>
                            
                            <td>{{$distribution->purchase_order_number}}</td>
                            <td>{{$distribution->pon->purpose_of_purchase}}</td>
                            
                            <td>{{$distribution->quantity}}</td>
                            
                            
                        </tr>
                        @endforeach
                    
                </table>
                <div class="text-center mt-20">
                
                </div>
            </div>
            

        </div>
        <div class="col-lg-4">
            
        </div>
    </div>
</div>
@endsection