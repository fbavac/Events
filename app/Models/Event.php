<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\Invite;
use DB;


class Event extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
    	'user_id',
        'name',
        'start_date',
        'end_date'
    ];

    protected $dates = [ 'deleted_at' ];

    /**
     * fetch invites user based.
     *
     * @return 
     */
    public function invite($user_id){
        $invite_req = Event::join('invites', 'invites.event_id', '=', 'events.id')
                        ->where('user_id', $user_id)
                        ->whereNull('invites.deleted_at')->count();
        return $invite_req;     
    }

    /**
     * Events fetch date range.
     *
     * @return 
     */
    public function dateRange($start_date, $end_date){
        $events = Event::whereBetween('start_date', [$start_date , $end_date])->orWhereBetween('end_date', [$start_date , $end_date])->get();
    	return $events;
    }

    /**
     * Event fetch user range.
     *
     * @return 
     */
    public function eventAverage(){
        $events = Event::select(DB::raw('events.user_id, users.name, count(events.user_id) as event_count'))
                    ->leftJoin('users','users.id','=', 'events.user_id')
                    ->groupBy('events.user_id')->get()->toArray();
        return $events;
    }
}
