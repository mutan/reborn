<?php

namespace App;

class Card extends Model
{

	/* HELPER METHODS */

	public function formatsIds()
	{
		return $this->edition->formats->pluck('id')->toArray();
	}

	//TODO
	public function isLegal(Format $format)
    {
        $formats = $this->edition->formats->pluck('id')->toArray();

        return in_array($format->id, $formats);
    }

    public function isBanned()
    {
        //check if card is in formats banned list
        return false;
    }




	public function fullType()
	{
		$supertypes = implode(" ", $this->supertypes->pluck('name')->toArray() );
		$types = implode(" ", $this->types->pluck('name')->toArray() );
		$subtypes = implode(" ", $this->subtypes->pluck('name')->toArray() );

		return $supertypes . " " . $types . " – " . $subtypes;
	}

	public function imagePath()
	{
		return "/images/" . $this->image;
	}

	public function power()
	{
		return $this->power_weak . "-" . $this->power_medium . "-" . $this->power_strong;
	}

	/* RELATIONSHIPS */

	public function decks()
	{
		return $this->belongsToMany(Deck::class)->withPivot('quantity');
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
