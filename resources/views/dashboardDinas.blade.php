@extends('dashboardDinasLayout')

@section('content')
	<script>
  		var d=document.getElementById("dashboardLink");
  		d.className = d.className + " active";
	</script>

	<!-- start main -->
	<br> </br>
	<div class="container">
		<h2>DAFTAR UKMI UNTUK DIVERIFIKASI</h2>
		<div class="row footer">
			<div class="col-md-3 span1_of_4">
			<?php
				$results = DB::select('select * from ukmin_verifikasi where status="not verified"');
				foreach ($results as $row)
				{
					echo ('<p><a href="/updateVerifikasi?id='.$row->id_verifikasi.'"><h5>'.$row->no_registrasi.'</h5></a></p>');
				}
			?>
			</div>
		</div>
	</div>

@stop