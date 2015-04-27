@extends('guestlayout')
@section('content')
	<script>
  		var d=document.getElementById("daftarUKMIndustriLink");
  		d.className = d.className + " active";
	</script>
	<!-- start main -->
	<br> </br>
	<div class="container">
		<div class="contact-form">
			<div class ="jumbotron">
				<div class="media">
					<div class="media-body">
					
						<?php
				        		$results = DB::select('select id_industri,nama_perusahaan, pemilik,produk, alamat, kontak, deskripsi, rating, jumlah_pemberi_rating from ukmin_industri where id_industri='.$_GET['id']);  		
				        		foreach($results as $row)
				        		{
								    // echo ('<td>'.$row->id_ukm.'</td>');
								    echo ('<h1 align="center" class="media-heading"><b>'.$row->nama_perusahaan.'</b></h1>');
								    echo ('<div><br></div>');
								    echo ('<div class="row"><div class="col-xs-6 col-md-4"><h4><b>Deskripsi</b></h4></div>');
								    echo ('<div class="col-xs-12 col-md-8"><h5>: '.$row->deskripsi.'</h5></div></div>');
								    echo ('<div class="row"><div class="col-xs-6 col-md-4"><h4><b>Pemilik</b></h4></div>');
								    echo ('<div class="col-xs-12 col-md-8"><h5>: '.$row->pemilik.'</h5></div></div>');
								    echo ('<div class="row"><div class="col-xs-6 col-md-4"><h4><b>Produk</b></h4></div>');
								    echo ('<div class="col-xs-12 col-md-8"><h5>: '.$row->produk.'</h5></div></div>');
								    echo ('<div class="row"><div class="col-xs-6 col-md-4"><h4><b>Kontak</b></h4></div>');
								    echo ('<div class="col-xs-12 col-md-8"><h5>: '.$row->kontak.'</h5></div></div>');
								    echo ('<div class="row"><div class="col-xs-6 col-md-4"><h4><b>Alamat</b></h4></div>');
								    echo ('<div class="col-xs-12 col-md-8"><h5>: '.$row->alamat.'</h5></div></div>');
								    echo ('<div class="row"><div class="col-xs-6 col-md-4"><h4><b>Rating</b></h4></div>');
								    echo ('<div class="col-xs-12 col-md-8"><h5>: '.round($row->rating, 2).' dari '.$row->jumlah_pemberi_rating.' orang</h5></div></div>');
								   
								   	?>
										<h4><b>Beri Rating</b></h4>
										<?php
											echo'<form id="loginForm" onsubmit="#" action="/ratingIndustri?id='.$_GET["id"].'" method="POST">';
										?>
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<select name="rating" class="form-control">
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
											</select>
											<br>
											<input type="submit" class="btn btn-info" value="Submit"></button>
										</form>
							<?php
									
								}
				        	?>
					</div>
				</div>
			</div>
    	</div>
	</div>
@stop