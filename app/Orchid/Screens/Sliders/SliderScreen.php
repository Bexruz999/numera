<?php

namespace App\Orchid\Screens\Sliders;

use App\Models\Slider;
use App\Orchid\Layouts\Sliders\SlidersTable;
use Orchid\Support\Facades\Toast;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Screen;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Picture;


class SliderScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
             'sliders' => Slider::all(), // Uncomment and replace with actual model if needed
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Sliders';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
             ModalToggle::make('Create Slider')
                 ->modal('createSlider')
                 ->icon('bs.plus')
                 ->method('createSlider')
                 ->modalTitle('Create Slider'),
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            SlidersTable::class,

            Layout::modal('createSlider', [
                Layout::tabs([
                     'Create UZ' => Layout::rows([
                         Input::make('slider.title.uz')
                                ->title('Title')
                                ->placeholder('Enter slider title in Uzbek'),
                        Input::make('slider.button_name.uz')
                                ->title('Button Name')
                                ->placeholder('Enter button name in Uzbek'),
                     ]),
                    'Create RU' => Layout::rows([
                        Input::make('slider.title.ru')
                            ->title('Title')
                            ->placeholder('Enter slider title in Russian'),
                        Input::make('slider.button_name.ru')
                            ->title('Button Name')
                            ->placeholder('Enter button name in Russian'),
                    ]),
                ]),
                Layout::rows([
                    Picture::make('slider.background')->title('Image')
                        ->targetRelativeUrl(),

                    Input::make('slider.button_link')
                        ->title('Button Link')
                        ->placeholder('Enter button link'),
                ]),
            ]),

            Layout::modal('editSlider', [
                Layout::tabs([
                    'Edit UZ' => Layout::rows([
                        Input::make('slider.title.uz')
                            ->title('Title')
                            ->placeholder('Edit slider title in Uzbek'),
                        Input::make('slider.button_name.uz')
                            ->title('Button Name')
                            ->placeholder('Edit button name in Uzbek'),
                    ]),
                    'Edit RU' => Layout::rows([
                        Input::make('slider.title.ru')
                            ->title('Title')
                            ->placeholder('Edit slider title in Russian'),
                        Input::make('slider.button_name.ru')
                            ->title('Button Name')
                            ->placeholder('Edit button name in Russian'),
                    ]),
                ]),
                Layout::rows([
                    Picture::make('slider.background')->title('Image')
                        ->targetRelativeUrl(),

                    Input::make('slider.button_link')
                        ->title('Button Link')
                        ->placeholder('Edit button link'),
                ]),
            ])
        ];
    }

    public function createSlider(): void
    {
        $data = request()->post('slider');
        if (!is_array($data)) {
            parse_str($data, $data);
        }

        $slider = new Slider();

        $slider->background = $data['background'] ?? null;
        $slider->button_link = $data ['button_link'] ?? null;

        foreach (['uz', 'ru'] as $locale) {
            $slider->translateOrNew($locale)->title = $data['title'][$locale] ?? null;
            $slider->translateOrNew($locale)->button_name = $data['button_name'][$locale] ?? null;
        }

        $slider->save();
        Toast::info('Slider created successfully.');
    }

    public function editSlider(Slider $slider): void
    {
        $data = request()->post('slider');
        if (!is_array($data)) {
            parse_str($data, $data);
        }


        $slider->background = $data['background'] ?? null;
        $slider->button_link = $data['button_link'] ?? null;

        foreach (['uz', 'ru'] as $locale) {
            $slider->translateOrNew($locale)->title = $data['title'][$locale] ?? null;
            $slider->translateOrNew($locale)->button_name = $data['button_name'][$locale] ?? null;
        }

        $slider->save();
        Toast::info('Slider updated successfully.');
    }

    public function deleteSlider($id): void
    {
        $slider = Slider::findOrFail($id);
        $slider->delete();

        Toast::info('Slider deleted successfully.');
    }

}
