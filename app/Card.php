<?php

namespace App;

class Card extends Model
{
	public function liquid()
	{
		return $this->belongsTo(Liquid::class);
	}
}
