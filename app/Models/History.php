<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class History extends Model implements TranslatableContract
{
    use HasFactory, AsSource, Translatable;

    protected $fillable = [
        'name',
        'position',
        'description',
        'img',
    ];

    public $translatedAttributes  = ['name', 'description', 'position',];

    public function getImageUrlAttribute(): string
    {
        return asset('storage/' . $this->image);
    }
}
