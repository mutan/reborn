<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
  /**
   * The policy mappings for the application.
   *
   * @var array
   */
  protected $policies = [
    /*'App\Model' => 'App\Policies\ModelPolicy',*/
    \App\Deck::class => \App\Policies\DeckPolicy::class,
  ];

  /**
   * Register any authentication / authorization services.
   *
   * @return void
   */
  public function boot()
  {
    $this->registerPolicies();

    Gate::define('moderate-cards', function ($user) {
      return $user->hasRoles('admin');
    });

    Gate::define('moderate-decks', function ($user) {
      return $user->hasRoles('admin');
    });
  }
}
