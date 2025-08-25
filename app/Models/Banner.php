<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Screen\AsSource;

class Banner extends Model
{
    use AsSource, Attachable, Translatable;

    public $translatedAttributes = [
        'title',
        'subtitle',
        'button_text',
    ];

    protected $fillable = [
        'background',
        'button_link',
    ];

    public function getImageUrlAttribute(): string
    {
        return asset('storage/' . $this->background);
    }
}
