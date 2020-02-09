<?php $__env->startSection('home'); ?>

  <center><h3>Welcome <?php echo e(Auth::user()->email); ?> !</h3></center>      
  <div class="container">
    <br><a href = "<?php echo e(url('/logout')); ?>">Logout</a><br><br>       
    <a href = "<?php echo e(url('/category')); ?>">Category</a>        
    <a href = "<?php echo e(url('/product')); ?>">Product</a>    
  </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\resources\views/dashboard.blade.php ENDPATH**/ ?>