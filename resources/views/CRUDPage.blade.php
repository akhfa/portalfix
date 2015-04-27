@extends('dashboardDinasLayout')

@section('content')
	<script>
  		var d=document.getElementById("CRUDLink");
  		d.className = d.className + " active";
	</script>

	<!-- start main -->
	<br> </br>
	<div class="container">
	<div class="row grids_of_3">
					<div class="col-md-4 grid1_of_3">
						  <h2>tambah data</h2>
						  <img src="images/icon1.png" class="img-responsive"/>
						  <p>Tambahkan Industri atau UKM baru ke sistem</p>
					     <div class="rd_more1">
							<a href="./createIndustri"><button class="btn_style">TAMBAH</button></a>
						</div>					
					</div>
					<div class="col-md-4 grid1_of_3">
						<h2>HAPUS DATA</h2>
						  <img src="images/icon3.png" class="img-responsive"/>
						  <p>Hapus data Industri atau UKM dari sistem</p>
					      <div class="rd_more1">
							<a href="./deleteUKM"><button class="btn_style">HAPUS</button></a>
						</div>					
					</div>
					<div class="col-md-4 grid1_of_3">
						<h2>ubah data</h2>
						  <img src="images/icon2.png" class="img-responsive"/>
						  <p>Ubah data dari Industri atau UKM</p>
					     <div class="rd_more1">
							<a href="./listIndustri"><button class="btn_style">UBAH</button></a>
						</div>	
					</div>
				    <div class="clearfix"></div>
		</div>
	</div>
@stop