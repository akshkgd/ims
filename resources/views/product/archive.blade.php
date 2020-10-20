@extends('layouts.ims')

@section('content')


<div class="content">
    <div class="row ">
      <div class="col-lg-12">
    <div class="alert alert-secondary filled-dm  mw-full" role="alert"> <!-- w-400 = width: 40rem (400px), mw-full = max-width: 100% -->
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
      <h4 class="alert-heading">Remember! On deleting a product</h4>
       You will no longer have access to any purchase or distribution details that have been associated to that product.

    </div>
  </div>
</div>
        <!-- <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h4>Product Details</h2>
            </div>
            <div class="pull-right pb-20 ">
                <a class="btn btn-primary" href="{{url('/product/create')}}"> Add New Product</a>
            </div>
        </div> -->
    </div>

    

        <table class="table table-bordered mt-20">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Category</th>
                <th>Reorder threshold</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($products as $product)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{$product->name}}</td> 
                <td>{{ $product->category }}</td>
                <td>{{ $product->reorderThreshold }}</td>
                <td>
                    <form action="" method="POST">

                        <a class="btn btn-info" href="{{route('restore-product', Crypt::encrypt($product->id))}}">Restore</a>
                        <a class="btn btn-info" href="{{route('delete-product', Crypt::encrypt($product->id))}}">Delete</a>
                        
                       

                    
                </td>
            </tr>
            @endforeach
        </table>


    </div>
</div>

    @endsection