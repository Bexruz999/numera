<?php

declare(strict_types=1);

namespace App\Orchid;

use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemPermission;
use Orchid\Platform\OrchidServiceProvider;
use Orchid\Screen\Actions\Menu;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;

class PlatformProvider extends OrchidServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @param Dashboard $dashboard
     *
     * @return void
     */
    public function boot(Dashboard $dashboard): void
    {
        parent::boot($dashboard);

        // ...
    }

    /**
     * Register the application menu.
     *
     * @return Menu[]
     */
    public function menu(): array
    {
        $locales = [
            'uz' => 'O‘zbekcha',
            'ru' => 'Русский',
        ];

        $currentLocale = Session::get('locale', app()->getLocale());

        App::setLocale($currentLocale);

        return [
            Menu::make($locales[$currentLocale] ?? strtoupper($currentLocale))
                ->icon('bs.translate')
                ->list([
                    Menu::make('O‘zbekcha')
                        ->icon('flag')
                        ->url(route('set-locale', ['locale' => 'uz']))
                        ->active($currentLocale === 'uz'),
                    Menu::make('Русский')
                        ->icon('flag')
                        ->url(route('set-locale', ['locale' => 'ru']))
                        ->active($currentLocale === 'ru'),
                ])
                ->title('Locale'),

            Menu::make('Articles')
                ->icon('bs.book')
                ->route('platform.articles'),

            Menu::make('Frame')
                ->icon('bs.window')
                ->route('platform.frame'),

//            Menu::make('Get Started')
//                ->icon('bs.book')
//                ->title('Navigation')
//                ->route(config('platform.index')),
//
//            Menu::make('Sample Screen')
//                ->icon('bs.collection')
//                ->route('platform.example')
//                ->badge(fn () => 6),
//
//            Menu::make('Form Elements')
//          @form($uzFields)        ->icon('bs.card-list')
//                ->route('platform.example.fields')
//                ->active('*/examples/form/*'),
//
//            Menu::make('Layouts Overview')
//                ->icon('bs.window-sidebar')
//                ->route('platform.example.layouts'),
//
//            Menu::make('Grid System')
//                ->icon('bs.columns-gap')
//                ->route('platform.example.grid'),
//
//            Menu::make('Charts')
//                ->icon('bs.bar-chart')
//                ->route('platform.example.charts'),
//
//            Menu::make('Cards')
//                ->icon('bs.card-text')
//                ->route('platform.example.cards')
//                ->divider(),
//
//            Menu::make(__('Users'))
//                ->icon('bs.people')
//                ->route('platform.systems.users')
//                ->permission('platform.systems.users')
//                ->title(__('Access Controls')),
//
//            Menu::make(__('Roles'))
//                ->icon('bs.shield')
//                ->route('platform.systems.roles')
//                ->permission('platform.systems.roles')
//                ->divider(),
//
//            Menu::make('Documentation')
//                ->title('Docs')
//                ->icon('bs.box-arrow-up-right')
//                ->url('https://orchid.software/en/docs')
//                ->target('_blank'),
//
//            Menu::make('Changelog')
//                ->icon('bs.box-arrow-up-right')
//                ->url('https://github.com/orchidsoftware/platform/blob/master/CHANGELOG.md')
//                ->target('_blank')
//                ->badge(fn () => Dashboard::version(), Color::DARK),
        ];
    }

    /**
     * Register permissions for the application.
     *
     * @return ItemPermission[]
     */
    public function permissions(): array
    {
        return [
            ItemPermission::group(__('System'))
                ->addPermission('platform.systems.roles', __('Roles'))
                ->addPermission('platform.systems.users', __('Users')),
        ];
    }
}
