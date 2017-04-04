<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;  
use App\Http\Controllers\Controller;
use App\VolunteerSchedule;
use App\Volunteer;

class VolunteerScheduleController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index (Request $request)
    {
        
        $volunteerschedules = VolunteerSchedule::orderBy('id','validity_from')->paginate(5); 
        return view('volunteerschedules.index', compact('volunteerschedules'))
            ->with('i', ($request->input('page', 1) - 1) * 5);


    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $volunteers=Volunteer::lists('volunteer_refno', 'id');
        return view('volunteerschedules.create', compact('volunteers'));
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
            'volunteer_id' => 'required',
              'valid_from' => 'required',
              'valid_to',
              'sunday_morning',
              'sunday_afternoon',
              'monday_morning',
              'monday_afternoon',
        'tuesday_morning',
              'tuesday_afternoon',
        'wednesday_morning',
              'wednesday_afternoon',
        'thursday_morning',
              'thursday_afternoon',
        'friday_morning',
              'friday_afternoon',
        'saturday_morning',
              'saturday_afternoon',     
    ]);


        VolunteerSchedule::create($request->all());

        return redirect()->route('volunteerschedules.index')
                        ->with('success','Volunteer-schedule was created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $volunteerschedules = VolunteerSchedule::find($id);
        $volunteer_id =$volunteerschedules->volunteer_id;
        $volunteers=Volunteer::find($volunteer_id); 

        return view('volunteerschedules.show',compact('volunteerschedules', 'volunteers' ));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $volunteerschedules = VolunteerSchedule::find($id);
        $volunteers=Volunteer::lists('volunteer_refno','id');
        return view('volunteerschedules.edit',compact('volunteerschedules', 'volunteers'));
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
            'volunteer_id' => 'required',
              'valid_from' => 'required',
              'valid_to',
              'sunday_morning',
              'sunday_afternoon',
              'monday_morning',
              'monday_afternoon',
        'tuesday_morning',
              'tuesday_afternoon',
        'wednesday_morning',
              'wednesday_afternoon',
        'thursday_morning',
              'thursday_afternoon',
        'friday_morning',
              'friday_afternoon',
        'saturday_morning',
              'saturday_afternoon',     
        ]);


        VolunteerSchedule::find($id)->update($request->all());

        return redirect()->route('volunteerschedules.index')
                        ->with('success','Volunteer schedule was updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        VolunteerSchedule::find($id)->delete();
        return redirect()->route('volunteerschedules.index')
                        ->with('success','volunteer schedule was deleted successfully');
    }
}
