<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Category extends Model implements TranslatableContract
{
    use  HasFactory, AsSource, Translatable;

    public $translatedAttributes = ['name', 'image'];

    protected $fillable = [
        'name',
        'image',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getImageUrlAttribute(): string
    {
        return asset('storage/' . $this->image);
    }

    // In your Category model

}
