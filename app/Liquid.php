<?php

namespace App;

class Liquid extends Model
{
	public function cards()
	{
		return $this->belongsToMany(Card::class)
		->withTimestamps();
	}
}
