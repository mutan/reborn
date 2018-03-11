<?php

namespace App;

class Artist extends Model
{
	public function cards()
	{
		return $this->belongsToMany(Card::class);
	}
}
