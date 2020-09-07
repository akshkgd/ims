@extends('layouts.ims')

@section('content')
<div class="content">
    <div class="row ">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h4>Product Details</h2>
            </div>
            <div class="pull-right pb-20 ">
                <a class="btn btn-primary" href="{{url('/product/create')}}"> Add New Product</a>
            </div>
        </div>
    </div>

    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))

        <p class="alert" alert-{{ $msg }}" role="alert">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
        @endif
        @endforeach

        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Details</th>
                <th>Category</th>
                <th>Reorder threshold</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($products as $product)
            <tr>
                <td>{{ ++$i }}</td>
                <td>

                    
                    <div class="dropdown">
                        <button class="btn" data-toggle="dropdown" type="button" id="dropdown-toggle-btn-1" aria-haspopup="true" aria-expanded="false">
                            {{$product->name}} <i class="fa fa-angle-down ml-5" aria-hidden="true"></i> <!-- ml-5 = margin-left: 0.5rem (5px) -->
</button>
                        <div class="dropdown-menu" aria-labelledby="dropdown-toggle-btn-1">
                           
                        <a class="dropdown-item" href="{{ route('product_detail', Crypt::encrypt( $product->id) )}}">Purchase Details</a>
                        <a class="dropdown-item" href="{{ route('productwdd',Crypt::encrypt( $product->id)) }}">Distribution Details</a>   
                            <div class="dropdown-divider"></div>
                            
                        </div>
                    </div </td> <td>{{ $product->description }}
                </td>
                <td>{{ $product->category }}</td>
                <td>{{ $product->reorderThreshold }}</td>
                <td>
                    <form action="" method="POST">

                        <a class="btn btn-info" href="{{route('product.edit', Crypt::encrypt($product->id))}}">Edit</a>
                        <a class="btn btn-info" href="">Delete</a>


                    </form>
                </td>
            </tr>
            @endforeach
        </table>
       

    </div>
    @endsection