<?php

namespace App\Orchid\Layouts\Benefits;

use App\Models\Benefit;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class BenefitTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'benefits';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        $locale = app()->getLocale();

        return [
            TD::make('title', 'Title')->sort()->render(function (Benefit $benefit) use ($locale) {
                return optional($benefit->translate($locale))->title;
            }),

            TD::make('text', 'Text')->sort()->render(function (Benefit $benefit) use ($locale) {
                return optional($benefit->translate($locale))->text;
            }),

            TD::make('img', 'Image')->render(function (Benefit $benefit) {
                return $benefit->img ? "<img alt='' src='{$benefit->img}' style='max-width:100px;'>" : '';
            }),

            TD::make('action')->render(function (Benefit $benefit) {
                return
                    '<div class="d-flex gap-2">'
                    . ModalToggle::make()
                        ->icon('bs.pencil-square')
                        ->modal('editBenefit')
                        ->method('updateBenefit')
                        ->modalTitle('Edit Benefit')
                        ->asyncParameters([
                            'benefit' => $benefit->id,
                        ])->render()
                    . Button::make()
                        ->icon('bs.trash')
                        ->confirm('Are you sure you want to delete this review?')
                        ->method('delete', ['benefit' => $benefit->id])
                        ->render()
                    . '</div>';
            }),
        ];
    }
}
