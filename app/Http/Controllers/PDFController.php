<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Activity;
use App\Activitytype;
use PDF;

class PDFController extends Controller
{
    public function pdf(){

    	$activities = Activity::all();
    	$pdf= PDF::loadView('pdf',['activities' => $activities]);
    	return $pdf->download('activities.pdf');
    }
}
