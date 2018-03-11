<?php

namespace App;

class Subtype extends Model
{
	public function cards()
	{
		return $this->belongsToMany(Card::class);
	}
}
