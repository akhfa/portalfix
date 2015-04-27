<?php namespace App\Http\Controllers;

use DB;
use Input;
use App\Quotation;
use Validator;

class CreateController extends Controller {

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
	public function ukm()
	{
		return view('createUKM');
	}

	public function industri() 
	{
		return view('createIndustri');
	}


	public function createUKM() 
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
			$back = 'createUKM';
			$redirect = '/dashboardMessages?message='.$message.'&'.'back='.$back;
			return redirect($redirect);
		}
		else 
		{
			$message = 'Record Create Failed!';
			$back = 'createUKM';
			$insertFail = '/dashboardMessages?message='.$message.'&'.'back='.$back;

			if ($password!="")
			{
				try {
					$results = DB::insert('insert into ukmin_ukm (username, password, no_registrasi, nama_perusahaan, produk
						, pemilik, alamat, deskripsi, kontak) values (?, ?, ?, ?, ?, ?, ?, ?, ?)', array($username, $password, $noreg, $nama, 
						$produk, $pemilik, $alamat, $deskripsi, $kontak));
				}
				catch (\Exception $e) 
				{
					return redirect ($insertFail);
				}
			}
			else 
			{
				try {
					$results = DB::insert('insert into ukmin_ukm (username, no_registrasi, nama_perusahaan, produk
						, pemilik, alamat, deskripsi, kontak) values (?, ?, ?, ?, ?, ?, ?, ?)', array($username, $noreg, $nama, 
						$produk, $pemilik, $alamat, $deskripsi, $kontak));
				}
				catch (\Exception $e)
				{
					return redirect ($insertFail);
				}
			}

			$message = 'Success';
			$redirect = '/dashboardMessages?message='.$message.'&'.'back='.$back;
			return redirect($redirect);
		}
	} 

	public function createIndustri() 
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
			$back = 'createIndustri';
			$redirect = '/dashboardMessages?message='.$message.'&'.'back='.$back;
			return redirect($redirect);
		}
		else 
		{
			$message = 'Record Create Failed!';
			$back = 'createIndustri';
			$insertFail = '/dashboardMessages?message='.$message.'&'.'back='.$back;

			if ($password!="")
			{
				try {
					$results = DB::insert('insert into ukmin_industri (username, password, no_registrasi, nama_perusahaan, produk
						, pemilik, alamat, deskripsi, kontak) values (?, ?, ?, ?, ?, ?, ?, ?, ?)', array($username, $password, $noreg, $nama, 
						$produk, $pemilik, $alamat, $deskripsi, $kontak));
				}
				catch (\Exception $e) 
				{
					return redirect ($insertFail);
				}
			}
			else 
			{
				try {
					$results = DB::insert('insert into ukmin_industri (username, no_registrasi, nama_perusahaan, produk
						, pemilik, alamat, deskripsi, kontak) values (?, ?, ?, ?, ?, ?, ?, ?)', array($username, $noreg, $nama, 
						$produk, $pemilik, $alamat, $deskripsi, $kontak));
				}
				catch (\Exception $e)
				{
					return redirect ($insertFail);
				}
			}

			$message = 'Success';
			$redirect = '/dashboardMessages?message='.$message.'&'.'back='.$back;
			return redirect($redirect);
		}
	} 
}
