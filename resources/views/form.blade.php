@extends('Layout.master')

@section('content')

<div class="container">
  <!--  
@if($errors->any())
    <h5>Check This</h5>
    @foreach($errors->all() as $error)
        <li><font color="red">{{ $error }}</font></li>
    @endforeach  
    <br>
@endif
  -->
<form action="{{ action('NewController@insert') }}" method="post">

   @csrf
      
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email" value="{{ old('email') }}">
      @if($errors->has('email'))
        <font color="red">{{ $errors->first('email') }}</font>
      @endif    
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="Password" value="{{ old('password') }}">
        <font color="red">{{ $errors->first('password') }}</font>
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" name="address" class="form-control" id="inputAddress" placeholder="1234 Main St" value="{{ old('address') }}">
    <font color="red" value="{{ old('address') }}">{{ $errors->first('address') }}</font>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
    <label for="inputAddress2">Name</label>
    <input type="text" name="name" class="form-control" id="inputAddress2" placeholder="Name" value="{{ old('name') }}">
    <font color="red">{{ $errors->first('name') }}</font>
  </div>
  <div class="form-group col-md-6">
    <label for="phno">Phno</label>
    <input type="text" name="phno" class="form-control" id="phno" placeholder="Phone Number" value="{{ old('phno') }}">
    <font color="red">{{ $errors->first('phno') }}</font>
  </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-5">
      <label for="inputCity">City</label>
      <input type="text" name="city" class="form-control" id="inputCity" placeholder="City"  value="{{ old('city') }}">
      <font color="red">{{ $errors->first('city') }}</font>
    </div>
    <div class="form-group col-md-3">
      <label for="inputState">State</label>
        
      <select name="state" id="inputState" class="form-control" value="{{ old('state') }}">
        <option selected>{{ old('state') }}</option>
        <option>Gujarat</option>
          <option>MP</option>
          <option>Maharastra</option>
          <option>TN</option>
      </select>
      <font color="red">{{ $errors->first('state') }}</font>
    </div>
    <div class="form-group col-md-4">
      <label for="inputZip">Zip</label>
      <input type="text" name="zip" class="form-control" id="inputZip" value="{{ old('zip') }}" >
      @if($errors->has('zip'))
        <font color="red">{{ $errors->first('zip') }}</font>
      @endif
    </div>
  </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection
