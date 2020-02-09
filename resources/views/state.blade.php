@extends('layout.master2')
@section('state')
    <div class="container">
        <div class="card">
            <div class="card-body">   
        	<form>
        	  <div class="form-group col-md-4">
        	    <label for="state">Select State</label>
        	    <select name="state" class="form-control dynamic" id="state" data-dependent="city">
        	    	<option value="">Select State</option>
        		    @foreach($states as $state)
        		    	<option value="{{ $state->name }}">{{ $state->name }}</option>
        			@endforeach
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
                    url:"{{ route('fetchdata') }}",
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

@endsection