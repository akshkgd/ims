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
                <form action="{{ action('ProductController@update', Crypt::encrypt($product->id)) }}" class="" method="POST">
                @method('Patch')    
                @csrf



                    <!-- <div class="form-group">
            <label for="username" class="required">Select Product</label>
            <input type="text" name="product_id" class="form-control" placeholder="Select Product">
        </div> -->
                    <div class="form-group">
                        <label  class="required">Product Name</label>
                        <input type="text" name="name" class="form-control"  value="{{$product->name}}">
                    </div>
                    
                    <div class="form-group" >
            <label for="category" class="required">Product Category</label>
            <select class="form-control" name="category" required="required"  value="{{$product->category}}">
                <option value="{{$product->category}}" selected="selected">{{$product->category}}</option>
                <option value="Consumerable">Consumerable</option>
                <option value="Non Consumerable">Non Consumerable</option>
                
            </select>
        </div>
                    <div class="form-group">
                        <label  >Reorder Threshold</label>
                        <input type="text" name="reorderThreshold" class="form-control" value="{{$product->reorderThreshold}}">
                    </div>
                    <input class="btn btn-primary btn-block" type="submit" value="Update Product Details">

                </form>
            </div>
        </div>
    </div>
   


</div>


@endsection