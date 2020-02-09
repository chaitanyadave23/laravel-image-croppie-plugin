@extends('layout.master2')

@section('category')

<div class = "container">
<div class="card">
  <h5 class="card-header"><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalCenter">Add Category</button>

</h5>
  <div class="card-body">
    <h5 class="card-title"></h5>
    <p class="card-text">
        <h5>Categories</h5><br>
        <table class="table table-striped table-bordered table-sm table-responsive">
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">Name</th>
              <th scope="col">Description</th>
            </tr>
          </thead>
          <tbody>
            @foreach($categories as $row)
            <tr>
              <th scope="row">{{ $row->id }}</th>
              <td>{{ $row->name }}</td>
              <td>{{ $row->description }}</td>  
            </tr>
            @endforeach
          </tbody>
        </table>
    </p>    
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Add a New Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>      
      <div class="modal-body">
        <form action="{{ action('ProductCategoryController@addCategory') }}" method="post">
          <div class="form-group">
            @csrf
            <label for="exampleFormControlInput1">Category Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Product Name">
          </div>
          <div class="form-group">
            <label for="description">Category Description</label>
            <textarea class="form-control" name="description" id="description" rows="3"></textarea>
          </div>
          <div class="modal-footer">    
          <button type="submit" class="btn btn-primary">Add Category</button>
          </div>
        </form>
      </div>          
    </div>
  </div>
</div>
</div>

@endsection