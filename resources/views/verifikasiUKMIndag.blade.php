@extends('guestlayout')
@section('content')
	<script>
  		var d=document.getElementById("verifikasiUKMIndagLink");
  		d.className = d.className + " active";
	</script>
	<!-- start main -->
	<br> </br>
	<div class="container">
		<div class="page-header">
		   <h1> Masukkan No Registrasi Anda </h1>
		   <p style="font-size:12px"> *no registrasi didapat dari sistem perujinan terpadu</p>
		</div>
		
		<form id="formVerifikasiUKMIndag" onclick="" action="/verifikasiUKMIndag" class="form-inline" method="POST">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
		    <input name="no_registrasi" type="text" class="form-control" placeholder="no registasi">
			<input type="submit" class="btn btn-success"> </input>
			</div>
		</form>
	</div>
@stop