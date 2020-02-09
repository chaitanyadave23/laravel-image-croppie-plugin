@extends('layout.master2')
@section('product')
<div class="container">
<div class="card">
  <div class="card-header"><h5><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalCenter">Add Product</button>
  </h5>
  <div class="col-md-4">
  <form action="{{ action('ProductCategoryController@search') }}" method="post"> 
    <div class="input-group-prepend">
       @csrf
    <input type="search" name="search" id="search" class="form-control"></input>
    <span class="input-group-prepend">      
      <button type="submit" class="btn btn-primary">Search</button>
    </span>    
  </div>
  </form>
</div>
</div>
  <div class="card-body">
    <h5 class="card-title"></h5>
    <p class="card-text">
        <h5>Products</h5><br>
        <table class="table table-striped table-bordered table-sm">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Product ID</th>
              <th scope="col">Name</th>
              <th scope="col">Price</th>
              <th scope="col">Description</th>
            </tr>
          </thead>
          <tbody>                                
            @foreach($products as $row)
            <tr>
              <th scope="row">{{ $row->id }}</th>
              <td>{{ $row->category_id }}</td>
              <td>{{ $row->name }}</td>
              <td>{{ $row->price }}</td>
              <td>{{ $row->description }}</td>  
            </tr>
            @endforeach
          </tbody>
        </table>
    </p>    
  </div>
</div>

@if(isset($details))
  @foreach($details as $row)
    {{ $row->name }}
  @endforeach
@endif

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Add a New Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>      
      <div class="modal-body">
        <form action="{{ action('ProductCategoryController@addProduct') }}" method="post">
        	@csrf
          <div class="form-group">
             <label for="state">Select Category</label>
        	    <select name="category" class="form-control dynamic" id="category" data-dependent="city">
        	    	<option value="">Select State</option>
        		    @foreach($categories as $category)
        		    	<option value="{{ $category->id }}">{{ $category->name }}</option>
        			@endforeach
        	    </select>   
          </div>          
          <div class="form-group">            
            <label for="exampleFormControlInput1">Product Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Product Name">
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1">Price</label>
            <input type="float" class="form-control" name="price" id="price" placeholder="Price">
          </div>

          <div class="form-group">
            <label for="description">Product Description</label>
            <textarea class="form-control" name="description" id="description" rows="3"></textarea>
          </div>
          <div class="modal-footer">    
          <button type="submit" class="btn btn-primary">Add Product</button>
          </div>
        </form>
      </div>          
    </div>
  </div>
</div>
</div>

@endsection