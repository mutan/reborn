<?php

namespace App;

class Rarity extends Model
{
	public function cards()
	{
		return $this->hasMany(Card::class);
	}
}
