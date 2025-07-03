<?php

namespace App\Models;


use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Question extends Model implements TranslatableContract
{
    use AsSource, Translatable;
    protected $translatedAttributes = ['question', 'answer'];
    protected $fillable = ['order'];
}
