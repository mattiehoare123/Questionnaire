<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     //$fillable is an arry that will contain the fields below that i want to set as mass-assignable
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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles() {
      return $this->belongsToMany(Role::class);
    }

    /*
 *   check if a role is attached to a user
 */
    public function hasRole($role) {
      if (is_string($role)){
          return $this->roles->contains('name', $role);
      }
      return !! $role->intersect($this->roles)->count();
    }

    /*
 *  assign a role to a user
 */
    public function assignRole($role) {
      return $this->roles()->sync(
          Role::whereName($role)->firstOrFail()
      );
    }
}
