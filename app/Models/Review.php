<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Review extends Model implements TranslatableContract
{
    use HasFactory, AsSource, Translatable;

    public $translatedAttributes  = ['title', 'description', 'matrix'];

    protected $fillable = [
        'title',
        'description',
        'matrix',
        'img',
    ];

    /**
     * Get the image URL for the article.
     *
     * @return string
     */
    public function getImageUrlAttribute(): string
    {
        return asset('storage/' . $this->image);
    }
}
