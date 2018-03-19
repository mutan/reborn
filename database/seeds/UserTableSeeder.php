<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
  	$role_player = Role::where('name', 'player')->first();
  	$role_admin  = Role::where('name', 'admin')->first();

  	$player = new User();
  	$player->name = 'player';
  	$player->email = 'player@example.com';
  	$player->password = bcrypt('secret');
  	$player->save();
  	$player->roles()->attach($role_player);

  	$admin = new User();
  	$admin->name = 'admin';
  	$admin->email = 'akim_now@mail.ru';
  	$admin->password = bcrypt('secret');
  	$admin->save();
  	$admin->roles()->attach($role_admin);
  }
}
