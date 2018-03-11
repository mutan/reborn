<?php

namespace App;

class Type extends Model
{
	public function cards()
	{
		return $this->belongsToMany(Card::class);
	}
}
