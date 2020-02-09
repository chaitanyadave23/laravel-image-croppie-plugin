<?php $__env->startSection('content'); ?>

<div class="container">
  <!--  
<?php if($errors->any()): ?>
    <h5>Check This</h5>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><font color="red"><?php echo e($error); ?></font></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
    <br>
<?php endif; ?>
  -->
<form action="<?php echo e(action('NewController@insert')); ?>" method="post">

   <?php echo csrf_field(); ?>
      
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email" value="<?php echo e(old('email')); ?>">
      <?php if($errors->has('email')): ?>
        <font color="red"><?php echo e($errors->first('email')); ?></font>
      <?php endif; ?>    
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="Password" value="<?php echo e(old('password')); ?>">
        <font color="red"><?php echo e($errors->first('password')); ?></font>
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" name="address" class="form-control" id="inputAddress" placeholder="1234 Main St" value="<?php echo e(old('address')); ?>">
    <font color="red" value="<?php echo e(old('address')); ?>"><?php echo e($errors->first('address')); ?></font>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
    <label for="inputAddress2">Name</label>
    <input type="text" name="name" class="form-control" id="inputAddress2" placeholder="Name" value="<?php echo e(old('name')); ?>">
    <font color="red"><?php echo e($errors->first('name')); ?></font>
  </div>
  <div class="form-group col-md-6">
    <label for="phno">Phno</label>
    <input type="text" name="phno" class="form-control" id="phno" placeholder="Phone Number" value="<?php echo e(old('phno')); ?>">
    <font color="red"><?php echo e($errors->first('phno')); ?></font>
  </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-5">
      <label for="inputCity">City</label>
      <input type="text" name="city" class="form-control" id="inputCity" placeholder="City"  value="<?php echo e(old('city')); ?>">
      <font color="red"><?php echo e($errors->first('city')); ?></font>
    </div>
    <div class="form-group col-md-3">
      <label for="inputState">State</label>
        
      <select name="state" id="inputState" class="form-control" value="<?php echo e(old('state')); ?>">
        <option selected><?php echo e(old('state')); ?></option>
        <option>Gujarat</option>
          <option>MP</option>
          <option>Maharastra</option>
          <option>TN</option>
      </select>
      <font color="red"><?php echo e($errors->first('state')); ?></font>
    </div>
    <div class="form-group col-md-4">
      <label for="inputZip">Zip</label>
      <input type="text" name="zip" class="form-control" id="inputZip" value="<?php echo e(old('zip')); ?>" >
      <?php if($errors->has('zip')): ?>
        <font color="red"><?php echo e($errors->first('zip')); ?></font>
      <?php endif; ?>
    </div>
  </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\resources\views/form.blade.php ENDPATH**/ ?>