<script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
<script src="http://demo.itsolutionstuff.com/plugin/croppie.js"></script>
<link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/croppie.css">
<link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">
<div class="col-md-4 text-center">
<div id="upload-demo" style="width:350px"></div>
</div>
<div class="col-md-3" style="padding-top:30px;">
<strong>Crope Image:</strong>
<br/><br/><br/><br/> <br/><br/>
<button class="btn btn-success upload-result" data-dismiss="modal">Crop Image</button>
</div> 	
 
<script type="text/javascript">
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

$uploadCrop = $('#upload-demo').croppie({
    enableExif: true,
    viewport: {
        width: 200,
        height: 200,
        //type: 'circle'
    },
    boundary: {
        width: 300,
        height: 300     
    }
});


$('#upload').on('change', function () { 
	var reader = new FileReader();
    reader.onload = function (e) {    	
    	$uploadCrop.croppie('bind', {url: e.target.result}).then(function(){
    		console.log('jQuery bind complete');
    	});
    }
    reader.readAsDataURL(this.files[0]);
});


$('.upload-result').on('click', function (ev) {
	$uploadCrop.croppie('result', {
		type: 'canvas',
		size: 'viewport'
	}).then(function (resp1) {		
		//console.log('data-------------------',resp1);			
		$.ajax({
			type: "POST",
			url: "<?php echo e(route('crop-image')); ?>",
			data: {"image":resp1},			
			success: function (data) {								
				//$(".modal fade bd-example-modal-lg").modal('hide');
				html = '<img src="' + resp1 + '" />';
				$("#display-img").html(html);
				//$("#imgname").val(data);
				console.log('data-------------------',data);										
			}
		});
	});
});

</script><?php /**PATH C:\xampp\htdocs\laravel\resources\views/crop.blade.php ENDPATH**/ ?>