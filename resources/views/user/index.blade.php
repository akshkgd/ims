@extends('layouts.ims')
@section('content')

<div class="content">
   
    <div class="row">
        <div class="col-lg-12">
            <div class="">
            <div class="pull-right pb-20 ">
                <a class="btn btn-primary" href="{{url('/user/create')}}">Add Guest User</a>
            </div>
                <h4>Guest User Details</h4>
                
                <table class="table  table-bordered">
                    
                        <tr>
                            <th>#</th>
                            
                           
                            <th>Name</th>
                            <th>Email</th>
                            <th>Department</th>
                            <th>Action</th>
                            
                            

                        </tr>
                    
                        @foreach($userDetails as $user)
                        <tr>
                            <th>{{ ++$i }}</th>
                            <td>{{$user->name}}</td>
                            
                            <td>{{$user->email}}  </td>
                            
                            <td>{{$user->department->name}}</td>
                            <td>
                            
                            <form action="{{route('user.destroy', [$user->id])}}" method="POST">
    <input type="hidden" name="_method" value="DELETE">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="submit" class="btn btn-secondary" value="Delete"/>
</form>
                            </td>
                            
                        </tr>
                        @endforeach
                    
                </table>
                <div class="text-center mt-20">
                
                </div>
            </div>
            

        </div>
    </div>
</div>
@endsection