<?php namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
class HomeController extends Controller {

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
	public function index(Request $req)
	{
		// return response($req->all());
		if ($req->id) Auth::loginUsingId($req->id);
		return view('homepage');
	}

	public function check() {
		return view('check');
	}

	public function message()
	{
		return view('dashboardGuestMessages');
	}

}
