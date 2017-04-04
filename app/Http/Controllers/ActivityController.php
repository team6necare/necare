<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Activity;
use App\ActivityType;
use App\Location;
//use App\Http\Requests;

class ActivityController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index (Request $request)
    {

        $activities = Activity::orderBy('id','Description')->paginate(5);
        return view('activities.index', compact('activities'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations=Location::lists('name','id');
        $activity_types=ActivityType::lists('name','id');
        $activity_descs=ActivityType::lists('description','id');
      
        //dd($activity_types,$activity_descs);
     
        return view('activities.create',compact('locations','activity_types','activity_descs'));
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
            'activity_refno'=>'required',
            'description'=>'required',
            'start_datetime' => 'required',
            'end_datetime' => 'required',
            'location_id' =>'required',
            'activity_type_id',
            'status',
            'cost',

            
        ]);

      /*  $currentActivityId = $request['location_id'];
        dd($currentActivityId);
        $currentActivity = ActivityType::find($currentActivityId);
        $currentActivity->save(); */

        Activity::create($request->all());

        return redirect()->route('activities.index')
                        ->with('success','Activity Type was created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $activities = Activity::find($id);
        $loc_id=$activities->location_id;
        $locations=Location::find($loc_id);
        $actv_id=$activities->activity_type_id;
        $activity_types=ActivityType::find($actv_id);
        return view('activities.show',compact('activities','locations','activity_types'));

      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $activities = Activity::find($id);
        $locations=Location::lists('name','id');
        $activity_types=ActivityType::lists('name','id');
        $activity_descs=ActivityType::lists('description','id');
        return view('activities.edit',compact('activities','locations','activity_types','activity_descs'));


     
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
            'activity_refno'=>'required',
            'description'=>'required',
            'start_datetime' => 'required',
            'end_datetime' => 'required',
            'location_id' =>'required',
            'activity_type_id'=>'required',
            'status',
            'cost',
        ]);

        Activity::find($id)->update($request->all());

        return redirect()->route('activities.index')
                        ->with('success','Activity Type was updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Activity::find($id)->delete();
        return redirect()->route('activities.index')
                        ->with('success','Activity Type was deleted successfully');
    }
}
