<?php

namespace App;

class Element extends Model
{
	public function cards()
	{
		return $this->belongsToMany(Card::class);
	}
}
