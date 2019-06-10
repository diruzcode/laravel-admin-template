<?php
namespace App;


use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class User extends Authenticatable
{
  use HasRoles, Notifiable;
  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */



  protected $dates = ['created_at', 'updated_at'];

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'rut',
    'first_name',
    'last_name',
    'father_surname',
    'mother_surname',
    'email',
    'password',
    'access_web',
    'access_app',
    'hidden',
    'last_login'
  ];
  /**
  * The attributes that should be hidden for arrays.
  *
  * @var array
  */
  protected $hidden = [
      'password', 'remember_token',
  ];



  public function setPasswordAttribute($password)
  {
      $this->attributes['password'] = bcrypt($password);
  }


  public function completeName()
  {
      return $this->attributes['first_name'] . ' ' . $this->attributes['last_name'] . ' ' . $this->attributes['father_surname'] . ' ' . $this->attributes['mother_surname'];
  }

  public function routeNotificationForMail()
  {
      return $this->email;
  }


  public function toggleAccess($type)
  {
      $this->attributes[$type] = ($this->attributes[$type]) ? false : true;
  }

}
