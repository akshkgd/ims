@extends('layouts.ims')

@section('content')
<div class="content">
    <div class="row ">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h4>Supplier Details</h2>
            </div>
            <div class="pull-right pb-20 ">
                <a class="btn btn-primary" href="{{url('/supplier/create')}}">Add New Supplier</a>
            </div>
        </div>
    </div>

    <div class="flash-message">
        

        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Name</th>

                <th width="280px">Action</th>
            </tr>
            @foreach ($suppliers as $supplier)
            <tr>
                <td>{{ ++$i }}</td>
                @if($supplier->status == 0)
                <td>{{ $supplier->name }}</td>
                @else
                <td class="text-danger">{{ $supplier->name }}</td>
                @endif
                <td>
                    <form action="" method="POST">

                        <a class="btn btn-info" href="{{ route('supplier.edit', Crypt::encrypt($supplier->id)) }}">Edit</a>

                        <a class="btn btn-outline-primary+" href="{{ route('del-supplier', Crypt::encrypt($supplier->id)) }}">Delete</a>


                    </form>
                </td>
            </tr>
            @endforeach
        </table>


    </div>
    @endsection