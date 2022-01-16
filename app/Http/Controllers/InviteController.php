<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invite;
use App\Models\Event;
use Redirect;
use Auth;
use Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Jobs\SendEmailJob;

class InviteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        //
        $user_id = Auth::id();
        $invites = Event::join('invites', 'invites.event_id', '=', 'events.id')
                    ->where('user_id', $user_id)
                    ->whereNull('invites.deleted_at')->get();
        $page_data[] = ['page_header'=>"Invite", 'table_heading' => "Invite List",'bc1' => "Home",'bc2' => "Invite",'bc3' => ""];
        return view('invite.list',compact('invites','page_data'));
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        //
        $id = decrypt($id);
        $invite = Event::where('id', $id)->first();
        $page_data[] = ['page_header'=>"Invite", 'form_heading' => "Invite Add Form", 'table_heading' => "Invite Edit",'bc1' => "Home",'bc2' => "Invite",'bc3' => "Add Invite"];
        return view('invite.add', compact('invite', 'page_data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
        $this->validate($request, [
            'email' => 'required | email',
        ]);

        $id = decrypt($id);
        $event = Event::where('id', $id)->first();
         $this->send_email($request->email,$event->name,$event->start_date,$event->end_date);

        
        // if($mail){
            $invite = Invite::create([
                'event_id' => $id,
                'email' => $request->email                       
            ]);
        // }

        if($invite){
            return json_encode(array("statusCode"=>200,"message"=>"Invited Successfully"));
        }else{
            return json_encode(array("statusCode"=>201,"message"=>"Operation Failed !"));
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
        //
        $id = decrypt($id);
        $invite = Invite::where('id', $id)->first();
        if (isset($invite)) {
            $invite = $invite->delete();
            return json_encode(array("statusCode"=>200,"message"=>"Invite Deleted Successfully"));

        }else{
            return json_encode(array("statusCode"=>201,"message"=>"Operation Failed !"));
        } 
    }

    /**
     * Send email to invited users.
     *
     * @param  $to, $event, $from_date, $to_date
     * @return \Illuminate\Http\Response
     */

    public function send_email($to, $event, $from_date, $to_date) 
    {
        // $details['email'] = $to;
        //  SendEmailJob::dispatch($details);
        
        $details = array("event"=>$event, "body" => "We’d love to see you among us at ","start"=>$from_date,"end"=>$to_date, "email"=> $to);
        SendEmailJob::dispatch($details);
        //  Mail::send('mail.invite', $data, function($message) use ($event, $to) {
        // $message->to($to, $event)
        // ->subject('Invitation for an Event');
        // $message->from('noreply@gmail.com','Invitation for '.$event );
        //   });

    }
}
