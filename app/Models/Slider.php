<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Screen\AsSource;

class Slider extends Model
{
    use  AsSource, Attachable, Translatable;

    public $translatedAttributes = [
        'title',
        'button_name',
    ];

    protected $fillable = [
        'button_link',
        'background',
    ];

    public function getImageUrlAttribute(): string
    {
        return asset('storage/' . $this->background);
    }
}
