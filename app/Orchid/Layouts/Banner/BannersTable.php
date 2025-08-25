<?php

namespace App\Orchid\Layouts\Banner;

use App\Models\Banner;
use Illuminate\Support\Facades\Lang;
use Orchid\Alert\Toast;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class BannersTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     *
     * @var string
     */
    protected $target = 'banners';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {

        $locale = app()->getLocale();

        return [
            TD::make('title', __('Title'))->style('border-bottom: 1px solid #dee2e6;')->render(function ($banner) use ($locale) {
                return optional($banner->translate($locale))->title;
            }),
            TD::make('subtitle', __('Subtitle'))->style('border-bottom: 1px solid #dee2e6;')->render(function ($banner) use ($locale) {
                return optional($banner->translate($locale))->subtitle;
            }),
            TD::make('button_text', __('Button Text'))->style('border-bottom: 1px solid #dee2e6;')->render(function ($banner) use ($locale) {
                return optional($banner->translate($locale))->button_text;
            }),
            TD::make('button_link', __('Button Link'))->style('border-bottom: 1px solid #dee2e6;')->render(function ($banner) {
                return $banner->button_link ?: '<span class="text-muted">No link</span>';
            }),
            TD::make('background', __('Background'))->style('border-bottom: 1px solid #dee2e6;')->render(function ($banner) {
                if (!$banner->background || empty($banner->background)) {
                    return '<span class="text-muted">No background image</span>';
                }

                // Split the comma-separated image paths
                $images = explode(',', $banner->background);

                // Generate HTML for each image
                $html = '';
                foreach ($images as $image) {
                    $html .= '<img src="' . asset(trim($image)) . '" alt="Banner Background" style="max-width: 50px; max-height: 50px; margin-right: 5px;">';
                }

                return $html;
            }),
            TD::make('action')->style('border-bottom: 1px solid #dee2e6;')->render(function (Banner $banner) {
                return
                    '<div class="d-flex gap-2">'
                    . ModalToggle::make()
                        ->icon('bs.pencil-square')
                        ->modal('editBanner')
                        ->method('editBanner')
                        ->modalTitle(Lang::get('Edit Banner'))
                        ->asyncParameters([
                            'banner' => $banner->id,
                        ])->render()
                    . Button::make()
                        ->icon('bs.trash')
                        ->confirm(Lang::get('Are you sure you want to delete this banner?'))
                        ->method('deleteBanner', ['id' => $banner->id])
                        ->render()
                    . '</div>';
            }),
        ];
    }

}
