@extends('guestlayout')

@section('content')

<script>
  		var d=document.getElementById("daftarUKMIndustriLink");
  		d.className = d.className + " active";
	</script>

	<br> </br>
	<!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="menu nav navbar-nav navbar-left">
        <li id="searchUKMLink"> <a href="#">UKM</a></li>
        <li id="searchIndustriLink"> <a href="./searchIndustri">Industri</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
	<div class="container">
		<!-- <div class="col-md-8"> -->
		  	<div class="contact-form">
		  		<h2>Daftar UKM</h2>
			    <table class="table">
			        <thead>
			          	<tr>
			            	<th>Nama Perusahaan</th>
			            	<th>Produk</th>
			            	<th>Deskripsi</th>
			            	<th>Alamat</th>
			            	<th>Kontak</th>
			            	<th>Rating</th>
			          	</tr>
			        </thead>
			        <tbody>
			        	<?php
			        		$keyword = Input::get('keyword');
			        		$results = DB::select('select nama_perusahaan,produk,deskripsi,alamat,kontak,rating from ukmin_industri where produk like "%'.$keyword.'%" order by rating desc');  		
			        		if($results!=NULL)
		        			{
			        			foreach($results as $row)
				        		{
				        			echo('<tr>');
								    echo ('<td>'.$row->nama_perusahaan.'</td>');
								    echo ('<td>'.$row->produk.'</td>');
								    echo ('<td>'.$row->deskripsi.'</td>');
								    echo ('<td>'.$row->alamat.'</td>');
								    echo ('<td>'.$row->kontak.'</td>');
								    echo ('<td>'.$row->rating.'</td>');
								    echo('</tr>');
								}
		        			}
			        	?>
			        </tbody>
		      	</table>
    		</div>
	</div>

@stop