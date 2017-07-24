<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matter extends Model
{
	public function teacher()
	{
		return $this->hasOne('App\Person', $id_person);
	}
}
