<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Slide extends Model
{
    use AsSource, HasFactory;

    protected $fillable = [
        'img',
    ];

    public function getImageUrlAttribute(): string
    {
        return asset('storage/' . $this->img);
    }
}
