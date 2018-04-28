<?php

namespace App;

class Format extends Model
{
	/* RELATIONSHIPS */

	public function editions()
	{
		return $this->belongsToMany(Edition::class);
	}
  public function tournaments()
  {
    return $this->hasMany(Tournaments::class);
  }
}
