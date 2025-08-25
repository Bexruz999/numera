<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Screen\AsSource;

class Brand extends Model
{
    use AsSource, Attachable;

    protected $fillable = [
        'image',
    ];

    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/' . $this->image) : null;
    }
}
