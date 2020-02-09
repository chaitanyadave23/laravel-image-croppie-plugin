@extends('layout.master2')

@section('login')
<div id="login">
    <h3 class="text-center text-white pt-5">Forgot Password</h3>
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">
                    <form id="login-form" class="form" action="{{ action('NewController@mailsend') }}" method="post">                           
                        <h3 class="text-center text-info">Enter your Email ID</h3><br><br>
                        <div class="form-group">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <label for="username" class="text-info">Email:</label><br>
                            <input type="text" name="email" id="email" class="form-control">
                        </div>                                                                             
                        <div class="form-group">
                            <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                            <input type="submit" name="login" class="btn btn-info btn-md" value="Submit">
                        </div>
                        <div id="register-link" class="text-left">                                                  
                            <a href="{{ url('http://localhost/laravel/public/login') }}" class="text-info">Go Back !</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection