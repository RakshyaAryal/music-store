<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    protected $table='music';
    protected $fillable=['artist','album_name','generes','music_description','price','image'];
}
