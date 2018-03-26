<?php

namespace App;

class Card extends Model
{

	public function fulltype()
	{
		$supertypes = implode(" ", $this->supertypes->pluck('name')->toArray() );
		$types = implode(" ", $this->types->pluck('name')->toArray() );
		$subtypes = implode(" ", $this->subtypes->pluck('name')->toArray() );

		return $supertypes . " " . $types . " – " . $subtypes;
	}

	public function imagelink()
	{
		return "/images/" . $this->image;
	}

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
		return $this->belongsToMany(Liquid::class);
	}

	public function elements()
	{
		return $this->belongsToMany(Element::class);
	}

	public function supertypes()
	{
		return $this->belongsToMany(Supertype::class);
	}

	public function types()
	{
		return $this->belongsToMany(Type::class);
	}

	public function subtypes()
	{
		return $this->belongsToMany(Subtype::class);
	}

	public function artists()
	{
		return $this->belongsToMany(Artist::class);
	}
}
