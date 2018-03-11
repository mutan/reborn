<?php

namespace App;

class Card extends Model
{

	public function edition()
	{
		return $this->belongsTo(Edition::class);
	}

	public function rarity()
	{
		return $this->belongsTo(Rarity::class);
	}

	public function liquids()
	{
		return $this->belongsToMany(Liquids::class)
		->withTimestamps();
	}

	public function elements()
	{
		return $this->belongsToMany(Elements::class)
		->withTimestamps();
	}

	public function supertypes()
	{
		return $this->belongsToMany(Supertypes::class)
		->withTimestamps();
	}

	public function types()
	{
		return $this->belongsToMany(Types::class)
		->withTimestamps();
	}

	public function subtypes()
	{
		return $this->belongsToMany(Subtypes::class)
		->withTimestamps();
	}

	public function artists()
	{
		return $this->belongsToMany(Artists::class)
		->withTimestamps();
	}
}
