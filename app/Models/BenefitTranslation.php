<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BenefitTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['title', 'locale', 'text'];
}
