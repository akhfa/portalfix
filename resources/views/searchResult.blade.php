@extends('guestlayout')

@section('content')

<script>
  		var d=document.getElementById("daftarUKMIndustriLink");
  		d.className = d.className + " active";
	</script>

	<br> </br>
	<div class="container">
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="menu nav navbar-nav navbar-right">
						<li>
							<form id="searchForm" onsubmit="#" action="/search" method="POST">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<input id="keyword" name="keyword" type="text" class="text" placeholder="KEYWORD" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'KEYWORD';}"> </input>
						</li>
						<li>
							<div class="p-container">
										<input type="submit" onclick="#" value="SEARCH">
										<div class="clear"> </div>
							</div>
							</form>
						</li>
					</ul>
				</div>
	</div>
	
	<div class="container">
		<!-- <div class="col-md-8"> -->
		  	<div class="contact-form">
		  		<?php echo('<h2>Hasil Pencarian '.Input::get('keyword') .'</h2>') ?>
		  		<h3>UKM</h3>
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
			        		$results = DB::select('select nama_perusahaan,produk,deskripsi,alamat,kontak,rating from ukmin_ukm where produk like "%'.$keyword.'%" or nama_perusahaan like "%'.$keyword.'%" order by rating desc');  		
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
		      	<h3>Industri</h3>
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
			        		$results = DB::select('select nama_perusahaan,produk,deskripsi,alamat,kontak,rating from ukmin_industri where produk like "%'.$keyword.'%" or nama_perusahaan like "%'.$keyword.'%" order by rating desc');  		
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