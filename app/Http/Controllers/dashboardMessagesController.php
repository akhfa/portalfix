<?php namespace App\Http\Controllers;

use DB;
use Input;
use App\Quotation;

class DashboardMessagesController extends Controller {

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
	public function dinas()
	{
		return view('dashboardDinasMessages');
	}

	public function ukmin()
	{
		return view('dashboardUKMINMessages');
	}
}
