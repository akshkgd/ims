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
        <h4>Add Distribution Details</h2>
            <div class="card ">
                <form action="{{ route('distribution.store') }}" class="" method="POST">
                    @csrf



                    <!-- <div class="form-group">
            <label for="username" class="required">Select Product</label>
            <input type="text" name="product_id" class="form-control" placeholder="Select Product">
        </div> -->
                    <div class="form-group">
                        <label  class="required">Purchase Order Number</label>
                        <input type="text" name="purchase_order_number" class="form-control" placeholder="Enter Purchase order number">
                    </div>
                    <div class="form-group">
                        <label  class="required">Date of Issue</label>
                        <p>date format: yyyy-mm-dd</p>
                        <input type="text" name="date_of_issue" class="form-control" placeholder="yyyy-mm-dd   ">
                        
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
                        <input type="text" name="quantity" class="form-control" placeholder="Enter Quantity">
                    </div>

                    <div class="form-group">
                        <label  >Intender Name</label>
                        <input type="text" name="intender" class="form-control" placeholder="Enter Intender Name">
                    </div>
                   
                    <input class="btn btn-primary btn-block" type="submit" value="Add Distribution Details">

                </form>
            </div>
        </div>
    </div>
   


</div>


@endsection