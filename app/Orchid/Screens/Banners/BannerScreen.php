<?php

namespace App\Orchid\Screens\Banners;

use App\Models\Banner;
use App\Orchid\Layouts\Banner\BannersTable;
use Orchid\Support\Facades\Toast;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Screen;

class BannerScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'banners' => Banner::all(),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Banners';
    }

    public function commandBar(): iterable
    {
        return [
             ModalToggle::make('Create Banner')
                 ->modal('createBanner')
                 ->icon('bs.plus')
                 ->method('createBanner')
                 ->modalTitle('Create Banner'),
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            BannersTable::class,

            Layout::modal('createBanner', [
                Layout::tabs([
                    'Create UZ' => Layout::rows([
                        Input::make('banner.title.uz')
                            ->title('Title')
                            ->placeholder('Enter banner title in Uzbek')
                            ->required(),

                        Input::make('banner.subtitle.uz')
                            ->title('Subtitle')
                            ->placeholder('Enter banner subtitle in Uzbek')
                            ->required(),

                        Input::make('banner.button_text.uz')
                            ->title('Button Text')
                            ->placeholder('Enter button text in Uzbek')
                            ->required(),
                    ]),
                    'Create RU' => Layout::rows([
                        Input::make('banner.title.ru')
                            ->title('Title')
                            ->placeholder('Enter banner title in Russian')
                            ->required(),

                        Input::make('banner.subtitle.ru')
                            ->title('Subtitle')
                            ->placeholder('Enter banner subtitle in Russian')
                            ->required(),

                        Input::make('banner.button_text.ru')
                            ->title('Button Text')
                            ->placeholder('Enter button text in Russian')
                            ->required(),
                    ]),
                ]),

                Layout::rows([
                    Picture::make('banner.background')
                        ->title('Background Image')
                        ->targetRelativeUrl()
                        ->required(),

                    Input::make('banner.button_link')
                        ->title('Button Link')
                        ->placeholder('Enter Button link for the banner')
                        ->required(),
                ]),


            ])->title('Create Banner'),

            Layout::modal('editBanner', [
                Layout::tabs([
                    'Edit UZ' => Layout::rows([
                        Input::make('banner.title.uz')
                            ->title('Title')
                            ->placeholder('Edit banner title in Uzbek')
                            ->required(),

                        Input::make('banner.subtitle.uz')
                            ->title('Subtitle')
                            ->placeholder('Edit banner subtitle in Uzbek')
                            ->required(),

                        Input::make('banner.button_text.uz')
                            ->title('Button Text')
                            ->placeholder('Edit button text in Uzbek')
                            ->required(),
                    ]),
                    'Edit RU' => Layout::rows([
                        Input::make('banner.title.ru')
                            ->title('Title')
                            ->placeholder('Edit banner title in Russian')
                            ->required(),

                        Input::make('banner.subtitle.ru')
                            ->title('Subtitle')
                            ->placeholder('Edit banner subtitle in Russian')
                            ->required(),

                        Input::make('banner.button_text.ru')
                            ->title('Button Text')
                            ->placeholder('Edit button text in Russian')
                            ->required(),
                    ]),
                ]),

                Layout::rows([
                    Picture::make('banner.background')
                        ->title('Background Image')
                        ->targetRelativeUrl()
                        ->required(),

                    Input::make('banner.button_link')
                        ->title('Button Link')
                        ->placeholder('Enter Button link for the banner')
                        ->required(),
                ]),
            ])->title('Edit Banner'),

        ];
    }

    public function createBanner(): void
    {
        $data = request()->post('banner');
        if (!is_array($data)) {
            parse_str($data, $data);
        }

        $banner = new Banner();

        $banner->button_link = $data['button_link'] ?? '';
        $banner->background = $data['background'] ?? '';

        foreach(['uz', 'ru'] as $locale) {
            $banner->translateOrNew($locale)->title = $data['title'][$locale] ?? null;
            $banner->translateOrNew($locale)->subtitle = $data['subtitle'][$locale] ?? null;
            $banner->translateOrNew($locale)->button_text = $data['button_text'][$locale] ?? null;
        }

        $banner->save();

        Toast::success('Banner created successfully!');
    }

    public function editBanner(Banner $banner): void
    {
        $data = request()->post('banner');
        if (!is_array($data)) {
            parse_str($data, $data);
        }

        $banner->button_link = $data['button_link'] ?? '';
        $banner->background = $data['background'] ?? '';

        foreach(['uz', 'ru'] as $locale) {
            $banner->translateOrNew($locale)->title = $data['title'][$locale] ?? null;
            $banner->translateOrNew($locale)->subtitle = $data['subtitle'][$locale] ?? null;
            $banner->translateOrNew($locale)->button_text = $data['button_text'][$locale] ?? null;
        }

        $banner->save();

        Toast::success('Banner created successfully!');
    }

    public function deleteBanner($id): void
    {
        $banner = Banner::findOrFail($id);
        $banner->delete();
        Toast::info('Banner deleted successfully!');
    }

}
