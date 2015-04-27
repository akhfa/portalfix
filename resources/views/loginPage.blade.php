@extends('app')
@section('content')
	<script>
  		var d=document.getElementById("loginLink");
  		d.className = d.className + " active";
	</script>
	
	<link href="css/loginStyle.css" rel='stylesheet' type='text/css' />
	<link href="css/custom.css" rel="stylesheet" type="text/css" media="all" />
	<div class="container">
		<div class="login-form">
			<form id="loginForm" onsubmit="#" action="/login" method="POST">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<li>
					<input id="username" class="formlogin" name="username" type="text" class="text" placeholder="USERNAME" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'USERNAME';}"> </input>
				</li>
				<li>
					<input id="password" name="password" type="password" placeholder="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}"> </input>
				</li>
				<div class="p-container">
						<input type="submit" onclick="#" value="SIGN IN" >
						<div class="clear"> </div>
				</div>
			</form>
		</div>
	</div>

	<!--<script>
		function validateForm() {
			var usr = document.getElementById("username.value");
			var pwd = document.getElementById("password.value");

			if (usr==="" || pwd=="") {
				alert('username and password must be filled!');
				return false;
			}

			return true;
		}
	</script>-->

@stop