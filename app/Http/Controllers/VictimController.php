<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;  
use App\Http\Controllers\Controller;
use App\Victim;
use App\Cancer_Type;

class VictimController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index (Request $request)
    {
        $victims = Victim::orderBy('id','last_name')->paginate(5); 
        return view('victims.index', compact('victims'))
            ->with('i', ($request->input('page', 1) - 1) * 5);


    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $cancer_types=Cancer_Type::lists('name','id');
        return view('victims.create', compact('cancer_types'));
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
            'victim_refno' => 'required',
            'last_name' => 'required',
            'first_name' => 'required',
            'street_address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'email' => 'required',
			'home_phone',
            'mobile_phone' => 'required',
			'cancer_type_id' => 'required',
			'notes',
        ]);
		
        Victim::create($request->all());

        return redirect()->route('victims.index')
                        ->with('success','Victim was created successfully');
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

        $victims = Victim::find($id);
         $cancer_id = $victims->cancer_type_id;
        $cancer_types=Cancer_Type::find($cancer_id); //

        return view('victims.show',compact('victims', 'cancer_types'));
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

        $victims = Victim::find($id);
        $cancer_types=Cancer_Type::lists('name', 'id'); // added plus in compact
        return view('victims.edit',compact('victims', 'cancer_types'));

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
            'victim_refno' => 'required',
            'last_name' => 'required',
            'first_name' => 'required',
            'street_address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'email' => 'required',
			'home_phone',
            'mobile_phone' => 'required',
			'cancer_type_id' => 'required',
			'notes',
        ]);

        Victim::find($id)->update($request->all());

        return redirect()->route('victims.index')
                        ->with('success','Victim was updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Victim::find($id)->delete();
        return redirect()->route('victims.index')
                        ->with('success','Victim was deleted successfully');
    }
}
