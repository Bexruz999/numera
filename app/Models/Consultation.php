<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Consultation extends Model implements TranslatableContract
{
    use AsSource, HasFactory, Translatable;

    public $translatedAttributes = [
        'title',
        'description',
        'subtitle',
        'button',
        'link',
    ];

    protected $fillable = [
        'img',
        'subtitle',
        'button',
        'link',
    ];

    public function getImageUrlAttribute(): string
    {
        return asset('storage/' . $this->image);
    }
}
