@extends('deleteUKMINLayout')

@section('content2')

	<script>
  		var d=document.getElementById("CRUDLink");
  		d.className = d.className + " active";
  		var d=document.getElementById("deleteIndustriLink");
  		d.className = d.className + " active";
	</script>

	<br> </br>
	<div class="container">
		<!-- <div class="col-md-8"> -->
		  	<div class="contact-form">
		  		<h2>Daftar Industri</h2>
			    <table class="table">
			        <thead>
			          	<tr>
			            	<th>Id.</th>
			            	<th>Name Pemilik</th>
			            	<th>Nama Perusahaan</th>
			            	<th class="row text-center">Delete</th>
			          	</tr>
			        </thead>
			        <tbody>
			        	<?php
			        		$results = DB::select('select id_industri, pemilik, nama_perusahaan from ukmin_industri');  		
			        		foreach($results as $row)
			        		{
			        			echo('<tr>');
							    echo ('<td>'.$row->id_industri.'</td>');
							    echo ('<td>'.$row->pemilik.'</td>');
							    echo ('<td>'.$row->nama_perusahaan.'</td>');
							    echo ('<td class="row text-center"> <a href="/deleteIndustriQuery?id='.$row->id_industri.'"> <img src="/images/xmark.png" alt="U Mark" style="width:20px;height:20px"> </span> </td>');
							    echo('</tr>');
							}
			        	?>
			        </tbody>
		      	</table>
    		</div>
	</div>
@stop