<?php

namespace App;

class Supertype extends Model
{
	public function cards()
	{
		return $this->belongsToMany(Card::class);
	}
}
