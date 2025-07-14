<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Benefit extends Model implements TranslatableContract
{
    use AsSource, Translatable;

    public $translatedAttributes  = ['title', 'text'];

    protected $fillable = [
        'title',
        'text',
        'img',
    ];

    public function getImageUrlAttribute(): string
    {
        return asset('storage/' . $this->image);
    }
}
