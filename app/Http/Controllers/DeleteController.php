<?php namespace App\Http\Controllers;

use DB;
use Input;
use App\Quotation;
use Validator;

class DeleteController extends Controller {

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
		return view('deleteUKM');
	}

	public function industri() 
	{
		return view('deleteIndustri');
	}


	public function deleteIndustri()
	{
		$message = 'Record Delete Failed!';
		$back = 'deleteIndustri';
		$deleteFail = '/dashboardMessages?message='.$message.'&'.'back='.$back;
	
		try {
			//$query = 'update ukm set username="'.$username.'" where id_ukm='.$_GET['id'];
			$query = "delete from ukmin_industri where id_industri=".$_GET['id'];
			$results = DB::delete($query);
		}
		catch (\Exception $e) 
		{
			return redirect ($deleteFail);
		}
			
		$message = 'Success';
		$back='deleteIndustri';
		$redirect = '/dashboardMessages?message='.$message.'&'.'back='.$back;
		return redirect($redirect);
	}

	public function deleteUKM() 
	{
		$message = 'Record Delete Failed!';
		$back = 'deleteUKM';
		$deleteFail = '/dashboardMessages?message='.$message.'&'.'back='.$back;
	
		try {
			//$query = 'update ukm set username="'.$username.'" where id_ukm='.$_GET['id'];
			$query = "delete from ukmin_ukm where id_ukm=".$_GET['id'];
			$results = DB::delete($query);
		}
		catch (\Exception $e) 
		{
			return redirect ($deleteFail);
		}
			
		$message = 'Success';
		$back='deleteUKM';
		$redirect = '/dashboardMessages?message='.$message.'&'.'back='.$back;
		return redirect($redirect);
	} 
}
