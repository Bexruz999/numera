<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FrameTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'title', 'locale', 'text'];
}
