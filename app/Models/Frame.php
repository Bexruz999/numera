<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Frame extends Model
{
    use AsSource, Translatable;

    public $translatedAttributes  = ['name', 'title', 'text'];

    protected $fillable = [
        'title',
        'name',
        'text',
        'img',
    ];

    public function getImageUrlAttribute(): string
    {
        return asset('storage/' . $this->image);
    }
}
