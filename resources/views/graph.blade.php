
@extends('guestlayout')

@section('content')
	
	<script>
  		var d=document.getElementById("homepageLink");
  		d.className = d.className + " active";
	</script>

	<br> </br>
	<div class="container">
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				<div id="stocks-div">
				{{$result}}
				</div>
			</div> <!-- Carousel -->
	</div>
@stop