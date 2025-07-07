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

    public $translatedAttributes  = ['name', 'description', 'position'];
    protected $fillable = [
        'title',
        'description',
        'img',
    ];

    public function getImageUrlAttribute(): string
    {
        return asset('storage/' . $this->image);
    }
}
