@extends('dashboardUKMINLayout')
@section('content')
	<script>
  		var d=document.getElementById("ReportLink");
  		d.className = d.className + " active";
	</script>

	<div class="container">
		<div class="col-md-3" style="float:left">
		  <div class="contact-form">
			<h3>Pilih Tahun</h3>
				<?php
					echo Form::open(array('url' => '/create_graph'));
						echo Form::selectRange('tahun', 2014, 2016);
						echo Form::hidden('no_registrasi',Session::get('no_registrasi'));
						echo Form::submit('Generate Grafik');
					echo Form::close();
				?>
				<?php
					//echo Session::get('no_registrasi');
				?>
				<hr/>
				<h3> Input Profit Bulanan </h3>
				<?php
					echo Form::open(array('url' => '/profitGrowth'));
						echo Form::label(date("Y-m-d"));
						echo Form::text('profit', '100000',array('style' => 'width: 100px;margin-left:5px;'));
						echo Form::submit('Input Profit');
					echo Form::close();
				?>
				<?php
					if(Session::get('notifikasi')) {
						echo Session::pull('notifikasi');
					}
				?>
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