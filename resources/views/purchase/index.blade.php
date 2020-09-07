@extends('layouts.ims')
@section('content')

<div class="content">

    <div class="row">
        <div class="col-lg-12">
        <div class="pull-left">
                <h4>Purchase Details</h2>
            </div>
            <div class="pull-right pb-20 ">
                <a class="btn btn-primary" href="{{url('/purchase/create')}}"> Add New Product</a>
            </div>
            <div class="">
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
                            <th>Supplier</th>
                            <th>Actions</th>

                        </tr>
                    
                        @foreach($purchase_details as $purchase)
                        <tr>
                            <th>{{ ++$i }}</th>
                            <td>{{$purchase->date_of_purchase}}</td>
                            <td> <a href="{{ route('product_detail', Crypt::encrypt($purchase->product_id)) }}">{{$purchase->item->name}}</a></td>
                            <td><a href="{{ route('ponwd', Crypt::encrypt($purchase->purchase_order_number)) }}">{{$purchase->purchase_order_number}}</a></td>
                            <td>{{$purchase->invoice_number}}</td>
                            <td>{{$purchase->quantity_purchased}}</td>
                            <td>{{$purchase->rate_per_unit}}</td>
                            <td>{{$purchase->total}}</td>
                            <td>{{$purchase->process_adopted}}</td>
                            <td>{{$purchase->purpose_of_purchase}}</td>
                            <td><a href="{{ route('supplierwpd', Crypt::encrypt( $purchase->supplier_id)) }}">{{$purchase->supplier->name}}</a>  </td>
                        <td class="d-flex" >
                        <a class="btn btn-info mr-10" href="{{ route('purchase.edit', Crypt::encrypt($purchase->id)) }}">Edit</a>
                        <form action="{{route('purchase.destroy', [$purchase->id])}}" method="POST">
    <input type="hidden" name="_method" value="DELETE">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="submit" class="btn btn-info" value="Delete"/>
</form>
                        </td>
                        </tr>
                        @endforeach
                    
                </table>
                <div class="text-center mt-20">
                {!! $purchase_details->links() !!}
                </div>
            </div>
            

        </div>
    </div>
</div>
@endsection