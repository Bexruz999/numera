<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommandTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'description', 'locale', 'position' ];
}
