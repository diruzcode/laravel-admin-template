<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


class Role extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'guard_name', 'display_name', 'description', 'hidden'
    ];


    protected $dates = ['created_at', 'updated_at'];

    public static function getByDisplayName($display_name)
    {
        return Role::where('display_name', '=', $display_name)->get();
    }


    public static function getByName($name)
    {
        return Role::where('name', '=', str_slug($name))->first();
    }



    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function scopeName(Builder $query, $name){

        if($name == null || trim($name) == ""){
            return $query;
        }

        return $query->where('name', 'LIKE', '%'.$name.'%');
    }
}
