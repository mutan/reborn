<?php

namespace App;

class Element extends Model
{
	/* Helper methods */

	public function imagePath()
	{
		return "/icons/" . $this->image;
	}

	/* Relationships */

	public function cards()
	{
		return $this->belongsToMany(Card::class);
	}
}
