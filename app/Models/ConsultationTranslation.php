<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConsultationTranslation extends Model
{
    public $timestamps = false;

    public $fillable = [
        'title',
        'description',
        'subtitle',
        'button',
        'link',
        'locale',
    ];
}
