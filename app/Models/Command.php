<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Command extends Model
{
    use AsSource , Translatable;

    public $translatedAttributes = ['name', 'description', 'position'];

    protected $fillable = [
        'img',
        'name',
        'description',
        'position',
        'social',
    ];

    public function getImageUrlAttribute(): string
    {
        return asset('storage/' . $this->image);
    }
}
