<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Product extends Model implements TranslatableContract
{
    use HasFactory, AsSource, Translatable;

    public $translatedAttributes = [
        'name',
        'description',
        'short_description',
        ];

    protected $fillable = [
        'img',
        'price',
        'stock',
        'category_id',
        'articular',
        'guarantee',
        'code',
        'delivery',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function getImageUrlAttribute(): string
    {
        return asset('storage/' . $this->img);
    }

}
