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
        <h4>Change Password</h2>
            <div class="card ">
                <form action="{{ action('HomeController@changePassword' )}}" class="" method="POST">
                   
                    
                    @csrf


                    <!-- <div class="form-group">
            <label for="username" class="required">Select Product</label>
            <input type="text" name="product_id" class="form-control" placeholder="Select Product">
        </div> -->
                    <div class="form-group">
                        <label for="username" class="required">Old Password</label>
                        <input type="password" name="oldPassword" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="username" class="required">New Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <input class="btn btn-primary btn-block" type="submit" value="Update Password">

                </form>
            </div>
        </div>
    </div>
   


</div>


@endsection