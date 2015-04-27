<?php // content="text/plain; charset=utf-8"
require_once ('../jpgraph.php');
require_once ('../jpgraph_line.php');

$datay1 = array(21.96,21.96,21.96,21.96,21.96,21.96,21.96,21.96,22.31,24.84,28.39,32.12,35.74,39.95,44.60,49.83,57.32,63.88,70.75,77.89,85.44,93.30,97.77,100.00);
$datay2 = array(NULL,NULL,NULL,NULL,NULL,NULL,NULL,52.3690,52.3690,52.3790,52.5290,53.7570,55.8750,58.0120,60.9430,63.9490,66.9680,70.0940,73.1080,76.4590,80.5120,84.5970,88.6860,92.5660,96.0440,99.1930,100.0000 );
$datay3 = array(17.10,17.10,17.10,17.10,17.14,17.19,17.23,17.27,18.86,21.06,23.53,26.57,29.74,33.03,40.80,48.04,55.51,62.15,68.97,76.66,84.62,92.19,98.07,99.97,100.00,100.00);
// Setup the graph
$graph = new Graph(800,650);
$graph->SetScale("textlin");

$theme_class=new UniversalTheme;

$graph->SetTheme($theme_class);
$graph->img->SetAntiAliasing(false);
$graph->title->Set('Kurva S Rencana');
$graph->SetBox(false);

$graph->img->SetAntiAliasing();

$graph->yaxis->HideZeroLabel();
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

$graph->xgrid->Show();
$graph->xgrid->SetLineStyle("solid");
$graph->xaxis->SetTickLabels(array('M58','M59','M60','M61','M62','M63','M64','M65','M66','M67','M68','M69','M70','M71','M72','M73','M74','M75','M76','M77','M78','M79','M80','M81'));
$graph->xgrid->SetColor('#E3E3E3');
/* $graph->SetBackgroundImage("tiger_bkg.png",BGIMG_FILLPLOT); */

// Create the first line
$p1 = new LinePlot($datay1);
$graph->Add($p1);
$p1->SetColor("#6495ED");
$p1->SetLegend('Overall');
$graph->legend->SetFrameWeight(1);

$p2 = new LinePlot($datay2);
$graph->Add($p2);
$p2->SetColor("#200000");
$p2->SetLegend('Group 1');
$graph->legend->SetFrameWeight(1);

$p3 = new LinePlot($datay3);
$graph->Add($p3);
$p3->SetColor("#1400ED");
$p3->SetLegend('Group 2');
$graph->legend->SetFrameWeight(1);
// Output line
$graph->Stroke();

?>


