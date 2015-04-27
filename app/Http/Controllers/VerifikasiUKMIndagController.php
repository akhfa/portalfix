<?php namespace App\Http\Controllers;

use DB;
use Input;
use App\Quotation;
use Session;

class VerifikasiUKMIndagController extends Controller {

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
		$this->middleware('guest');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('verifikasiUKMIndag');
	}

	public function validateNoReg()
	{
		$no_registrasi = Input::get('no_registrasi');
		$message = "Verifikasi Failed";
		$back = "/verifikasiUKMIndag";
		$insertFail = '/dashboardGuestMessages?message='.$message.'&'.'back='.$back;

		$results = DB::select('select * from ukmin_perijinan where no_registrasi="'.$no_registrasi.'"');
		if ($results!=NULL) 
		{
			$ktp = "";
			$jenis = "";
			foreach ($results as $row) {
				$ktp = $row->ktp;
				$jenis = "ukmin_".$row->jenis;
			}
			$results = DB::select('select * from ukmin_dukcapil where ktp="'.$ktp.'"');

			if ($results!=NULL)
			{
				foreach ($results as $row) {
					$username = $row->username;
					$password = $row->password;
				}

				try {
				$results = DB::insert('insert into '.$jenis.' (username, password, no_registrasi, nama_perusahaan, produk
						, pemilik, alamat, deskripsi, kontak) values (?, ?, ?, ?, ?, ?, ?, ?, ?)', array($username, $password, $no_registrasi, "NA", 
						"NA", "NA", "NA", "NA", "NA"));

				$results = DB::insert('insert into ukmin_verifikasi (no_registrasi) values (?)', array($no_registrasi));
				}
				catch (\Exception $e) 
				{

					$message = "Verifikasi Success<br> </br> Verifikasi Anda sudah masuk, silahkan coba login atau tunggu perubahan status dari admin";
					$back = "/verifikasiUKMIndag";
					$verifikasiSuccess = '/dashboardGuestMessages?message='.$message.'&'.'back='.$back;
					return redirect($verifikasiSuccess);
				}

				$message = "Verifikasi Success<br> </br> Silahkan menunggu perubahan status dari admin untuk dapat login";
				$back = "/verifikasiUKMIndag";
				$verifikasiSuccess = '/dashboardGuestMessages?message='.$message.'&'.'back='.$back;
				return redirect($verifikasiSuccess);
			}
			else 
			{
				return redirect ($insertFail);	
			}
		}
		else 
		{
			$results = DB::select('select * from ukmin_verifikasi where no_registrasi="'.$no_registrasi.'"');
			if ($results!=NULL) 
			{
				$status;
				$message;
				foreach ($results as $row) 
				{
					$status=$row->status;
				}
				if ($status=='not verified') {
					$message = "Verifikasi Success<br> </br> Silahkan menunggu perubahan status dari admin untuk dapat login";
				}
				else if ($status=='verified') {
					$message = "Verifikasi Success<br> </br> Anda sudah terverifikasi";
				}
				else {
					$message = "Verifikasi Success<br> </br> Masa ijin usaha Anda sudah habis";
				}
				$back = "/verifikasiUKMIndag";
				$verifikasiSuccess = '/dashboardGuestMessages?message='.$message.'&'.'back='.$back;
				return redirect($verifikasiSuccess);
			}
			else
				return redirect ($insertFail);
		}
	}

}
