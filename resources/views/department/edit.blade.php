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
        <h4>Update department Details</h2>
            <div class="card ">
                <form action="{{ action('DepartmentController@update', Crypt::encrypt($department->id)) }}" class="" method="POST">
                   
                    @method('Patch')
                    @csrf


                    <!-- <div class="form-group">
            <label for="username" class="required">Select Product</label>
            <input type="text" name="product_id" class="form-control" placeholder="Select Product">
        </div> -->
                    <div class="form-group">
                        <label for="username" class="required">department Name</label>
                        <input type="text" name="name" class="form-control" value="{{$department->name}}">
                    </div>
                    <input class="btn btn-primary btn-block" type="submit" value="Update department Details">

                </form>
            </div>
        </div>
    </div>
   


</div>


@endsection