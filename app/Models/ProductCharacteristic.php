<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Orchid\Screen\AsSource;

class ProductCharacteristic extends Model
{
    use Translatable, AsSource;
    public $translatedAttributes = [
        'product_characteristic',
        'value',
    ];

    protected $fillable = [
        'product_id',
        'characteristic_id',
    ];

    public function productChar()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
