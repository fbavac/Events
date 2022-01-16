<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
    	'event_id',
        'email'
    ];

    protected $dates = [ 'deleted_at' ];
}
