<?php namespace App\Http\Controllers;
use App\Quotation;

class PrintController extends Controller 
{
    public function index()
    {
		$pdf = \PDF::loadHTML('<h1>Test</h1>')->Save('../a.pdf');
		//return $pdf->stream();
    }
}