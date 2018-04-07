<?php

namespace App;

class Rarity extends Model
{
	/* Helper methods */

	public function imagePath()
	{
		return "/icons/" . $this->image;
	}
	
	/* Relationships */
	
	public function cards()
	{
		return $this->hasMany(Card::class);
	}
}
