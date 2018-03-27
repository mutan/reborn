<?php

namespace App;

class Element extends Model
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
