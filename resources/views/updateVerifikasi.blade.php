@extends('updateUKMINLayout')

@section('content2')
	<script>
  		var d=document.getElementById("CRUDLink");
  		d.className = d.className + " active";
  		var d=document.getElementById("updateVerifikasiLink");
  		d.className = d.className + " active";
	</script>
	
	<!--get id Verifikasi here-->

	<div class="container">
		<div class="col-md-8">
		  <div class="contact-form">
		  	<h2>Update Verifikasi</h2>
		  		<?php
			    	echo('<form id="loginForm" onsubmit="#" action="/updateVerifikasi?id='.$_GET['id'].'" method="POST">');
			    ?>
			    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
			    	<div>
			    		<?php
			    			$results = DB::select('select id_verifikasi, no_registrasi, status from ukmin_verifikasi where id_verifikasi='.$_GET['id']);
					    	foreach($results as $row)
			        		{
							    echo ('<h5> id verifikasi = '.$row->id_verifikasi.'</h5>');
							    echo ('<h5> no registrasi = '.$row->no_registrasi.'</h5><br></br>');
							}
					    	
					    	echo('<span>status</span>');
					    	echo('<span>');
					    		echo('<select name="status" id="status" class="form-control">');
					    			if ($row->status == "not verified")
								  		echo('<option selected="selected" value="not_verified">not verified</option>');
								  	else 
								  		echo('<option value="not_verified">not verified</option>');

								  	if ($row->status == "verified")
								  		echo('<option selected="selected" value="verified">verified</option>');
								  	else
								 		echo('<option value="verified">verified</option>');

								 	if ($row->status == "suspend")
								 		echo('<option selected="selected" value="suspend">suspend</option>');
								 	else
								 		echo('<option value="suspend">suspend</option>');
								echo('</select>');
					    	echo('</span>');
				    	?>
				    </div>
				   <div>
				   		<span><input type="submit" value="Update"></span>
				  </div>
			    </form>
		    </div>
		</div>
	</div>
@stop