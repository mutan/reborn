<?php

namespace App;

class Deck extends Model
{
	/* RELATIONSHIPS */

	public function cards()
	{
		return $this->belongsToMany(Card::class)->withPivot('quantity');
	}

  public function format()
  {
      return $this->belongsTo(Format::class);
  }

	public function user()
	{
		return $this->belongsTo(User::class);
	}

  public function tournament()
  {
    return $this->belongsTo(Tournament::class);
  }
}
