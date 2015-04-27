<?php namespace App\Http\Controllers;

use DB;
use Input;
use App\Quotation;
use Session;

/* Include kelas untuk graph revisi */
require_once(public_path()."/jpgraph/src/jpgraph.php");
require_once(public_path()."/jpgraph/src/jpgraph_line.php");
class GraphController extends Controller {
	
	/*
	|--------------------------------------------------------------------------
	| Graph Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "graph" for users that
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
		return view('graph');
	}
	public function add_profit(){
		$profit = Input::get('profit');
		$no_registrasi = Session::get('no_registrasi');
		$bulan = date("Y-m-d");
		$query = DB::table('ukmin_profit')->insertGetId(array('no_registrasi'=>$no_registrasi,'profit'=> $profit, 'bulan' =>$bulan));
		if($query != NULL){
			$notifikasi = "Input profit berhasil";
			
		}else{
			$notifikasi = "Input profit gagal";
		}
		Session::put('notifikasi',$notifikasi);
		return redirect('/profitGrowth');
	}
	public function create_graph(){
        // $parameterr = array();
        // $parameter['param'] = "Hello World!!";
 
        // $pdf = \PDF::loadView('graphTemplate', $parameter)->save(public_path()."Hello.pdf"); //save to file
        // return $pdf->stream("Hello.pdf"); //stream
		
		
		/* Inisiasi Nilai */
		$i;
		$jumlah_data = 0;
		$tahun = Input::get('tahun');
		//Session::put('nomor_registrasi', 123123);
		$nomor_registrasi = Input::get('no_registrasi');
		//Session::get('nomor_registrasi');
		$profit = array(0,0,0,0,0,0,0,0,0,0,0,0);
		$data = DB::table('ukmin_profit')->orderBy('bulan','asc')->select('profit','bulan')->where('no_registrasi',$nomor_registrasi)->get();
		//print_r($data);
		$data = json_decode(json_encode($data),true);
		
		for($i =0;$i<count($data);$i++){
			if(preg_match("/$tahun-0(.*)-/",$data[$i]['bulan'],$result)){
				$profit[$result['1']-1] += $data[$i]['profit'];
				$jumlah_data++;
			}
		}
		for($i =0;$i<count($profit);$i++){
			if($profit[$i] == 0){
				$profit[$i] = NULL;
			}
		}
		if($jumlah_data >0){
			/* Pembuatan Grafik */
			$graph = new \Graph(850,400);
			$graph->SetScale("textlin");
			$theme_class=new \UniversalTheme;
			$graph->SetTheme($theme_class);
			$graph->img->SetAntiAliasing(false);
			$graph->title->Set('Profit Tahun'.$tahun);
			$graph->SetBox(false);

			$graph->yaxis->HideZeroLabel();
			$graph->yaxis->HideLine(false);
			$graph->yaxis->HideTicks(false,false);

			$graph->xgrid->Show();
			$graph->xgrid->SetLineStyle("solid");
			$graph->xaxis->SetTickLabels(array("Januari", "Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"));
			$graph->xgrid->SetColor('#E3E3E3');
			$graph->ygrid->SetFill(false);
			// Create the first line
			$p1 = new \LinePlot($profit);
			$graph->Add($p1);
			$p1->SetCenter();
			$p1->SetColor("#6495ED");
			$p1->SetLegend('Profit');
			$p1->value->SetMargin(14);
			$graph->legend->SetFrameWeight(1);
			$p1->mark->SetType(MARK_FILLEDCIRCLE,'',1.0);
			
			$nama = $nomor_registrasi."-".$tahun.".jpg";
			$path = public_path()."\images\graph\\".$nama;
			if(file_exists($path)){
				unlink($path);
			}
			$graph->Stroke($path);
			
			Session::put('nama',$nama);
			return view('profitGrowth');
		}else{
			Session::put('nama',"");
			return view('profitGrowth');
		}
	}
	
	public function create_graph_dinas(){
        // $parameterr = array();
        // $parameter['param'] = "Hello World!!";
 
        // $pdf = \PDF::loadView('graphTemplate', $parameter)->save(public_path()."Hello.pdf"); //save to file
        // return $pdf->stream("Hello.pdf"); //stream
		
		$profit = array(0,0,0,0,0,0,0,0,0,0,0,0,0);
		/* Inisiasi Nilai */
		$user = Input::get('user');
		$i;
		$jumlah_data = 0;
		$tahun = Input::get('tahun');
		//Session::put('nomor_registrasi', 123123);
		$nomor_registrasi = Input::get('no_registrasi');

		//Session::get('nomor_registrasi');
		$data = DB::table('ukmin_profit')->orderBy('bulan','asc')->select('profit','bulan')->where('no_registrasi','=',$user)->get();
		$data = json_decode(json_encode($data),true);
		for($i =0;$i<count($data);$i++){
			// if(preg_match("/$tahun-0(.*)-/",$data[$i]['bulan'],$result)){
				// $profit[$result['1']-1] += $data[$i]['profit'];
				// $jumlah_data++;
			// }
			if(preg_match("/$tahun-0(.*)-/",$data[$i]['bulan'],$result)){
				 $profit[$result['1']-1] += $data[$i]['profit'];
				 $jumlah_data++;
			}
		}
		 for($i =0;$i<count($profit);$i++){
			 if($profit[$i] == 0){
				 $profit[$i] = NULL;
			 }
		 }
		
		if($jumlah_data >0){
			/* Pembuatan Grafik */
			$graph = new \Graph(850,400);
			$graph->SetScale("textlin");
			$theme_class=new \UniversalTheme;
			
			$graph->SetTheme($theme_class);
			$graph->img->SetAntiAliasing(false);
			$graph->title->Set('Profit '.$user.' Tahun'.$tahun);
			$graph->SetBox(false);
			
			$graph->img->SetAntiAliasing();

			$graph->yaxis->HideZeroLabel();
			$graph->yaxis->HideLine(false);
			$graph->yaxis->HideTicks(false,false);

			$graph->xgrid->Show();
			$graph->xgrid->SetLineStyle("solid");
			$graph->xaxis->SetTickLabels(array("Januari", "Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"));
			$graph->xgrid->SetColor('#E3E3E3');

			// Create the first line
			$p1 = new \LinePlot($profit);
			$graph->Add($p1);
			$p1->SetCenter();
			$p1->SetColor("#6495ED");
			$p1->SetLegend('Profit');
			$p1->value->SetMargin(14);
			$graph->legend->SetFrameWeight(1);
			$p1->mark->SetType(MARK_FILLEDCIRCLE,'',1.0);
			
			$nama = $user."-".$tahun.".jpg";
			$path = public_path()."\images\graph\\".$nama;
			if(file_exists($path)){
				unlink($path);
			}
			$graph->Stroke($path);
			
			Session::put('nama',$nama);
			return view('dashboardReport');
		}else{
			Session::put('nama',"");
			return view('dashboardReport');
		}
	}
}
