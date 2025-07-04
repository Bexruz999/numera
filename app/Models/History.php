<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class History extends Model implements TranslatableContract
{
    use Translatable,AsSource;

    public $translatedAttributes  = ['name', 'description', 'position'];
}
