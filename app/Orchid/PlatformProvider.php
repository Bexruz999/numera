<?php

declare(strict_types=1);

namespace App\Orchid;

use Orchid\Platform\ItemPermission;
use Orchid\Platform\OrchidServiceProvider;
use Orchid\Screen\Actions\Menu;
use Illuminate\Support\Facades\Session;

class PlatformProvider extends OrchidServiceProvider
{

    protected array $locales = [
        'uz' => 'O‘zbekcha',
        'ru' => 'Русский',
    ];

    protected string $locale; // Default locale

    /**
     * Register the application menu.
     *
     * @return Menu[]
     */
    public function menu(): array
    {
        $this->locale = Session::get('locale', app()->getLocale());

        return [
            Menu::make($this->locales[$this->locale] ?? strtoupper($this->locale))
                ->icon('bs.translate')
                ->list([
                    Menu::make('O‘zbekcha')
                        ->icon('flag')
                        ->url(route('set-locale', ['locale' => 'uz']))
                        ->active(($this->locale === 'uz') ? 'active' : null),
                    Menu::make('Русский')
                        ->icon('flag')
                        ->url(route('set-locale', ['locale' => 'ru']))
                        ->active(($this->locale === 'ru') ? 'active' : null),
                ])
                ->title('admin.Locale'),

            ////////////////////////////////////

            Menu::make('admin.Categories')
                ->icon('bs.window')
                ->route('platform.categories'),

            Menu::make('Products')
                ->icon('bs.box-seam')
                ->route('platform.products'),

            Menu::make('Banners')
                ->icon('bs.image')
                ->route('platform.banners'),

            Menu::make('Sliders')
                ->icon('bs.image')
                ->route('platform.sliders'),

            Menu::make('Brands')
                ->icon('bs.bookmark-star')
                ->route('platform.brands'),


            Menu::make('Get Started')
                ->icon('bs.book')
                ->title('Navigation')
                ->route(config('platform.index')),

            Menu::make('Sample Screen')
                ->icon('bs.collection')
                ->route('platform.example')
                ->badge(fn() => 6),

            Menu::make('Form Elements')
                ->icon('bs.card-list')
                ->route('platform.example.fields')
                ->active('*/examples/form/*'),

            Menu::make('Layouts Overview')
                ->icon('bs.window-sidebar')
                ->route('platform.example.layouts'),

            Menu::make('Grid System')
                ->icon('bs.columns-gap')
                ->route('platform.example.grid'),

            Menu::make('Charts')
                ->icon('bs.bar-chart')
                ->route('platform.example.charts'),

            Menu::make('Cards')
                ->icon('bs.card-text')
                ->route('platform.example.cards')
                ->divider(),

            /////////////////////////

            Menu::make(__('admin.Users'))
                ->icon('bs.people')
                ->route('platform.systems.users')
                ->permission('platform.systems.users')
                ->title(__('admin.Access')),

            Menu::make('admin.Settings')
                ->icon('bs.gear')
                ->route('platform.settings')
                ->permission('platform.systems.users'),

            Menu::make(__('admin.Roles'))
                ->icon('bs.shield')
                ->route('platform.systems.roles')
                ->permission('platform.systems.roles')
                ->divider(),

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
