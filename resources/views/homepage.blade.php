@extends('layout.master2')

@section('home')

  <center><h3>Welcome {{ Auth::user()->email }} !</h3></center>      
  <div class="container">
    <br><a href = "{{ url('/logout') }}">Logout</a><br><br>       
    <a href = "{{ url('/profile') }}">Profile</a>        
  </div>
  
@endsection
