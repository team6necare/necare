<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;  
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Volunteer;
use App\Cancer_Type;
use Auth;

class VolunteerController extends Controller
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
        $volunteers = Volunteer:: where ('id',$current_volunteer_id)->orderBy('id','last_name')->paginate(5); 
     
        }
        else
        {
             $volunteers = Volunteer::orderBy('id','last_name')->paginate(5); 

        }
        return view('volunteers.index', compact('volunteers'))
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
        return view('volunteers.create', compact('cancer_types'));
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
            'volunteer_refno' => 'required',
            'last_name' => 'required',
            'first_name' => 'required',
            'street_address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'email' => 'required',
            'work_phone',
            'mobile_phone' => 'required',
            'cancer_type_id' => 'required',
            'notes',
        ]);

        Volunteer::create($request->all());

        return redirect()->route('volunteers.index')
                        ->with('success','Volunteer was created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $volunteers = Volunteer::find($id);
        $cancer_id = $volunteers->cancer_type_id;
       //return view('volunteers.show',compact('volunteers'));
       
       //$cancer_types=Cancer_Type::find(1)->volunteers;

        $cancer_types=Cancer_Type::find($cancer_id); //

        return view('volunteers.show',compact('volunteers', 'cancer_types' ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $volunteers = Volunteer::find($id);
        $cancer_types=Cancer_Type::lists('name', 'id'); // added plus in compact
        return view('volunteers.edit',compact('volunteers', 'cancer_types'));
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
            'volunteer_refno' => 'required',
            'last_name' => 'required',
            'first_name' => 'required',
            'street_address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'email' => 'required',
            'work_phone',
            'mobile_phone' => 'required',
            'cancer_type_id' => 'required',
            'notes',
        ]);

        Volunteer::find($id)->update($request->all());

        return redirect()->route('volunteers.index')
                        ->with('success','Volunteer was updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Volunteer::find($id)->delete();
        return redirect()->route('volunteers.index')
                        ->with('success','volunteer was deleted successfully');
    }

      

}
