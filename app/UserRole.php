<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $fillable = ['id', 'user_id', 'role_id'];
    protected $table = 'user_roles';


    public function userRole()
    {
        return $this->HasOne('App\Models\Role',  'id', 'role_id' );
    }
}
