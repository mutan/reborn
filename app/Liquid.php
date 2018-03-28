<?php

namespace App;

class Liquid extends Model
{
	public function imagePath()
	{
		return "/icons/" . $this->image;
	}
	
	public function cards()
	{
		return $this->belongsToMany(Card::class);
	}
}
