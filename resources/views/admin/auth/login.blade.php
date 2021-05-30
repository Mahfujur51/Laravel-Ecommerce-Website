@extends('admin.login_master')

@section('login_content')

<div class="container">
        <div class="card">
            <div class="card-body">
                <div class="circle"></div>
                    <header class="myHed text-center">
                        <i class="user"><img src="{{asset('login_admin')}}/download.png" alt=""></i>
                       <!--<i class="fa fa-user"></i>
                        <p>LOGIN</p>
                        --> 
                    </header>
                    <form method="POST" action="{{ route('admin.login') }}" class="main-form text-center">
                    @csrf
                        <div class="from-group my-0">
                            <label class="my-0">
                                <i class="fa fa-user fas"></i>
                                <input id="email" type="email" class="myInput" placeholder="Email" name="email" >
                
                            </label>
                            @error('email')
                <span class="invalid-feedback " role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                        </div>
                        <div class="from-group my-0">
                            <label class="my-0">
                                <i class="fa fa-lock fas"></i>
                                <input id="password" type="password" class="myInput" placeholder="Password" name="password"  autocomplete="current-password">
                                @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
                            </label>
                        </div>
                        <div class="from-group mt-1">
                            <label class="my-0">
                                <i class="fa fa-send send" ></i>
                                <input type="submit" class="form-control button" value="Login">
                                
                            </label>
                        </div>
                        <span class="check_1">Forget Password</span>
                    </form>
                
            </div>
        </div>
    </div>


@endsection
