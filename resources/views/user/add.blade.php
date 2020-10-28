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
            <h4>Add Guest User</h2>
                <div class="card ">
                    <form action="{{ route('user.store') }}" class="" method="POST">
                        @csrf



                        <!-- <div class="form-group">
            <label for="username" class="required">Select Product</label>
            <input type="text" name="product_id" class="form-control" placeholder="Select Product">
        </div> -->
                        <div class="form-group">
                            <label for="username" class="required"> Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter User Name">
                        </div>
                        <div class="form-group">
                            <label for="username" class="required"> Email</label>
                            <input type="text" name="email" class="form-control" placeholder="Enter User Email">
                        </div>

                        <div class="form-group">
                            <label for="username" class="required"> Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>

                        <div class="form-group" >
                            <label>Select Departemnt </label>
                            <select class="form-control" name="department_id">
                                <option value="" selected="selected" disabled="disabled">Select Department</option>
                                @foreach ($departments as $department)
                                <option value="{{$department->id}}">{{$department->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <input class="btn btn-primary btn-block" type="submit" value="Add User Details">

                    </form>
                </div>
        </div>
    </div>



</div>


@endsection