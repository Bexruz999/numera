<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductTranslation extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'short_description',
        'description',
        'locale',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
}
