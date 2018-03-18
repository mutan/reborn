<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
	use Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'email', 'password',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	public function roles()
	{
		return $this->belongsToMany(Role::class);
	}

	/**
	* @param string|array $roles
	*/
	public function hasRoles($roles)
	{
		if (is_array($roles)) {
			return $this->checkAnyRole($roles) || abort(401, 'Доступ закрыт.');
		}
		return $this->checkRole($roles) || abort(401, 'Доступ закрыт.');
	}

	/**
	* Check multiple roles
	* @param array $roles
	*/
	public function checkAnyRole($roles)
	{
		return null !== $this->roles()->whereIn('name', $roles)->first();
	}

	/**
	* Check one role
	* @param string $role
	*/
	public function checkRole($role)
	{
		return null !== $this->roles()->where('name', $role)->first();
	}

}
