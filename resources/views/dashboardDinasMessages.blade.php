@extends('dashboardDinasLayout')

@section('content')
	<div class="container">
		<div class="text-center" style="font-size:20px">
			<h2 style="color:red">MESSAGE</h2>
			<br> </br>		  
			<?php
				echo ($_GET["message"]);
				echo ('<br> </br>');
				echo ('<a href="'.$_GET["back"].'">back</a>');
			?>
		</div>
	</div>
@stop