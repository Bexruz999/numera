<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoryTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'position', 'locale', 'description'];
}
