<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model implements \Astrotomic\Translatable\Contracts\Translatable
{
    use Translatable;

    public $translatedAttributes = ['value', 'options'];

    protected $fillable = [
        'group',
        'locked',
        'type',
        'name',
    ];

    protected $casts = [
        'locked' => 'boolean',
        'options' => 'array',
        'type' => 'string',
        'name' => 'string',
    ];

    /**
     * Get the content/value of the setting
     */
    public function getContent($locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        $translation = $this->translate($locale);

        return $translation ? $translation->value : null;
    }

    /**
     * Get setting value by key and locale
     */
    public static function getValue($key, $locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        $setting = self::where('name', $key)->first();

        if (!$setting) {
            return null;
        }

        return $setting->getContent($locale);
    }

    /**
     * Get setting by group and name
     */
    public static function getByGroupAndName($group, $name, $locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        $setting = self::where('group', $group)->whereHas('translations', function($query) use ($name, $locale) {
            $query->where('locale', $locale)->where('name', $name);
        })->first();

        return $setting ? $setting->getContent($locale) : null;
    }

    /**
     * Set setting value
     */
    public function setContent($value, $locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        $this->translateOrNew($locale)->value = $value;
        $this->save();

        return $this;
    }

    /**
     * Check if setting exists
     */
    public static function exists($key, $locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        return self::whereHas('translations', function($query) use ($key, $locale) {
            $query->where('locale', $locale)->where('name', $key);
        })->exists();
    }
}
{
    //
}
