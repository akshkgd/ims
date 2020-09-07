@extends('layouts.ims')
@section('content')

<div class="content">
    <h4>Product wise Distribution Summary</h4>
    <div class="card justify-content-between d-flex ">
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
                <h4>{{$a->name}} Distribution Details</h4>
                <table class="table  table-bordered">
                    
                        <tr>
                            <th>#</th>
                            
                           
                            <th>Date of Distribution</th>
                            <th>Purchase Order Number</th>
                            <th>Quantity</th>
                            <th>department</th>
                            
                            

                        </tr>
                    
                        @foreach($distributionDetails as $distribution)
                        <tr>
                            <th>{{ ++$i }}</th>
                            <td>{{$distribution->date_of_issue}}</td>
                            
                            <td>{{$distribution->purchase_order_number}} {{$distribution->pon->purpose_of_purchase}} </td>
                            
                            <td>{{$distribution->quantity}}</td>
                            <td>
                            <a class="card-link" href="{{ route('departmentwdd', Crypt::encrypt($distribution->department_id)) }}">{{$distribution->department->name}}</a>
                            </td>
                            
                            
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