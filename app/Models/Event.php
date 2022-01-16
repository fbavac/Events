<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

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

    public function dateRange($start_date, $end_date){
        $events = Event::where('start_date', '>=' , $start_date)
    				   ->where('end_date', '<=' , $end_date)->get();
    	return $events;
    }
}
