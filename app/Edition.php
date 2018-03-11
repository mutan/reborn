<?php

namespace App;

class Edition extends Model
{
	public function cards()
	{
		return $this->hasMany(Card::class);
	}
}
