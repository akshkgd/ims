@extends('layouts.ims')

@section('content')

<div class="content">
   
    <div class="row">
        <div class="col-lg-12">
            <div class="">
                <h4> Distribution Details of {{Auth::user()->department->name}}</h4>
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
                            <th>{{ ++$j }}</th>
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