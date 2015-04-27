<?php namespace App\Http\Controllers;

use DB;
use Input;
use App\Quotation;
use Session;

class DaftarUKMIndagController extends Controller {

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
		return view('daftarUKMIndag');
	}

	public function ratingUKM()
	{
		return view('ratingUKM');
	}

	public function ratingIndustri()
	{
		return view('ratingIndustri');
	}

	public function beriRatingUKM()
	{
		$results = DB::select('select rating, jumlah_pemberi_rating from ukmin_ukm where id_ukm='.$_GET['id']);
		$rating=0;
		$juml_pemberi=0;
		foreach ($results as $result) {
			$rating = $result->rating*$result->jumlah_pemberi_rating;
			$juml_pemberi = $result->jumlah_pemberi_rating;
		}

		$value = Input::get('rating') ;
		$rating += $value;
		$rating /= ($juml_pemberi+1);

		$query = "update ukmin_ukm set rating='".$rating."' , jumlah_pemberi_rating=jumlah_pemberi_rating+1 where id_ukm=".$_GET['id'];
		$results = DB::update($query);

		return redirect('./daftarUKMIndag');
	}

	public function beriRatingIndustri()
	{
		$results = DB::select('select rating, jumlah_pemberi_rating from ukmin_industri where id_industri='.$_GET['id']);
		$rating=0;
		$juml_pemberi=0;
		foreach ($results as $result) {
			$rating = $result->rating*$result->jumlah_pemberi_rating;
			$juml_pemberi = $result->jumlah_pemberi_rating;
		}

		$value = Input::get('rating') ;
		$rating += $value;
		$rating /= ($juml_pemberi+1);

		$query = "update ukmin_industri set rating='".$rating."' , jumlah_pemberi_rating=jumlah_pemberi_rating+1 where id_industri=".$_GET['id'];
		$results = DB::update($query);

		return redirect('./daftarUKMIndag');
	}
}