<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{

    protected $fillable = ['user_id', 'category_id','amount','reason','iva_amount','fatturato','paid','pagato_il'];


    public function user()
    {
        return $this->hasOne('App\User');
    }

    public function category()
    {
        return $this->hasOne('App\Category');
    }
}
