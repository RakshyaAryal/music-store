<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table='roles';
    protected $fillable=['id','role_name'];

    public function rolePermission()
    {
        return $this->hasMany('App\Models\RolePermission', 'role_id', 'id');
    }

}
