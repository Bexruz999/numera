<?php

namespace App\Orchid\Layouts\Sliders;

use App\Models\Slider;
use Illuminate\Support\Facades\Lang;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use Orchid\Screen\Actions\Button;
use Orchid\Alert\Toast;


class SlidersTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'sliders';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {

        $locale = app()->getLocale();

        return [
            TD::make('title', __('Title'))
                ->style('border-bottom: 1px solid #dee2e6;')
                ->render(function ($slider) use ($locale) {
                    return optional($slider->translate($locale))->title;
            }),
            TD::make('button_name', __('Button Name'))
                ->style('border-bottom: 1px solid #dee2e6;')
                ->render(function ($slider) use ($locale) {
                    return optional($slider->translate($locale))->button_name;
            }),
            TD::make('button_link', __('Button Link'))
                ->style('border-bottom: 1px solid #dee2e6;')
                ->render(function ($slider) {
                    return $slider->button_link ?: '<span class="text-muted">No link</span>';
            }),
            TD::make('background', __('Background'))
                ->style('border-bottom: 1px solid #dee2e6;')
                ->render(function ($slider) {
                    if (!$slider->background || empty($slider->background)) {
                        return '<span class="text-muted">No background image</span>';
                    }

                    // Split the comma-separated image paths
                    $images = explode(',', $slider->background);

                    // Generate HTML for each image
                    $html = '';
                    foreach ($images as $image) {
                        $html .= '<img src="' . asset(trim($image)) . '" alt="Slider Background" style="max-width: 50px; max-height: 50px; margin-right: 5px;">';
                    }

                    return $html;
            }),
            TD::make('action')->style('border-bottom: 1px solid #dee2e6;')->render(function (Slider $slider) {
                return
                    '<div class="d-flex gap-2">'
                    .  ModalToggle::make()
                            ->icon('bs.pencil-square')
                            ->modal('editSlider')
                            ->modalTitle(__('Edit Slider'))
                            ->method('editSlider')
                            ->asyncParameters([
                                'slider' => $slider->id,
                            ])->render()
                    . Button::make()
                            ->icon('bs.trash')
                            ->confirm(__('Are you sure you want to delete this slider?'))
                            ->method('deleteSlider', ['id' => $slider->id])
                            ->render()
                    . '</div>';

            }),
        ];
    }

}
