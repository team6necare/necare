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
        $activities=Activity::lists('activity_refno','id');
        $volunteers=Volunteer::lists('volunteer_refno','id');
        $victims=Victim::lists('victim_refno','id');
        $employees=Employee::lists('employee_number','id');

        return view('activitydetails.create', compact('activities','volunteers','victims','employees'));
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
         $cancer_id = $victims->cancer_type_id;
        $cancer_types=Cancer_Type::find($cancer_id); //

        return view('activitydetails.show',compact('activitydetails', 'cancer_types'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$victims = Victim::find($id);
        //return view('victims.edit',compact('victims'));

        $activitydetails = Activitydetail::find($id);
        $cancer_types=Cancer_Type::lists('name', 'id'); // added plus in compact
        return view('activitydetails.edit',compact('activitydetails', 'cancer_types'));

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

