<?php

namespace App\Policies;

use App\User;
use App\Deck;
use Illuminate\Auth\Access\HandlesAuthorization;

class DeckPolicy
{
  use HandlesAuthorization;

  public function before(User $user)
  {
    return $user->hasRoles('admin');
  }

  /* Methods below determines whether the user can do something with the deck */

  public function view()
  {
    return true;
  }

  public function create(User $user)
  {
    return $user->id > 0;
  }

  public function addCard(User $user, Deck $deck)
  {
    return $user->id === $deck->user_id;
  }

  public function removeCard(User $user, Deck $deck)
  {
    return $user->id === $deck->user_id;
  }

  public function update(User $user, Deck $deck)
  {
    return $user->id === $deck->user_id;
  }

  public function delete(User $user, Deck $deck)
  {
    return $user->id === $deck->user_id;
  }
}
