@extends('layout.master2')

@section('profile')

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="js\jquery-cropper.js"></script>

  <center><h2>Profile Page</h2></center><br><br><br>
  <div class="container">

  @if(session('message'))
  <div class="alert alert-success" role="alert"><b>{{session('message')}}</b></div><br>
  @endif

  <form action="{{ action('NewController@update') }}" method="post">
     @csrf
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputEmail4">Email</label>
        <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email" value="{{ Auth::user()->email }}" disabled="">
        @if($errors->has('email'))
          <font color="red">{{ $errors->first('email') }}</font>
        @endif             
      </div>
      <div class="form-group col-md-6">
        <label for="inputAddress">Address</label>
        <input type="text" name="address" class="form-control" id="inputAddress" placeholder="1234 Main St" value="{{ Auth::user()->address }}">
        <font color="red" value="{{ old('address') }}">{{ $errors->first('address') }}</font>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputAddress2">Name</label>
        <input type="text" name="name" class="form-control" id="inputAddress2" placeholder="Name" value="{{ Auth::user()->name }}">
        <font color="red">{{ $errors->first('name') }}</font>
      </div>
      <div class="form-group col-md-6">
        <label for="phno">Phno</label>
        <input type="text" name="phno" class="form-control" id="phno" placeholder="Phone Number" value="{{ Auth::user()->phno  }}">
        <font color="red">{{ $errors->first('phno') }}</font>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-5">
        <label for="inputCity">City</label>
        <input type="text" name="city" class="form-control" id="inputCity" placeholder="City"  value="{{ Auth::user()->city  }}">
        <font color="red">{{ $errors->first('city') }}</font>
      </div>
      <div class="form-group col-md-3">
        <label for="inputState">State</label>  
        <select name="state" id="inputState" class="form-control" value="{{ old('state') }}">
          <option selected>{{ Auth::user()->state  }}</option>
          <option>Gujarat</option>
            <option>MP</option>
            <option>Maharastra</option>
            <option>TN</option>
        </select>
        <font color="red">{{ $errors->first('state') }}</font>
      </div>
      <div class="form-group col-md-4">
        <label for="inputZip">Zip</label>
        <input type="text" name="zip" class="form-control" id="inputZip" value="{{ Auth::user()->zip  }}" >
        @if($errors->has('zip'))
          <font color="red">{{ $errors->first('zip') }}</font>
        @endif
      </div>
    </div>
    <br><b>Profile Image</b> :
    <div style = "position:relative; left:10px; top:10px; ">
      <div id="display-img">
        <img id="image" src="{{ Auth::user()->image }}">
      </div>
    </div>
    <br>
    <div class="form-group row" action="profile.php" method="post" enctype="multipart/form-data">
      <div class="col-sm-2">
        <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>     
      </div>          
      <div class="col-sm-3">
      <input type="file" name="image" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg" value="" id="upload">
      </div>
    </div>
  </form>
  </div>

  <!-- Bootstrap Modal -->

  <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="container">
          @include('crop')
        </div>
      </div>
    </div>
  </div>
@endsection