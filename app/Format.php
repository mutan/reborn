<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Format extends Model
{
	public function editions()
	{
		return $this->hasMany(Edition::class);
	}
}
