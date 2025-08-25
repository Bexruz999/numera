<?php

namespace App\Orchid\Layouts\Brands;

use App\Models\Banner;
use App\Models\Brand;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Layout;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class BrandsTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'brands';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [

            TD::make('logo', __('Logo'))->style('border-bottom: 1px solid #dee2e6;')->render(function ($brand) {
                if (!$brand->image || empty($brand->image)) {
                    return '<span class="text-muted">No logo</span>';
                }
                return '<img src="' . asset($brand->image) . '" alt="Brand Logo" style="max-width: 50px; max-height: 50px;">';
            }),
            TD::make('action')->style('border-bottom: 1px solid #dee2e6;')->render(function (Brand $brand) {
                return
                    '<div class="d-flex gap-2">'
                    . ModalToggle::make()
                        ->icon('bs.pencil-square')
                        ->modal('editBrand')
                        ->method('editBrand')
                        ->modalTitle('Edit Brand')
                        ->asyncParameters([
                            'brand' => $brand->id,
                        ])->render()
                    . Button::make()
                        ->icon('bs.trash')
                        ->confirm('Are you sure you want to delete this brand?')
                        ->method('deleteBrand', ['id' => $brand->id])
                        ->render()
                    . '</div>';
            })

        ];
    }
}
