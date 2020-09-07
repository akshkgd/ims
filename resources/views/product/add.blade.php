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
        <h4>Add Product Details</h2>
            <div class="card ">
                <form action="{{ route('product.store') }}" class="" method="POST">
                    @csrf



                    <!-- <div class="form-group">
            <label for="username" class="required">Select Product</label>
            <input type="text" name="product_id" class="form-control" placeholder="Select Product">
        </div> -->
                    <div class="form-group">
                        <label  class="required">Product Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Product Name">
                    </div>
                    <div class="form-group">
                        <label  class="required">Product Description</label>
                        <input type="text" name="description" class="form-control" placeholder="Enter Product Description   ">
                    </div>
                    <div class="form-group">
                        <label  class="required">Product Category</label>
                        <input type="text" name="category" class="form-control" placeholder="Enter Product category">
                    </div>
                    <div class="form-group">
                        <label  >Reorder Threshold</label>
                        <input type="text" name="reorderThreshold" class="form-control" placeholder="Enter Reorder Threshold">
                    </div>
                    <input class="btn btn-primary btn-block" type="submit" value="Add Product Details">

                </form>
            </div>
        </div>
    </div>
   


</div>


@endsection