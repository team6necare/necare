<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Activity;
use App\Activitytype;
use Excel;

class ExcelController extends Controller
{
    public function ExportExcel(){

    	$activities = Activity::all();
    	//dd($activities);
    	Excel::create('activities',function($excel) use($activities){

    		$excel->sheet('activities',function($sheet) use($activities){
    			$sheet->loadView('ExportExcel',array('activities'=>$activities));

    		});
    	})->export('xls');

    }

     public function ExportCsv(){

    	$activities = Activity::all();
    	//dd($activities);
    	Excel::create('activities',function($excel) use($activities){

    		$excel->sheet('activities',function($sheet) use($activities){
    			$sheet->loadView('ExportExcel',array('activities'=>$activities));

    		});
    	})->export('csv');

    }
}
