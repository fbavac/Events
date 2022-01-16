<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invite;
use App\Models\Event;
use Redirect;
use Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = Auth::id();
        $event_counts = Event::where('user_id', $user_id)->count();
        $invite_req = Event::invite($user_id);
        return view('home', compact('event_counts','invite_req'));
    }

    /**
     * Show the public view.
     *
     * @return 
     */

    public function welcome()
    {   
        $events = Event::all();
        return view('welcome',compact('events'));
    }

    /**
     * Show the public Date Range.
     *
     * @return 
     */

    public function welcomeDateRange(Request $request)
    {   
        $this->validate($request, [
            'start_date' => 'required',
            'end_date' => 'required'
        ]);
        $start_date =$request->start_date;
        $end_date =$request->end_date;

        $events = Event::dateRange($start_date,$end_date);
        return view('welcome',compact('events'));
    }

    /**
     * Show the average .
     *
     * @return 
     */

    public function averageEvents(){
    
        $events = Event::eventAverage(); //fetch counts user based

        $event_count = array_column((array)$events, 'event_count');
        $total_event = array_sum($event_count); // total event count

        $user_count = array_column((array)$events, 'user_id');
        $total_user = count($user_count); //total user count

        $total_avg = ($total_event/$total_user); //total average

        $avg_user = [];
        foreach ($events as $key => $value) {

            $user_avg = $total_event/$value['event_count']; //user average
            $avg_user[$key]['average']=$user_avg;
            $avg_user[$key]['name'] = $value['name'];
        }       

        return view('average_events',compact('avg_user','total_avg'));
    }
    
    
}
