<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    //定义表名
    protected $table = 'user';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   /* protected $fillable = [
        'name', 'email', 'password',
    ];*/

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
  /*  protected $hidden = [
        'password', 'remember_token',
    ];*/
}
