<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Inventory Management System - UOA</title>


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .card {
            border-radius: 10px;
        }
.card-link{
    color:#202021;
}
        @media(max-width : 786px) {
            .ims-title {
                font-size: 2rem;
            }

            .ims-intro {
                text-align: center !important;
            }
        }

        @media(min-width : 787px) {
            .ims-card {
                margin-top: 4rem;
            }
        }

        .btn-outline-primary {
            color: #1A73e8;
            border: 2px solid;
            border-radius: 4px;

        }

        .btn-outline-dark {
            color: #1A73e8;
            border: 1px solid lightgray;
            border-radius: 25px;
            padding-top:3px;
            padding-bottom:3px;
        }

        .chip {
            display: inline-block;
            padding: 0 25px;
            height: 40px;
            font-size: 16px;
            line-height: 40px;
            border-radius: 25px;
            background-color: #f1f1f1;
        }

        .chip img {
            float: left;
            margin: 0 10px 0 -25px;
            height: 40px;
            width: 40px;
            border-radius: 50%;
        }
        .list-group-item {
            border: none;
            border-radius: 0px;
        }
        .list-group-item.active {
            border-radius: 0;
        }
    </style>
</head>

<body onabort="alert('Do you Want to Leave??')">
    <div id="app">


        <main class="py-4">
            <div class="container">
                <div class="row pt-5 ">
                    <div class="col-md-6 mb-3">
                        <div class="ims-intro ims-card">
                            <img src="{{asset('img/logo.png')}}" alt="" height="100px">
                            <h1 class="pt-1 ims-title">Inventory Management System</h1>
                            <h3 ">इलाहाबाद विश्वविद्यालय</h4>
                            <h3>University of Allahabad, Prayagraj</h4>
                            <div class=" pt-2">
                                <a href="http://allduniv.ac.in/" class="btn btn-outline-dark">University Website</a>

                        </div>
                    </div>

                </div>
                <div class=" col-md-6  text-center ">
                    @guest
                    <div class=" card card-body shadow">
                        <div class="text-center">
                            <img src="{{'/img/ims.png'}}" alt="" class="img-fluid">
                            <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt quod qui, itaque nam delectus nihil quam laborum.</p> -->
                        </div>
                        <form method="POST" action="{{ route('login') }}" class="pt-3">
                            @csrf

                            <div class="form-group row">

                                <label for="email" class="col-md-12 text-left col-form-label ">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-12 text-left col-form-label ">{{ __('Password') }}</label>

                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12 text-left ">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-12 ">
                                    <button type="submit btn " class="btn   btn-block btn-outline-primary">
                                        Login to Dashboard
                                    </button>


                                </div>
                            </div>
                        </form>
                    </div>
                    @endguest
                    @auth
                    <div class="card pt-3 shadow ims-card">
                        <div class="text-center">
                            <img src="{{'/img/ims.png'}}" alt="" class="img-fluid">
                        </div>
                        <div class="list-group mt-5">
  <a href="{{url('/home')}}" class="list-group-item list-group-item-action active">
    Go to Dashboard
  </a>
  
  <a class="list-group-item list-group-item-action" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
  
</div>   

                        <div class="card-body">
                            
                            <!-- <a href="{{url('/home')}}" class="card-link">Dashboard</a> -->
                            
                        </div>
                    </div>
                    @endauth
                    <dv class="text-center">
                    <div class="chip mt-4">
                        <img src="{{asset('/img/ashish.png')}}" alt="Person">
                        <a href="" class="card-link">Ashish Shukla (Developer)</a>
                        
                    </div>  
                    <h6 class="text-muted pt-2"> &COPY; 2020 University of Allahabad, All Rights Reserved.</h6>
 
                    </dv>
                    
                </div>
            </div>
    </div>
    </main>
    </div>
    <footer class="footer ">
        <div class="container">
            <div class=" text-cente">

                

            </div>

        </div>
    </footer>
</body>

</html>