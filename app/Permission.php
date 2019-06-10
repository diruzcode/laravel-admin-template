<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'guard_name', 'display_name', 'description'
    ];

    protected $dates = ['created_at', 'updated_at'];

}
