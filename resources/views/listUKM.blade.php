@extends('updateUKMINLayout')

@section('content2')

	<script>
  		var d=document.getElementById("CRUDLink");
  		d.className = d.className + " active";
  		var d=document.getElementById("updateUKMLink");
  		d.className = d.className + " active";
	</script>

	<br> </br>
	<div class="container">
		<!-- <div class="col-md-8"> -->
		  	<div class="contact-form">
		  		<h2>Daftar UKM</h2>
			    <table class="table">
			        <thead>
			          	<tr>
			            	<th>Id.</th>
			            	<th>Name Pemilik</th>
			            	<th>Nama Perusahaan</th>
			            	<th class="row text-center">Update</th>
			          	</tr>
			        </thead>
			        <tbody>
			        	<?php
			        		$results = DB::select('select id_ukm, pemilik, nama_perusahaan from ukmin_ukm');  		
			        		foreach($results as $row)
			        		{
			        			echo('<tr>');
							    echo ('<td>'.$row->id_ukm.'</td>');
							    echo ('<td>'.$row->pemilik.'</td>');
							    echo ('<td>'.$row->nama_perusahaan.'</td>');
							    echo ('<td class="row text-center"> <a href="/updateUKM?id='.$row->id_ukm.'"> <img src="/images/update_icon.png" alt="U Mark" style="width:20px;height:20px"> </span> </td>');
							    echo('</tr>');
							}
			        	?>
			        </tbody>
		      	</table>
    		</div>
	</div>
@stop