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
                <form action="{{ route('distribution.update', Crypt::encrypt($distribution->id)) }}" class="" method="POST">
                @method('Patch')    
                @csrf



                    <!-- <div class="form-group">
            <label for="username" class="required">Select Product</label>
            <input type="text" name="product_id" class="form-control" placeholder="Select Product">
        </div> -->
                    <div class="form-group">
                        <label  class="required">Purchase Order Number</label>
                        <input type="text" name="purchase_order_number" class="form-control" value="{{$distribution->purchase_order_number}}">
                    </div>
                    <div class="form-group">
                        <label  class="required">Date of Issue</label>
                        <input type="text" name="date_of_issue" class="form-control" value="{{$distribution->date_of_issue}}">
                    </div>
                    <div class="form-group">
                        <label  class="required">Department</label>
                        <select class="form-control" name="department_id" required="required" >
                <option  selected="selected" disabled="disabled" value="{{$distribution->department_id}}">{{$distribution->department->name}}</option>
                @foreach ($departments as $department)
                <option value="{{$department->id}}">{{$department->name}}</option>
                @endforeach
            </select>
                    </div>
                    <div class="form-group">
                        <label  >Quantity</label>
                        <input type="text" name="quantity" class="form-control" value="{{$distribution->quantity}}">
                    </div>
                    <input type="hidden" name="product_id" value="{{$distribution->product_id}}">
                    <input type="hidden" name="old_pon" value="{{$distribution->purchase_order_number}}">
                    <input type="hidden" name="old_did" value="{{$distribution->department_id}}">
                    <input class="btn btn-primary btn-block" type="submit" value="Add Product Details">
                    

                </form>
            </div>
        </div>
    </div>
   


</div>


@endsection