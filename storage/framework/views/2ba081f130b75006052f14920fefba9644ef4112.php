<?php $__env->startSection('state'); ?>
    <div class="container">
        <div class="card">
            <div class="card-body">   
        	<form>
        	  <div class="form-group col-md-4">
        	    <label for="state">Select State</label>
        	    <select name="state" class="form-control dynamic" id="state" data-dependent="city">
        	    	<option value="">Select State</option>
        		    <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        		    	<option value="<?php echo e($state->name); ?>"><?php echo e($state->name); ?></option>
        			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        	    </select>   
        	  </div>
        	  <div class="form-group col-md-4">
        	    <label for="city">Select City</label>
        	    <select name="city" class="form-control" id="city">
        	    	<option value="">Select City</option>	      	                             
        	    </select>     
        	  </div>
        	</form>
    	</div>
      </div>
    </div>  
<script type="text/javascript">

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $(document).ready(function(){
        $('.dynamic').change(function(){
            if($(this).val != ''){
                var value = $(this).val();
                console.log("hello");console.log(value);
                $.ajax({
                    url:"<?php echo e(route('fetchdata')); ?>",
                    type:"POST",
                    data:{value:value},
                    success:function(result){
                        $("#city").html(result);
                        console.log('success');                                                
                    }                                               
                });                                                 
            }
        });
    });
    
</script> 

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\resources\views/state.blade.php ENDPATH**/ ?>