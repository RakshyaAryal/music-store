<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteOption extends Model
{
    protected $table='site_options';
    protected $fillable=['meta_key','meta_value'];
}
