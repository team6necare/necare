<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notification;
use App\Activity;
use App\Location;
use Mail;
use Illuminate\Support\Facades\Input;
use App\Volunteer;
use App\Employee;
use App\Victim;
use App\Activitydetail;


//use App\Http\Requests;

class NotificationController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index (Request $request)
    {

        $notifications = Notification::orderBy('id','reference_number')->paginate(5);
        return view('notifications.index', compact('notifications'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //worked but did not show all details...$activities=Activity::lists('description','id');

        $activities=Activity::get()->lists('full_name', 'id');
        //dd($activities);
     
        return view('notifications.create', compact('activities'));
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
            'reference_number'=>'required',
            'activity_id'=>'required',
            'to_all_volunteers',
            'to_all_victims',
            'to_all_employees',
            'notification_subject'=> 'required',
            'notification_message'=> 'required',
            
        ]);


        Notification::create($request->all());

        NotificationController::sendEmailReminder();  //added for emailing   

        return redirect()->route('notifications.index')
                        ->with('success','The Notification was created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notifications = Notification::find($id);
        $activity_id=$notifications->activity_id;
        $activities=Activity::find($activity_id);
        
        $loc_id=$activities->location_id;
        $locations=Location::find($loc_id);

        return view('notifications.show',compact('notifications', 'activities', 'locations'));
   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notifications = Notification::find($id);
        //$activities = Activity::lists('description','id');
         $activities=Activity::get()->lists('full_name', 'id');
        return view('notifications.edit',compact('notifications', 'activities'));     
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
        if (!$request->has('to_all_volunteers')) {
        $request->merge(['to_all_volunteers' => '']);
    }

      if (!$request->has('to_all_victims')) {
        $request->merge(['to_all_victims' => '']);
    }

     if (!$request->has('to_all_employees')) {
        $request->merge(['to_all_employees' => '']);
    }

        $this->validate($request, [
            'reference_number'=>'required',
            'activity_id'=>'required',
            'to_all_volunteers',
            'to_all_victims',
            'to_all_employees',
            'notification_subject'=> 'required',
            'notification_message'=> 'required',
        ]);

        Notification::find($id)->update($request->all());

        NotificationController::sendEmailReminder();  //added for emailing   

        return redirect()->route('notifications.index')
                        ->with('success','The Notification was successfully updated');
    }

/**
     * Send an e-mail reminder to the participants.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public static function sendEmailReminder()
     {
        /*'text'->Notification.notification_message
        subject-> notification_subject      

        sender can be from .env or email of currently logged user ....
        to... list from vic, vol, emp
        */
        /*Mail::raw(Input::get('notification_message'), function($message) {
            $message->from('cmpuchane@gmail.com', 'NECare System email');

            $message->to('cmpuchanemolefha@unomaha.edu', 'Chanda')->subject(Input::get('notification_subject'));
        });
        */

        $activities= Input::get('activity_id');
        //if volunteer = 'Y'
        if (Input::get('to_all_volunteers')=='Y') {


            $activitydetails = Activitydetail::where('activity_id', $activities)->value('volunteer_id'); 
            $volunteers = Volunteer::where('id', $activitydetails)->get(); 
            foreach ($volunteers as $volunteer) {
                Mail::raw(Input::get('notification_message'), function($message) use ($volunteer) {
                $message->from('team6necare@gmail.com', 'NECare System email');

                $message->to($volunteer->email, $volunteer->last_name.", ".$volunteer->first_name)->subject(Input::get('notification_subject'));
                });
            }        
        }

        //if victim = 'Y'
        if (Input::get('to_all_victims')=='Y') {

            $activitydetails = Activitydetail::where('activity_id', $activities)->value('victim_id'); 
            $victims = Victim::where('id', $activitydetails)->get(); 
            foreach ($victims as $victim) {
                Mail::raw(Input::get('notification_message'), function($message) use ($victim) {
                $message->from('team6necare@gmail.com', 'NECare System email');

                $message->to($victim->email, $victim->last_name.", ".$victim->first_name)->subject(Input::get('notification_subject'));
                });
            }
        }

        //if employee = 'Y'
        if (Input::get('to_all_employees')=='Y') {


            $activitydetails = Activitydetail::where('activity_id', $activities)->value('employee_id'); 
            $employees = Employee::where('id', $activitydetails)->get(); 
            foreach ($employees as $employee) {
                Mail::raw(Input::get('notification_message'), function($message) use ($employee) {
                $message->from('team6necare@gmail.com', 'NECare System email');

                $message->to($employee->email, $employee->last_name.", ".$employee->first_name)->subject(Input::get('notification_subject'));
                });
            }        
        }
    }

   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Notification::find($id)->delete();
        return redirect()->route('notifications.index')
                        ->with('success','The notification was deleted successfully');
    }
}
