<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notif extends Model
{
    public $table = 'notifs';
    protected $guarded = [
    	'id'
    ];
}
