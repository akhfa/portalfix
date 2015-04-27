@extends('updateUKMINLayout')

@section('content2')

	<script>
  		var d=document.getElementById("CRUDLink");
  		d.className = d.className + " active";
  		var d=document.getElementById("updateVerifikasiLink");
  		d.className = d.className + " active";
	</script>

	<br> </br>
	<div class="container">
		<!-- <div class="col-md-8"> -->
		  	<div class="contact-form">
		  		<h2>Daftar Verifikasi</h2>
			    <table class="table">
			        <thead>
			          	<tr>
			            	<th>Id.</th>
			            	<th>No Registrasi</th>
			            	<th>Status</th>
			            	<th class="row text-center">Update</th>
			          	</tr>
			        </thead>
			        <tbody>
			        	<?php
			        		$results = DB::select('select id_verifikasi, no_registrasi, status from ukmin_verifikasi');  		
			        		foreach($results as $row)
			        		{
			        			echo('<tr>');
							    echo ('<td>'.$row->id_verifikasi.'</td>');
							    echo ('<td>'.$row->no_registrasi.'</td>');
							    echo ('<td>'.$row->status.'</td>');
							    echo ('<td class="row text-center"> <a href="/updateVerifikasi?id='.$row->id_verifikasi.'"> <img src="/images/update_icon.png" alt="U Mark" style="width:20px;height:20px"> </span> </td>');
							    echo('</tr>');
							}
			        	?>
			        </tbody>
		      	</table>
    		</div>
	</div>
@stop