<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
  /* RELATIONSHIPS */

  public function format()
  {
    return $this->belongsTo(Format::class);
  }
}
