<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<div class="container">
	<div class="row">
	    <form class="col-md-4">
	        <label>Select</label>
	        <select class="form-control select2">
	           <option>Select</option> 
	           <option>Car</option> 
	           <option>Bike</option> 
	           <option>Scooter</option> 
	           <option>Cycle</option> 
	           <option>Horse</option> 
	        </select>
	    </form>
 	</div>
</div>
<script>
    $('.select2').select2();
</script>