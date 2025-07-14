<?php

declare(strict_types=1);

namespace App\Orchid;

use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemPermission;
use Orchid\Platform\OrchidServiceProvider;
use Orchid\Screen\Actions\Menu;
use Illuminate\Support\Facades\Session;
use Orchid\Support\Color;

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
                ->title('Locale'),

            Menu::make('Articles')
                ->icon('newspaper')
                ->route('platform.articles'),

            Menu::make('Frame')
                ->icon('bs.window')
                ->route('platform.frame'),

            Menu::make('History')
                ->icon('bs.window')
                ->route('platform.history'),

            Menu::make('Questions')
                ->icon('bs.question-circle')
                ->route('platform.questions'),

            Menu::make('Consultations')
                ->icon('bs.chat-square-text')
                ->route('platform.consultations'),

            Menu::make('Advises')
                ->icon('bs.lightbulb')
                ->route('platform.advises'),

            Menu::make('Slides')
                ->icon('bs.file-slides')
                ->route('platform.slides'),

            Menu::make('Benefits')
                ->icon('bs.shield-check')
                ->route('platform.benefits'),

            Menu::make('Commands')
                ->icon('bs.command')
                ->route('platform.commands'),

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

            Menu::make(__('Users'))
                ->icon('bs.people')
                ->route('platform.systems.users')
                ->permission('platform.systems.users')
                ->title(__('Access Controls')),

            Menu::make('Settings')
                ->icon('bs.gear')
                ->route('platform.settings')
                ->permission('platform.systems.users'),

            Menu::make(__('Roles'))
                ->icon('bs.shield')
                ->route('platform.systems.roles')
                ->permission('platform.systems.roles')
                ->divider(),

            Menu::make('Documentation')
                ->title('Docs')
                ->icon('bs.box-arrow-up-right')
                ->url('https://orchid.software/en/docs')
                ->target('_blank'),

            Menu::make('Changelog')
                ->icon('bs.box-arrow-up-right')
                ->url('https://github.com/orchidsoftware/platform/blob/master/CHANGELOG.md')
                ->target('_blank')
                ->badge(fn() => Dashboard::version(), Color::DARK),
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
