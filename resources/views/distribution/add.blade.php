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
                <form action="{{ route('distribution.store') }}" class="" method="POST">
                    @csrf



                    <!-- <div class="form-group">
            <label for="username" class="required">Select Product</label>
            <input type="text" name="product_id" class="form-control" placeholder="Select Product">
        </div> -->
                    <div class="form-group">
                        <label  class="required">Purchase Order Number</label>
                        <input type="text" name="purchase_order_number" class="form-control" placeholder="Enter Product Name">
                    </div>
                    <div class="form-group">
                        <label  class="required">Date of Issue</label>
                        <input type="text" name="date_of_issue" class="form-control" placeholder="Enter Product Description   ">
                    </div>
                    <div class="form-group">
                        <label  class="required">Department</label>
                        <select class="form-control" name="department_id" required="required">
                <option value="" selected="selected" disabled="disabled">Select Department</option>
                @foreach ($departments as $department)
                <option value="{{$department->id}}">{{$department->name}}</option>
                @endforeach
            </select>
                    </div>
                    <div class="form-group">
                        <label  >Quantity</label>
                        <input type="text" name="quantity" class="form-control" placeholder="Enter Reorder Threshold">
                    </div>
                   
                    <input class="btn btn-primary btn-block" type="submit" value="Add Product Details">

                </form>
            </div>
        </div>
    </div>
   


</div>


@endsection