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
        <h4>Add Department Details</h2>
            <div class="card ">
                <form action="{{ route('department.store') }}" class="" method="POST">
                    @csrf



                    <!-- <div class="form-group">
            <label for="username" class="required">Select Product</label>
            <input type="text" name="product_id" class="form-control" placeholder="Select Product">
        </div> -->
                    <div class="form-group">
                        <label for="username" class="required">Department Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Department Name">
                    </div>
                    <input class="btn btn-primary btn-block" type="submit" value="Add Department Details">

                </form>
            </div>
        </div>
    </div>
   


</div>


@endsection