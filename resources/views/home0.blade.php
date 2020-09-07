@extends('layouts.app')

@section('content')
<div class="container pt-2">
    <div class="row">
        <div class="col-sm-12">
            <div class="flash-message">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))

                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header">
                    Access Denied!!
                </div>
                <div class="card-body">
                    <h5 class="card-title">Hello {{Auth::user()->name}}</h5>
                    <p class="card-text">You are not allowed to access this content. If you are member of University of Allahabad contact management team for support.</p>
                    <a class="btn btn-primary" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection