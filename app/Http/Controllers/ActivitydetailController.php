<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;  
use App\Http\Controllers\Controller;
use App\Activitydetail;
use App\Activity;
use App\Volunteer;
use App\Victim;
use App\Employee;
use App\Http\Requests;
use Carbon\Carbon;
use Auth;
use DB;

class ActivitydetailController extends Controller
{
      /**
     * die()splay a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index (Request $request)
    {   
        $search = $request->get('search');
        $volunteers = Volunteer::all();

        


        if (Auth::check() && Auth::user()->hasRole('volunteer')) {
        $current_user_email = Auth::user()->email;
        //dd($current_user_email) ;
        $current_volunteer_id = Volunteer::where('email',$current_user_email)->value('id');
        //dd($current_volunteer_id); 
        $activitydetails = Activitydetail::where ('volunteer_id',$current_volunteer_id)->orderBy('id','DESC')->get(); 
        //dd($activitydetails);
       
        }    
        else {
        $activitydetails = Activitydetail::orderBy('id','DESC')->paginate(5);
        } 
        return view('activitydetails.index', compact('activitydetails','currentSearch'));
           // ->with('i', ($request->input('page', 1) - 1) * 5);

    }

    public function involvement (Request $request)
    {

        //$carbon=Carbon::now(-5);
        //dd($carbon);
        $activitystatus= array("Upcoming","Ongoing","Past"); 
        $volunteers = Volunteer::all();

         if (Auth::check() && Auth::user()->hasRole('volunteer')) {
        $current_user_email = Auth::user()->email;
        //dd($current_user_email) ;
        $current_volunteer_id = Volunteer::where('email',$current_user_email)->value('id');

        //$activitydetails = Activitydetail::orderBy('id','DESC')->paginate(5);
         $activitydetails = Activitydetail::where ('volunteer_id',$current_volunteer_id)->orderBy('id','DESC')->get(); 
     }
        else
            {
        $activitydetails = Activitydetail::orderBy('id','DESC')->paginate(5);
        } 
        return view('activitydetails.involvement', compact('activitydetails', 'activitystatus'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

      public function status (Request $request)
    {

        $activitystatus= $request->input('activitystatus');

        $volunteers = Volunteer::all();
      
      if (Auth::check() && Auth::user()->hasRole('volunteer')) {
        $current_user_email = Auth::user()->email;
        //dd($current_user_email) ;
        $current_volunteer_id = Volunteer::where('email',$current_user_email)->value('id');
        //dd($current_volunteer_id); 
        if ($activitystatus == "Upcoming") {
            $upcoming= Activity::where('start_datetime', '>', Carbon::now(-5))->orderBy('start_datetime', 'desc')->get();

            for ($i = 0; $i < sizeof($upcoming); $i++) {
                $activitydetails = Activitydetail::where('activity_id', $upcoming[$i]->id)->where ('volunteer_id',$current_volunteer_id)
                ->get(); 

                if(sizeof($activitydetails) > 0) {
                $data[$i] = $activitydetails;
            }
            }
            
            
        } elseif ($activitystatus == "Past") {
            $data = array();
             $past = Activity::where('end_datetime', '<', Carbon::now(-5))->orderBy('end_datetime', 'desc')->get();

            for ($i = 0; $i < sizeof($past); $i++) {
                $activitydetails = Activitydetail::where('activity_id', $past[$i]->id)->where ('volunteer_id',$current_volunteer_id)
                ->get(); 

                if(sizeof($activitydetails) > 0) {
                $data[$i] = $activitydetails;

            }
                
            }   
        } elseif ($activitystatus == "Ongoing") {
            $data = array();
             $past = Activity::where([['start_datetime', '<=', Carbon::now(-5)],['end_datetime', '>=', Carbon::now(-5)],])->orderBy('end_datetime', 'desc')->get();
            for ($i = 0; $i < sizeof($past); $i++) {
                $activitydetails = Activitydetail::where('activity_id', $past[$i]->id)->where ('volunteer_id',$current_volunteer_id)
                ->get(); 

                if(sizeof($activitydetails) > 0) {
                $data[$i] = $activitydetails;
            }
            }   
        } 

        elseif ($activitystatus == "All")
        { 
            return redirect()->route('activitydetails.involvement');
        }

}
     else
     {

         if ($activitystatus == "Upcoming") {
            $upcoming= Activity::where('start_datetime', '>', Carbon::now(-5))->orderBy('start_datetime', 'desc')->get();
            for ($i = 0; $i < sizeof($upcoming); $i++) {
                $activitydetails = Activitydetail::where('activity_id', $upcoming[$i]->id)->get(); 
                $data[$i] = $activitydetails;
            }
     
        } elseif ($activitystatus == "Past") {
            $data = array();
             $past = Activity::where('end_datetime', '<', Carbon::now(-5))->orderBy('end_datetime', 'desc')->get();
            for ($i = 0; $i < sizeof($past); $i++) {
                $activitydetails = Activitydetail::where('activity_id', $past[$i]->id)->get(); 
                $data[$i] = $activitydetails;

                
            }   
        } elseif ($activitystatus == "Ongoing") {
            $data = array();
             $past = Activity::where([['start_datetime', '<=', Carbon::now(-5)],['end_datetime', '>=', Carbon::now(-5)],])->orderBy('end_datetime', 'desc')->get();
            for ($i = 0; $i < sizeof($past); $i++) {
                $activitydetails = Activitydetail::where('activity_id', $past[$i]->id)->get(); 
                $data[$i] = $activitydetails;
            }   
        }
        elseif ($activitystatus == "All")
        { 
            return redirect()->route('activitydetails.involvement');
        }
        
     }
        return view('activitydetails.status', compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //$current_activity_id=Activitydetail::value('activity_id') ;
        $activitydetails=Activitydetail::orderBy('id','DESC');
        //monica 25 April 2017 $activities=Activity::lists('description','id');
        $activities=Activity::get()->lists('full_name', 'id');		
        //$startdatetimes=Activity::where ('id',$current_activity_id)->lists('start_datetime','id');
        $startdatetimes=Activity::lists('start_datetime','id');
        //$enddatetimes=Activity::where ('id',$current_activity_id)->lists('end_datetime','id');
        $enddatetimes=Activity::lists('end_datetime','id');
        $volunteers = Volunteer::all()->lists('full_name', 'id');
        $victims = Victim::all()->lists('full_name', 'id');
        $employees=Employee::all()->lists('full_name','id');
        //return view('activitydetails.create', compact('activities','name','victims','employees'));
        return view('activitydetails.create', compact('activitydetails','activities','volunteers','victims','employees','startdatetimes','enddatetimes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'activity_id' => 'required',
            'volunteer_id' => 'required',
            'victim_id' => 'required',
            'employee_id' => 'required',
            'comments',
            'feedback',
			//need to validate date n volunteer details... 
			
        ]);
		
        Activitydetail::create($request->all());

        return redirect()->route('activitydetails.index')
                        ->with('success','Activity Detail was created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$victims = Victim::find($id);
        //return view('victims.show',compact('victims'));

        $activitydetails = Activitydetail::find($id);

        $activid=$activitydetails->activity_id;
        $activities=Activity::find($activid);

        $volunteerid=$activitydetails->volunteer_id;
        $volunteers=Volunteer::find($volunteerid);

        $victimid=$activitydetails->victim_id;
        $victims=Victim::find($victimid);

        $employeeid=$activitydetails->employee_id;
        $employees=Employee::find($employeeid);


        return view('activitydetails.show',compact('activitydetails', 'activities','volunteers','victims','employees'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $activitydetails = Activitydetail::find($id);
        //monica 25 April 2017 $activities=Activity::lists('description','id');
        $activities=Activity::get()->lists('full_name', 'id');
		
        $startdatetimes=Activity::lists('start_datetime','id');
        $enddatetimes=Activity::lists('end_datetime','id');
        $volunteers = Volunteer::all()->lists('full_name', 'id');
        $victims = Victim::all()->lists('full_name', 'id');
        $employees=Employee::all()->lists('full_name','id');
        return view('activitydetails.edit',compact('activitydetails', 'activities','volunteers','victims','employees','startdatetimes','enddatetimes'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'activity_id' => 'required',
            'volunteer_id' => 'required',
            'victim_id' => 'required',
            'employee_id' => 'required',
            'comments',
            'feedback',
        ]);

        Activitydetail::find($id)->update($request->all());

        return redirect()->route('activitydetails.index')
                        ->with('success','Activity Detail was updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Activitydetail::find($id)->delete();
        return redirect()->route('activitydetails.index')
                        ->with('success','Activity Detail was deleted successfully');
    }


  


}

