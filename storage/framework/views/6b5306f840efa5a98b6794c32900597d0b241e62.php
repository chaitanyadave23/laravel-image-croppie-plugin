<?php $__env->startSection('login'); ?>

<div id="login">
    <h3 class="text-center text-white pt-5">Login form</h3>
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">
                    <form id="login-form" class="form" action="<?php echo e(action('NewController@checklogin')); ?>" method="post">                           
                        <h3 class="text-center text-info">Login</h3>
                        <div class="form-group">
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                            <label for="username" class="text-info">Username:</label><br>
                            <input type="text" name="email" id="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-info">Password:</label><br>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>                                                        
                        <div class="form-group">
                            <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                            <input type="submit" name="login" class="btn btn-info btn-md" value="Login">
                        </div>
                        <div id="register-link" class="text-right">
                            <a href="<?php echo e(url('http://localhost/laravel/public/forgotPassword')); ?>" class="text-info">Forgot Password ?</a><br><br>                            
                            <a href="<?php echo e(url('http://localhost/laravel/public/laravel')); ?>" class="text-info">Signup Here !</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\resources\views/login.blade.php ENDPATH**/ ?>