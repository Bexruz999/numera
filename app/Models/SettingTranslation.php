<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SettingTranslation extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'value',
        'options',
    ];

    protected $casts = [
        'value' => 'json',
        'options' => 'json',
    ];
}
