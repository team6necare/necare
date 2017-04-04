<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ActivityType;

class ActivityTypeController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index (Request $request)
    {
        $activity_types = ActivityType::orderBy('id','DESC')->paginate(5); 
        return view('activitytypes.index', compact('activity_types'))
            ->with('i', ($request->input('page', 1) - 1) * 5);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('activitytypes.create');
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
            
            'name' => 'required',
            'description' => 'required',
            'min_participants'=> 'required',
        ]);

        ActivityType::create($request->all());

        return redirect()->route('activitytypes.index')
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
        $activity_types = ActivityType::find($id);
        return view('activitytypes.show',compact('activity_types'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $activity_types = ActivityType::find($id);
        return view('activitytypes.edit',compact('activity_types'));
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
           
            'name' => 'required',
            'description' => 'required',
            'min_participants' => 'required',
        ]);

        ActivityType::find($id)->update($request->all());

        return redirect()->route('activitytypes.index')
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
        ActivityType::find($id)->delete();
        return redirect()->route('activitytypes.index')
                        ->with('success','Activity Type was deleted successfully');
    }
}

