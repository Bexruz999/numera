<?php

namespace App\Orchid\Layouts\History;

use App\Models\History;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class HistoryTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'history';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        $locale = app()->getLocale();
        return [
            TD::make('title', 'Title')->sort()->render(function (History $history) use ($locale) {
                return optional($history->translate($locale))->title;
            }),
            TD::make('description', 'Description')->render(function (History $history) use ($locale) {
                return optional($history->translate($locale))->description;
            }),
            TD::make('position', 'Position')->render(function (History $history) use ($locale) {
                return optional($history->translate($locale))->position;
            }),
            TD::make('img', 'Image')->render(function (History $history) {
                return $history->img ? "<img src='{$history->img}' style='max-width:100px;'>" : '';
            }),
            TD::make('action')->render(function (History $history) {
                return
                    '<div class="d-flex gap-2">'
                    . ModalToggle::make()
                        ->icon('bs.pencil-square')
                        ->modal('edit')
                        ->method('update')
                        ->modalTitle('Edit')
                        ->asyncParameters([
                            'history' => $history->id,
                        ])->render()
                    . Button::make()
                        ->icon('bs.trash')
                        ->confirm('Are you sure you want to delete this review?')
                        ->method('delete', ['history' => $history->id])
                        ->render()
                    . '</div>';
            }),
        ];
    }
}
