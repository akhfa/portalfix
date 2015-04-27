<?php namespace App\Http\Controllers;

use DB;
use Input;
use App\Quotation;
use Validator;

class UpdateController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest'); //harusnya ada middleware untuk dinas
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function updateUKMForm()
	{
		return view('updateUKM');
	}

	public function updateIndustriForm() 
	{
		return view('updateIndustri');
	}


	public function updateVerifikasiForm() 
	{
		return view('updateVerifikasi');
	}

	public function listUKM()
	{
		return view('listUKM');
	}

	public function listIndustri() 
	{
		return view('listIndustri');
	}


	public function listVerifikasi() 
	{
		return view('listVerifikasi');
	}

	public function updateUKM() 
	{
		$noreg 		= Input::get('noreg');
		$username 	= Input::get('username');
		$password 	= Input::get('password');
		$nama 		= Input::get('namaperusahaan');
		$produk 	= Input::get('produk');
		$pemilik 	= Input::get('pemilik');
		$kontak 	= Input::get('kontak');
		$alamat 	= Input::get('alamat');
		$deskripsi 	= Input::get('deskripsi');

		echo($noreg); echo('<br> <br>');
		echo($username); echo('<br> <br>');
		echo($password); echo('<br> <br>');
		echo($nama);  echo('<br> <br>');
		echo($produk);  echo('<br> <br>');
		echo($pemilik);  echo('<br> <br>');
		echo($kontak);  echo('<br> <br>');
		echo($alamat);  echo('<br> <br>');
		echo($deskripsi); echo('<br> <br>');

		//validate here
		$rules = array (
		    'noreg' => 'required',
		    'username' => 'required',
		    'namaperusahaan' => 'required',
		    'produk' => 'required',
		    'pemilik' => 'required',
		    'kontak' => 'required',
		    'alamat' => 'required',
		    'deskripsi' => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) 
		{
			//fail message
			$message = 'All forms must be filled! except password';
			$back = 'updateUKM?id='.$_GET['id'];
			$redirect = '/dashboardMessages?message='.$message.'&'.'back='.$back;
			return redirect($redirect);
		}
		else 
		{
			$message = 'Record Update Failed!';
			$back = 'updateUKM?id='.$_GET['id'];
			$updateFail = '/dashboardMessages?message='.$message.'&'.'back='.$back;

			if ($password!="")
			{
				try {
					//$query = 'update ukm set username="'.$username.'" where id_ukm='.$_GET['id'];
					$query = "update ukmin_ukm set username='".$username."', password='".$password."', no_registrasi='".$noreg."', nama_perusahaan='".$nama."', produk='".$produk."', pemilik='".$pemilik."', 
					alamat='".$alamat."', deskripsi='".$deskripsi."', kontak='".$kontak."' where id_ukm=".$_GET['id'];
					$results = DB::update($query);
				}
				catch (\Exception $e) 
				{
					return redirect ($updateFail);
				}
			}
			else 
			{
				try {
					$query = "update ukmin_ukm set username='".$username."', no_registrasi='".$noreg."', nama_perusahaan='".$nama."', produk='".$produk."', pemilik='".$pemilik."', 
					alamat='".$alamat."', deskripsi='".$deskripsi."', kontak='".$kontak."' where id_ukm=".$_GET['id'];
					$results = DB::update($query);
				}
				catch (\Exception $e)
				{
					return redirect ($updateFail);
				}
			}

			$message = 'Success';
			$back='listUKM';
			$redirect = '/dashboardMessages?message='.$message.'&'.'back='.$back;
			return redirect($redirect);
		}
	} 

	public function updateIndustri() 
	{
		$noreg 		= Input::get('noreg');
		$username 	= Input::get('username');
		$password 	= Input::get('password');
		$nama 		= Input::get('namaperusahaan');
		$produk 	= Input::get('produk');
		$pemilik 	= Input::get('pemilik');
		$kontak 	= Input::get('kontak');
		$alamat 	= Input::get('alamat');
		$deskripsi 	= Input::get('deskripsi');

		echo($noreg); echo('<br> <br>');
		echo($username); echo('<br> <br>');
		echo($password); echo('<br> <br>');
		echo($nama);  echo('<br> <br>');
		echo($produk);  echo('<br> <br>');
		echo($pemilik);  echo('<br> <br>');
		echo($kontak);  echo('<br> <br>');
		echo($alamat);  echo('<br> <br>');
		echo($deskripsi); echo('<br> <br>');

		//validate here
		$rules = array (
		    'noreg' => 'required',
		    'username' => 'required',
		    'namaperusahaan' => 'required',
		    'produk' => 'required',
		    'pemilik' => 'required',
		    'kontak' => 'required',
		    'alamat' => 'required',
		    'deskripsi' => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) 
		{
			//fail message
			$message = 'All forms must be filled! except password';
			$back = 'updateIndustri?id='.$_GET['id'];
			$redirect = '/dashboardMessages?message='.$message.'&'.'back='.$back;
			return redirect($redirect);
		}
		else 
		{
			$message = 'Record Update Failed!';
			$back = 'updateIndustri?id='.$_GET['id'];
			$updateFail = '/dashboardMessages?message='.$message.'&'.'back='.$back;

			if ($password!="")
			{
				try {
					$query = "update ukmin_industri set username='".$username."', password='".$password."', no_registrasi='".$noreg."', nama_perusahaan='".$nama."', produk='".$produk."', pemilik='".$pemilik."', 
					alamat='".$alamat."', deskripsi='".$deskripsi."', kontak='".$kontak."' where id_industri=".$_GET['id'];
					$results = DB::update($query);
				}
				catch (\Exception $e) 
				{
					return redirect ($updateFail);
				}
			}
			else 
			{
				try {
					$query = "update ukmin_industri set username='".$username."', no_registrasi='".$noreg."', nama_perusahaan='".$nama."', produk='".$produk."', pemilik='".$pemilik."', 
					alamat='".$alamat."', deskripsi='".$deskripsi."', kontak='".$kontak."' where id_industri=".$_GET['id'];
					$results = DB::update($query);
				}
				catch (\Exception $e)
				{
					return redirect ($updateFail);
				}
			}

			$message = 'Success';
			$back='listIndustri';
			$redirect = '/dashboardMessages?message='.$message.'&'.'back='.$back;
			return redirect($redirect);
		}
	}

	public function updateVerifikasi() 
	{
		$status = Input::get('status');

		$message = 'Record Update Failed!';
		$back = 'updateVerifikasi?id='.$_GET['id'];
		$updateFail = '/dashboardMessages?message='.$message.'&'.'back='.$back;

		
		try {
			$query = "update ukmin_verifikasi set status='".$status."' where id_verifikasi=".$_GET['id'];
			$results = DB::update($query);
		}
		catch (\Exception $e) 
		{
			return redirect ($updateFail);
		}
		

		$message = 'Success';
		$back='listVerifikasi';
		$redirect = '/dashboardMessages?message='.$message.'&'.'back='.$back;
		return redirect($redirect);

	}
}
