<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    public function school()
    {
        return $this->belongsTo('App\School', 'id_school');
    }

    public function type(){
    	return $this->belongsTo('App\Type', 'id_type');
    }

    public function user(){
    	return $this->belongsTo('App\User', 'id_user');
    }

    public function address(){
        return $this->belongsTo('App\Address', 'id_address');
    }
}
