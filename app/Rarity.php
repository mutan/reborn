<?php

namespace App;

class Rarity extends Model
{
	public function imagePath()
	{
		return "/icons/" . $this->image;
	}
	
	public function cards()
	{
		return $this->hasMany(Card::class);
	}
}
