<?php namespace App\Http\Controllers;

use DB;
use Input;
use App\Quotation;
use Validator;

class UpdateProfileController extends Controller {

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
	public function index()
	{
		return View::make('dashboardUKMIN');
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
			$back = 'dashboardUKMIN';
			$redirect = '/dashboardUKMINMessages?message='.$message.'&'.'back='.$back;
			return redirect($redirect);
		}
		else 
		{
			$message = 'Record Update Failed!';
			$back = '='.$_GET['id'];
			$updateFail = '/dashboardUKMINMessages?message='.$message.'&'.'back='.$back;

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
			$back='dashboardUKMIN';
			$redirect = '/dashboardUKMINMessages?message='.$message.'&'.'back='.$back;
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
			$back = 'dashboardUKMIN';
			$redirect = '/dashboardUKMINMessages?message='.$message.'&'.'back='.$back;
			return redirect($redirect);
		}
		else 
		{
			$message = 'Record Update Failed!';
			$back = 'dashboardUKMIN';
			$updateFail = '/dashboardUKMINMessages?message='.$message.'&'.'back='.$back;

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
			$back='dashboardUKMIN';
			$redirect = '/dashboardUKMINMessages?message='.$message.'&'.'back='.$back;
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
