<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Generes extends Model
{
    protected $fillable = ['title'];
    protected $table = 'generes';

    public function music(){
        return $this->hasMany('App\Music','generes','title');
    }
}
