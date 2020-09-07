@extends('layouts.ims')

@section('content')
<div class="content">
    <div class="row ">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h4>Department Details</h2>
            </div>
            <div class="pull-right pb-20 ">
                <a class="btn btn-primary" href="{{url('/department/create')}}"> Add New Department</a>
            </div>
        </div>
    </div>

  

        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Name</th>

                <th width="280px">Action</th>
            </tr>
            @foreach ($departments as $department)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $department->name }}</td>

                <td>
                    <form action="" method="POST">

                        <a class="btn btn-info" href="{{ route('department.edit', Crypt::encrypt($department->id)) }}">Edit</a>

                        <a class="btn btn-outline-primary+" href="{{ route('del-department', Crypt::encrypt($department->id)) }}">Delete</a>


                    </form>
                </td>
            </tr>
            @endforeach
        </table>


    </div>
    @endsection