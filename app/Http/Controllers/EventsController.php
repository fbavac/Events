<?php

namespace App\Http\Controllers;
use App\Models\Event;
use Illuminate\Http\Request;
use Redirect;
use Auth;

class EventsController extends Controller
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
        $events = Event::where('user_id', $user_id)->get();
        $page_data[] = ['page_header'=>"Event", 'table_heading' => "Event List",'bc1' => "Home",'bc2' => "Event",'bc3' => ""];
        return view('events.list',compact('events','page_data'));
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $page_data[] = ['page_header'=>"Event", 'form_heading' => "Event Add Form", 'table_heading' => "Event Add",'bc1' => "Home",'bc2' => "Event",'bc3' => "Add Event"];
        return view('events.add', compact('page_data'));
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
            'event_name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
        $user_id = Auth::id();
        $event = Event::create([
            'user_id' => $user_id,
            'name' => $request->event_name,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
           
        ]);

        if($event){
            return Redirect::back()->with('success', 'Event Added Successfully');
        }else{
            return Redirect::back()->with('failure','Operation Failed !');
        }
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
        $event = Event::where('id', $id)->first();
        $page_data[] = ['page_header'=>"Event", 'form_heading' => "Event Add Form", 'table_heading' => "Event Edit",'bc1' => "Home",'bc2' => "Event",'bc3' => "Edit Event"];
        return view('events.add', compact('event', 'page_data'));
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
            'event_name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $id = decrypt($id);
        $event = Event::where('id', $id)->first();

        if($event){
            $event['name'] = $request->event_name;
            $event['start_date'] = $request->start_date;
            $event['end_date'] = $request->end_date;
            $event->save();
            return Redirect::back()->with('success', 'Event Updated Successfully');
        }

        return Redirect::back()->with('failure','Operation Failed !');
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
        $event = Event::where('id', $id)->first();
        if (isset($event)) {
            $event = $event->delete();
            return Redirect::back()->with('success', 'Event Deleted Successfully');
        }else{
            return Redirect::back()->with('failure','Operation Failed !');
        } 
    }

     /**
     * List all events.
     *
     * @param  
     * @return \Illuminate\Http\Response
     */
    public function allActive(){
        $events = Event::all();
        return json_encode(array("data"=>$events,"status"=>200,"message"=>"Success"));
    }


}
