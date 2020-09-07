@extends('layouts.ims')
@section('content')

<div class="content">
   
    
        
    
    <div class="row">
        <div class="col-lg-12">
            
        <div class="pull-left">
                <h4>Distribution Details</h2>
            </div>
            <div class="pull-right pb-20 ">
                <a class="btn btn-primary" href="{{url('/distribution/create')}}"> Add New Distribution</a>
            </div>
                <table class="table  table-bordered">
                    
                        <tr>
                            <th>#</th>
                            
                            <th>Product</th>
                            <th>Date of Distribution</th>
                            <th>Purchase Order Number</th>
                            <th>Quantity</th>
                            <th>department</th>
                            <th>Action</th>
                            
                            

                        </tr>
                    
                        @foreach($distributionDetails as $distribution)
                        <tr>
                            <th>{{ ++$i }}</th>
                            <td><a href="{{ route('product_detail', Crypt::encrypt($distribution->product_id)) }}">{{$distribution->item->name}}</a></td>
                            <td>{{$distribution->date_of_issue}}</td>
                            
                            <td><a href="{{ route('ponwd', Crypt::encrypt($distribution->purchase_order_number)) }}">{{$distribution->purchase_order_number}}</a></td>
                            
                            <td>{{$distribution->quantity}}</td>
                            <td><a class="card-link" href="{{ route('departmentwdd', Crypt::encrypt($distribution->department_id)) }}">{{$distribution->department->name}}</td>
                            <td class="d-flex ">
                            <a class="btn btn-info mr-10" href="{{ route('distribution.edit', Crypt::encrypt($distribution->id)) }}">Edit</a>
                            <form action="{{route('distribution.destroy', [$distribution->id])}}" method="POST">
    <input type="hidden" name="_method" value="DELETE">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="submit" class="btn btn-info" value="Delete"/>
</form>
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