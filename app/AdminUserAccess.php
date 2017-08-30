<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminUserAccess extends Model
{
    protected $table='admin_user_access';
    protected $fillable=['id', 'admin_user_id','module'];
}
