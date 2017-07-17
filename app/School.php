<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $table='school';
    protected $fillable=['short_url','long_url'];
}
