<?php

namespace App;

class Liquid extends Model
{
	public function cards()
	{
		return $this->hasMany(Card::class);
	}
}
