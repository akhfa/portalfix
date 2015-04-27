@extends('dashboardDinasLayout')

@section('content')
	<script>
  		var d=document.getElementById("ReportLink");
  		d.className = d.className + " active";
	</script>

	<!-- start main -->
	<br> </br>
	<div class="container">
		<div class="col-md-6" style="float:left">
		  <div class="contact-form">
			<h3>Dashboard Perkembangan UKM Indag</h3>
				<?php
					echo Form::open(array('url' => '/create_graph_dinas'));
						$ukms = DB::table('ukmin_ukm')->select('no_registrasi','nama_perusahaan')->get();
						$ukms = json_decode(json_encode($ukms),true);
						$industries = DB::table('ukmin_industri')->select('no_registrasi','nama_perusahaan')->get();
						$industries = json_decode(json_encode($industries),true);
						echo '<select name="user">';
						foreach($ukms as $ukm){
							echo '<option value="'.$ukm['no_registrasi'].'">'.$ukm['nama_perusahaan'].'</option>';
						}
						foreach($industries as $industri){
							echo '<option value="'.$industri['no_registrasi'].'">'.$industri['nama_perusahaan'].'</option>';
						}
						echo '</select>';
						echo Form::selectRange('tahun', 2014, 2016);
						echo Form::submit('Lihat Grafik Perkembangan');
					echo Form::close();
				?>
				<hr/>
		</div>
	</div>
		<div class="col-md-6" style="margin-left:15px;margin-top:15px;">
			<?php
				if(Session::get('nama')){
			?>
					<img src="{{ asset('images/graph/'.Session::pull('nama'))}}">
					
			<?php
				}
			?>		
		</div>
	</div>

@stop