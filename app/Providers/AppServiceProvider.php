<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $settings = [];

        foreach (Setting::all() as $setting) {
            $settings["$setting->group.$setting->name"] = $setting->getContent();
        }

        view()->share('settings', $settings);
    }
}
