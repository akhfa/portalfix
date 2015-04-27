@extends('guestlayout')
@section('content')
	<script>
  		var d=document.getElementById("daftarUKMIndustriLink");
  		d.className = d.className + " active";
	</script>
	
	<link href="css/loginStyle.css" rel='stylesheet' type='text/css' />
	<div class="container">
		<div class="login-form">
			<form id="searchForm" onsubmit="#" action="/search" method="POST">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<li>
					<input id="keyword" name="keyword" type="text" class="text" placeholder="KEYWORD" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'KEYWORD';}"> </input>
				</li>
				
				<div class="p-container">
						<input type="submit" onclick="#" value="SEARCH">
						<div class="clear"> </div>
				</div>
			</form>
		</div>
	</div>


@stop