<?php

namespace App;

class Format extends Model
{
	/* RELATIONSHIPS */

	public function editions()
	{
		return $this->belongsToMany(Edition::class);
	}
}
