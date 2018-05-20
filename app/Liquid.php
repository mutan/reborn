<?php

namespace App;

class Liquid extends Model
{
	/* Helper methods */

	public function imagePath()
	{
		return "/icons/" . $this->image;
	}
	
	/* RELATIONSHIPS */
	
	public function cards()
	{
		return $this->belongsToMany(Card::class);
	}
}
