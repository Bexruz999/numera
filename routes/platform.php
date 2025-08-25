<?php

declare(strict_types=1);


use App\Orchid\Screens\Advises\AdviseScreen;
use App\Orchid\Screens\Banners\BannerScreen;
use App\Orchid\Screens\Benefits\BenefitsScreen;
use App\Orchid\Screens\Brands\BrandsScreen;
use App\Orchid\Screens\Categories\CategoriesScreen;
use App\Orchid\Screens\Commands\CommandScreen;
use App\Orchid\Screens\Consultations\ConsultationScreen;
use App\Orchid\Screens\Examples\ExampleActionsScreen;
use App\Orchid\Screens\Examples\ExampleCardsScreen;
use App\Orchid\Screens\Examples\ExampleChartsScreen;
use App\Orchid\Screens\Examples\ExampleFieldsAdvancedScreen;
use App\Orchid\Screens\Examples\ExampleFieldsScreen;
use App\Orchid\Screens\Examples\ExampleGridScreen;
use App\Orchid\Screens\Examples\ExampleLayoutsScreen;
use App\Orchid\Screens\Examples\ExampleScreen;
use App\Orchid\Screens\Examples\ExampleTextEditorsScreen;
use App\Orchid\Screens\Frames\FramesScreen;
use App\Orchid\Screens\History\HistoryScreen;
use App\Orchid\Screens\Products\ProductsScreen;
use App\Orchid\Screens\Questions\QuestionScreen;
use App\Orchid\Screens\Reviews\ReviewScreen;
use App\Orchid\Screens\Role\RoleEditScreen;
use App\Orchid\Screens\Role\RoleListScreen;
use App\Orchid\Screens\SettingsScreen;
use App\Orchid\Screens\Sliders\SliderScreen;
use App\Orchid\Screens\User\UserEditScreen;
use App\Orchid\Screens\User\UserListScreen;
use App\Orchid\Screens\User\UserProfileScreen;
use Illuminate\Support\Facades\Route;
use Tabuna\Breadcrumbs\Trail;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the need "dashboard" middleware group. Now create something great!
|
*/

// Main
Route::screen('/main', SettingsScreen::class)
    ->name('platform.main');

Route::screen('/categories', CategoriesScreen::class)
    ->name('platform.categories');

Route::screen('/products', ProductsScreen::class)
    ->name('platform.products');

Route::screen('/banners', BannerScreen::class)
    ->name('platform.banners');

Route::screen('/sliders', SliderScreen::class)
    ->name('platform.sliders');

Route::screen('/brands', BrandsScreen::class)
    ->name('platform.brands');


// Settings
Route::screen('/settings', SettingsScreen::class)
    ->name('platform.settings')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Settings'), route('platform.settings')));

////////////////////////////////////////////////////////////////
// Platform > Profile
Route::screen('profile', UserProfileScreen::class)
    ->name('platform.profile')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Profile'), route('platform.profile')));

// Platform > System > Users > User
Route::screen('users/{user}/edit', UserEditScreen::class)
    ->name('platform.systems.users.edit')
    ->breadcrumbs(fn (Trail $trail, $user) => $trail
        ->parent('platform.systems.users')
        ->push($user->name, route('platform.systems.users.edit', $user)));

// Platform > System > Users > Create
Route::screen('users/create', UserEditScreen::class)
    ->name('platform.systems.users.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.systems.users')
        ->push(__('Create'), route('platform.systems.users.create')));

// Platform > System > Users
Route::screen('users', UserListScreen::class)
    ->name('platform.systems.users')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Users'), route('platform.systems.users')));

// Platform > System > Roles > Role
Route::screen('roles/{role}/edit', RoleEditScreen::class)
    ->name('platform.systems.roles.edit')
    ->breadcrumbs(fn (Trail $trail, $role) => $trail
        ->parent('platform.systems.roles')
        ->push($role->name, route('platform.systems.roles.edit', $role)));

// Platform > System > Roles > Create
Route::screen('roles/create', RoleEditScreen::class)
    ->name('platform.systems.roles.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.systems.roles')
        ->push(__('Create'), route('platform.systems.roles.create')));

// Platform > System > Roles
Route::screen('roles', RoleListScreen::class)
    ->name('platform.systems.roles')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Roles'), route('platform.systems.roles')));

// Example...
Route::screen('example', ExampleScreen::class)
    ->name('platform.example')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push('Example Screen'));

Route::screen('/examples/form/fields', ExampleFieldsScreen::class)->name('platform.example.fields');
Route::screen('/examples/form/advanced', ExampleFieldsAdvancedScreen::class)->name('platform.example.advanced');
Route::screen('/examples/form/editors', ExampleTextEditorsScreen::class)->name('platform.example.editors');
Route::screen('/examples/form/actions', ExampleActionsScreen::class)->name('platform.example.actions');

Route::screen('/examples/layouts', ExampleLayoutsScreen::class)->name('platform.example.layouts');
Route::screen('/examples/grid', ExampleGridScreen::class)->name('platform.example.grid');
Route::screen('/examples/charts', ExampleChartsScreen::class)->name('platform.example.charts');
Route::screen('/examples/cards', ExampleCardsScreen::class)->name('platform.example.cards');

// Route::screen('idea', Idea::class, 'platform.screens.idea');
