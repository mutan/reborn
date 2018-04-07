<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {

    DB::table('roles')->insert([
      ['name' => 'player', 'description' => 'Может создавать колоды ...'],
      ['name' => 'admin', 'description' => 'Может редактировать карты ...'],
    ]);

    //DB::table('users')->truncate();

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
