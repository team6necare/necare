<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;  
use App\Http\Controllers\Controller;
use App\VolunteerSchedule;
use App\Volunteer;
use App\Http\Requests;
use Auth;
class VolunteerScheduleController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index (Request $request)
    {
        $volunteers = Volunteer::all();

         if (Auth::check() && Auth::user()->hasRole('volunteer')) {
        $current_user_email = Auth::user()->email;
        //dd($current_user_email) ;
        $current_volunteer_id = Volunteer::where('email',$current_user_email)->value('id'); 

        $volunteerschedules = VolunteerSchedule::where ('volunteer_id',$current_volunteer_id) ->orderBy('id','validity_from')->paginate(5); 


          }
          else
          {
            $volunteerschedules = VolunteerSchedule::orderBy('id','validity_from')->paginate(5); 

          }

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

         //worked but not bringing the full detail... $volunteers=Volunteer::lists('volunteer_refno', 'id');
        $volunteers=Volunteer::get()->lists('full_name', 'id');
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

        $volunteers = Volunteer::all();

         if (Auth::check() && Auth::user()->hasRole('volunteer')) {
        $current_user_email = Auth::user()->email;
        //dd($current_user_email) ;
        $current_volunteer_id = Volunteer::where('email',$current_user_email)->value('id'); 
        $volunteerschedules = VolunteerSchedule::where ('volunteer_id',$current_volunteer_id)->find($id);
        
         //worked but not bringing the full detail... $volunteers=Volunteer::lists('volunteer_refno', 'id');
        $volunteers=Volunteer::get()->lists('full_name', $volunteerschedules);
        //dd($volunteers);
      }

      else 
      {

        $volunteerschedules = VolunteerSchedule::find($id);
        $volunteers=Volunteer::get()->lists('full_name', 'id');
      }

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
        
     /* $volunteerschedules = array('sunday_morning',
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
              'saturday_afternoon');
     
     foreach ($volunteerschedules as $volunteerschedule)
     {
     if (!$request->has('volunteerschedule')) {
        $request->merge(['volunteerschedule' => 'N']);
      
    }
        } */

    if (!$request->has('sunday_morning')) {
        $request->merge(['sunday_morning' => '']);
    }


             if (!$request->has('sunday_afternoon')) {
        $request->merge(['sunday_afternoon' => '']);
    }
  

             if (!$request->has('monday_morning')) {
        $request->merge(['monday_morning' => '']);
    }


             if (!$request->has('monday_afternoon')) {
        $request->merge(['monday_afternoon' => '']);
    }

                 if (!$request->has('tuesday_morning')) {
        $request->merge(['tuesday_morning' => '']);
    }

                     if (!$request->has('tuesday_afternoon')) {
        $request->merge(['tuesday_afternoon' => '']);
    }
                         if (!$request->has('wednesday_morning')) {
        $request->merge(['wednesday_morning' => '']);
    }
                             if (!$request->has('wednesday_afternoon')) {
        $request->merge(['wednesday_afternoon' => '']);
    }
                             if (!$request->has('thursday_morning')) {
        $request->merge(['thursday_morning' => '']);
    }
                             if (!$request->has('thursday_afternoon')) {
        $request->merge(['thursday_afternoon' => '']);
    }

                             if (!$request->has('friday_morning')) {
        $request->merge(['friday_morning' => '']);
    }

                             if (!$request->has('friday_afternoon')) {
        $request->merge(['friday_afternoon' => '']);
    }
                             if (!$request->has('saturday_morning')) {
        $request->merge(['saturday_morning' => '']);
    }

                                 if (!$request->has('saturday_afternoon')) {
        $request->merge(['saturday_afternoon' => '']);
    }


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
