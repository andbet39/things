<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{


    protected $fillable = ['name', 'due_date','owner_id','assigned_id'];

    public function owner()
    {
        return $this->belongsTo('App\User','owner_id');
    }

    public function assigned()
    {
        return $this->belongsTo('App\User','assigned_id');
    }

/**    public function setDueDateAttribute($date){

        if($date) {
            $this->attributes['due_date'] = Carbon::createFromFormat('d-m-Y', $date);
        }
    }
*/
}
