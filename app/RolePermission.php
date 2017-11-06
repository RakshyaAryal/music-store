<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    protected $fillable = ['id', 'role_id', 'permission_slug'];
    protected $table = 'roles_permission';

}
