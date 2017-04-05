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

class ActivitydetailController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index (Request $request)
    {
        $activitydetails = Activitydetail::orderBy('id','DESC')->paginate(5); 
        return view('activitydetails.index', compact('activitydetails'))
            ->with('i', ($request->input('page', 1) - 1) * 5);


    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $activities=Activity::lists('description','id');
        $startdatetimes=Activity::lists('start_datetime','id');
        $enddatetimes=Activity::lists('end_datetime','id');
        $volunteers = Volunteer::all()->lists('full_name', 'id');
        $victims = Victim::all()->lists('full_name', 'id');
        $employees=Employee::all()->lists('full_name','id');
        //return view('activitydetails.create', compact('activities','name','victims','employees'));
        return view('activitydetails.create', compact('activities','volunteers','victims','employees','startdatetimes','enddatetimes'));
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
        $employees=Victim::find($employeeid);


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
        $activities=Activity::lists('description','id');
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

