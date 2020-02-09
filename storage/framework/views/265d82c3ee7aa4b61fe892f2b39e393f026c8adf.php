<?php $__env->startSection('product'); ?>
<div class="container">
<div class="card">
  <div class="card-header"><h5><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalCenter">Add Product</button>
  </h5>
  <div class="col-md-4">
  <form action="<?php echo e(action('ProductCategoryController@search')); ?>" method="post"> 
    <div class="input-group-prepend">
       <?php echo csrf_field(); ?>
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
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <th scope="row"><?php echo e($row->id); ?></th>
              <td><?php echo e($row->category_id); ?></td>
              <td><?php echo e($row->name); ?></td>
              <td><?php echo e($row->price); ?></td>
              <td><?php echo e($row->description); ?></td>  
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
    </p>    
  </div>
</div>

<?php if(isset($details)): ?>
  <?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php echo e($row->name); ?>

  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

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
        <form action="<?php echo e(action('ProductCategoryController@addProduct')); ?>" method="post">
        	<?php echo csrf_field(); ?>
          <div class="form-group">
             <label for="state">Select Category</label>
        	    <select name="category" class="form-control dynamic" id="category" data-dependent="city">
        	    	<option value="">Select State</option>
        		    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        		    	<option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
        			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\resources\views/product.blade.php ENDPATH**/ ?>