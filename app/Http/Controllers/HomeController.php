<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invite;
use App\Models\Event;
use Redirect;
use Auth;

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
        $invite_req = Event::join('invites', 'invites.event_id', '=', 'events.id')
                    ->where('user_id', $user_id)
                    ->whereNull('invites.deleted_at')->count();
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
        $events = Event::all();
        return view('average_events',compact('events'));
    }
    
    
}
