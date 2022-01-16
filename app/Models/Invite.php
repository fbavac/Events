<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\Event;

class Invite extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
    	'event_id',
        'email'
    ];

    protected $dates = [ 'deleted_at' ];

    /**
     * fetch events invites user based.
     *
     * @return 
     */
    public function events($user_id){
        $invites = Event::join('invites', 'invites.event_id', '=', 'events.id')
                    ->where('user_id', $user_id)
                    ->whereNull('invites.deleted_at')->get();
        return $invites;
    }
}
