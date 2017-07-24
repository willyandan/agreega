<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    public function matters()
    {
    	return $this->hasMany('App\Matter', 'id_school');
    }

    public function address()
    {
    	return $this->BelongsTo('App\Address', 'id_address');
    }
}
