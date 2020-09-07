@extends('layouts.ims')

@section('content')

<!-- Page wrapper with content-wrapper inside -->
<!-- <div class="page-wrapper"> -->
<!-- <div class="content-wrapper"> -->
<!-- Container-fluid -->
<!-- <div class="container-fluid"> -->
<!-- First comes a content container with the main title -->
<div class="content">
  <h1 class="content-title font-size-22">
    <!-- font-size-22 = font-size: 2.2rem (22px) -->
    Dashboard
  </h1>
  @if($purchaseDetails->count() != 0)
  <div class="card justify-content-between d-flex bg-1">
    <div>
      <span>Purchase Today</span>
      <h1 class="card-title">₹{{$today}}</h1>
    </div>


    <div>
      <span>Purchase This Month</span>
      <h1 class="card-title">₹{{$month}}</h1>
    </div>
    <div>
      <span>Purchase Previous Month</span>
      <h1 class="card-title">₹{{$previous_month}}</h1>
    </div>
    <div>
      <span>Purchase Analysis (This Month)</span>
      @if($month > $previous_month)
      
      <h1 class="card-title">{!! number_format( (($month - $previous_month) / $previous_month )* 100, 2 )!!}</h1>

      @else
      <h1 class="card-title">Decreases by {!! number_format( (( $previous_month - $month) / $previous_month )* 100 , 2) !!} %</h1>
      @endif
      
    </div>
    <div>
      <span>Total Purchase</span>
      <h1 class="card-title">₹{{$total}}</h1>
    </div>

   


  </div>
  @endif
</div>
<!-- First row (equally spaced) -->
<div class="row row-eq-spacing">
  <div class="col-6 col-xl-3">
    <div class="card">
      <h2 class="card-title">Products</h2>
      <h4>{{$products->count()}}</h3>
        <a href="{{url('/product')}}" class="btn btn-outline-primary d-block">Details</a>
    </div>
  </div>
  <div class="col-6 col-xl-3">
    <div class="card">
      <h2 class="card-title">Departments</h2>
      <h4>{{$departments->count()}}</h3>
        <a href="{{url('/department')}}" class="btn btn-outline-primary d-block"> </i>Details</a>
    </div>
  </div>
  <!-- Overflow occurs here on large screens (and down) -->
  <!-- Therefore, a v-spacer is added at this point -->
  <div class="v-spacer d-xl-none"></div> <!-- d-xl-none = display: none only on extra large screens (> 1200px) -->
  <div class="col-6 col-xl-3">
    <div class="card">
      <h2 class="card-title">Users</h2>
      <h4>{{$products->count()}}</h3>

        <a href="{{url('/user')}}" class="btn btn-outline-primary d-block"> </i>Details</a>
    </div>
  </div>
  <div class="col-6 col-xl-3">
    <div class="card">
      <h2 class="card-title">Suppliers</h2>
      <h4>{{$suppliers->count()}}</h3>
        <a href="{{url('/supplier')}}" class="btn btn-outline-primary d-block"> </i>Details</a>
    </div>
  </div>
</div>
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
                            <td> <a href="{{ route('product_detail', $purchase->product_id) }}">{{$purchase->item->name}}</a></td>
                            <td>{{$purchase->purchase_order_number}}</td>
                            <td>{{$purchase->invoice_number}}</td>
                            <td>{{$purchase->quantity_purchased}}</td>
                            <td>{{$purchase->rate_per_unit}}</td>
                            <td>{{$purchase->total}}</td>
                            <td>{{$purchase->process_adopted}}</td>
                            <td>{{$purchase->purpose_of_purchase}}</td>
                            <td><a href="{{ route('supplierwpd', $purchase->supplier_id) }}">{{$purchase->supplier->name}}</a>  </td>
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
                            <th>Distribution Details</th>
                            <th>Quantity</th>
                            <th>department</th>
                            
                            

                        </tr>
                    
                        @foreach($distributionDetails as $distribution)
                        <tr>
                            <th>{{ ++$j }}</th>
                            <td>{{$distribution->item->name}}</td>
                            <td>{{$distribution->date_of_issue}}</td>
                            
                            <td>{{$distribution->purchase_order_number}}</td>
                            <td>{{$distribution->pon->purpose_of_purchase}}</td>
                            
                            <td>{{$distribution->quantity}}</td>
                            <td>{{$distribution->department->name}}</td>
                            
                            
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