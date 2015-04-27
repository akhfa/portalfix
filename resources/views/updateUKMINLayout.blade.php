@extends('dashboardDinasLayout')

@section('content')
	<br> </br>
	<div class="container">
		<nav class="navbar" role="navigation">
		  <div class="container-fluid">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			e-UKMI BANDUNG
		      <ul class="menu nav navbar-nav navbar-right">
		        <li id="updateIndustriLink"> <a href="./listIndustri">Industri</a></li>
		        <li id="updateUKMLink"><a href="./listUKM">UKM</a></li>
		        <li id="updateVerifikasiLink"><a href="./listVerifikasi">Verifikasi</a></li>
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
	</div>

	@yield('content2')
@stop