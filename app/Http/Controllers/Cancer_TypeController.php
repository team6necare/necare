<?php

/*namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class Cancer_TypeController extends Controller
{
    //
}
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;  //note... web sample had used Illuminate\Http\Request; from web followed by use App\Http\Controllers\Controller;
use App\Http\Controllers\Controller;
use App\Cancer_Type;


class Cancer_TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index (Request $request)
    {
        $cancer_types = Cancer_Type::orderBy('id','name')->paginate(5); //was $cancer_types = Cancer_Types::orderBy('id','DESC')->paginate(5);
        return view('cancer_types.index', compact('cancer_types'))
            ->with('i', ($request->input('page', 1) - 1) * 5);

    }


/*
    public function index()
    {
        //
        $cancer_type=Cancer_types::all();
        return view('cancer_types.index',compact('cancer_type'));
    }
*/

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cancer_types.create');
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
        ]);

        Cancer_Type::create($request->all());

        return redirect()->route('cancer_types.index')
                        ->with('success','Cancer Type created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cancer_types = Cancer_Type::find($id);
        return view('cancer_types.show',compact('cancer_types'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cancer_types = Cancer_Type::find($id);
        return view('cancer_types.edit',compact('cancer_types'));
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
        ]);

        Cancer_Type::find($id)->update($request->all());

        return redirect()->route('cancer_types.index')
                        ->with('success','Cancer Type updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cancer_Type::find($id)->delete();
        return redirect()->route('cancer_types.index')
                        ->with('success','Cancer Type deleted successfully');
    }
}