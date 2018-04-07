<?php

namespace App;

class Edition extends Model
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
	public function formats()
	{
		return $this->belongsToMany(Format::class);
	}

}
