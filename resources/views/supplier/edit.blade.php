@extends('layouts.ims')

@section('content')
<style>
    #hidden_div {
        display: none;
    }
</style>
<div class="content ">
    <div class="row row-eq-spacing-lg">
        <div class="col-md-7">
        <h4>Update Supplier Details</h2>
            <div class="card ">
                <form action="{{ action('SupplierController@update', Crypt::encrypt($supplier->id) )}}" class="" method="POST">
                   
                    @method('Patch')
                    @csrf


                    <!-- <div class="form-group">
            <label for="username" class="required">Select Product</label>
            <input type="text" name="product_id" class="form-control" placeholder="Select Product">
        </div> -->
                    <div class="form-group">
                        <label for="username" class="required">Supplier Name</label>
                        <input type="text" name="name" class="form-control" value="{{$supplier->name}}">
                    </div>
                   
                    <input class="btn btn-primary btn-block" type="submit" value="Update Supplier Details">

                </form>
            </div>
        </div>
    </div>
   


</div>


@endsection