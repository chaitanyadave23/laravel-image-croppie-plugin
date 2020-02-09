@extends('layout.master2')

@section('login')

<div id="login">
    <h3 class="text-center text-white pt-5">Login form</h3>
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">
                    <form id="login-form" class="form" action="{{ action('NewController@checklogin') }}" method="post">                           
                        <h3 class="text-center text-info">Login</h3>
                        <div class="form-group">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <label for="username" class="text-info">Username:</label><br>
                            <input type="text" name="email" id="email" class="form-control">
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection