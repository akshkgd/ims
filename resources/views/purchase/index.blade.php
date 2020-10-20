@extends('layouts.ims')
@section('content')

<div class="content">

    <div class="row">
        <div class="col-lg-12">
        <div class="alert alert-secondary filled-dm w-1000 mw-full mb-20" role="alert"> <!-- w-400 = width: 40rem (400px), mw-full = max-width: 100% -->
  <div class="row align-items-center"> <!-- align-items-center = align-items: center -->
    <div class="col-sm-2">
      <div class="w-50 h-50 d-flex align-items-center rounded-circle bg-secondary hidden-dm"> <!-- w-50 = width: 5rem (50px), h-50 = height: 5rem (50px), d-flex = display: flex, align-items-center = align-items: center, rounded-circle = border-radius: 50%, bg-secondary = background-color: var(--secondary-color), hidden-dm = hidden in dark mode -->
        <div class="m-auto"> <!-- m-auto = margin: auto -->
          <i class="fa fa-lightbulb-o fa-2x" aria-hidden="true"></i>
          <span class="sr-only">Lightbulb</span> <!-- sr-only = only for screen readers -->
        </div>
      </div>
      <div class="w-50 h-50 d-flex align-items-center rounded-circle bg-white hidden-lm"> <!-- w-50 = width: 5rem (50px), h-50 = height: 5rem (50px), d-flex = display: flex, align-items-center = align-items: center, rounded-circle = border-radius: 50%, bg-white = background-color: var(--white-bg-color), hidden-lm = hidden in light mode -->
        <div class="m-auto"> <!-- m-auto = margin: auto -->
          <i class="fa fa-lightbulb-o fa-2x" aria-hidden="true"></i>
          <span class="sr-only">Lightbulb</span> <!-- sr-only = only for screen readers -->
        </div>
      </div>
    </div>
    <div class="col-sm-9 offset-sm-1 py-10"> <!-- py-10 = padding-top: 1rem (10px) and padding-bottom: 1rem (10px) -->
      <h4 class="alert-heading">Remember! On deleting Purchase Details</h4>
       You will no longer have access to any purchase or distribution details that have been associated to that purchase.

    </div>
  </div>
</div>
            <div class="pull-left">
                <h4>Purchase Details</h2>
            </div>
            <div class="pull-right pb-20 ">
                <a class="btn btn-primary" href="{{url('/purchase/create')}}"> Add New Purchase</a>
            </div>
            
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
                        <th>Actions</th>

                    </tr>

                    @foreach($purchase_details as $purchase)
                    <tr>
                        <th>{{ ++$i }}</th>
                        <td>{{$purchase->date_of_purchase->format('d M  Y')}}</td>
                        <td> <a href="{{ route('product_detail', Crypt::encrypt($purchase->product_id)) }}">{{$purchase->item->name}}</a></td>
                        <td><a href="{{ route('ponwd', Crypt::encrypt($purchase->purchase_order_number)) }}">{{$purchase->purchase_order_number}}</a></td>
                        <td>{{$purchase->date_of_delivery->format('d M  Y')}}</td>
                        <td>{{$purchase->invoice_number}}</td>
                        <td>{{$purchase->quantity_purchased}}</td>
                        <td>{{$purchase->rate_per_unit}}</td>
                        <td>{{$purchase->total}}</td>
                        <td>{{$purchase->process_adopted}}</td>
                        <th>{{$purchase->head}}</th>
                        <td>{{$purchase->purpose_of_purchase}}</td>
                        <td><a href="{{ route('supplierwpd', Crypt::encrypt( $purchase->supplier_id)) }}">{{$purchase->supplier->name}}</a> </td>
                        <td class="d-flex">
                            <a class="btn btn-info mr-10" href="{{ route('purchase.edit', Crypt::encrypt($purchase->id)) }}">Edit</a>
                            <form action="{{route('purchase.destroy', [$purchase->id])}}" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="btn btn-info" value="Delete" />
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