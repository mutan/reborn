<?php

namespace App;

class Edition extends Model
{
	public function imagePath()
	{
		return "/icons/" . $this->image;
	}
	
	public function cards()
	{
		return $this->hasMany(Card::class);
	}
	public function formats()
	{
		return $this->hasMany(Format::class);
	}

}
