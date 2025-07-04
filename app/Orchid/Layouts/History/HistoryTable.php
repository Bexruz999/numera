<?php

namespace App\Orchid\Layouts\History;

use App\Models\Article;
use App\Models\History;
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
        return [
            TD::make('id', 'ID'),
            TD::make('name', 'Nomi'),

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
                    . ModalToggle::make()
                        ->icon('bs.trash')
                        ->modal('delete')
                        ->method('delete')
                        ->modalTitle('Delete')
                        ->asyncParameters([
                            'history' => $history->id,
                        ])->render()
                    . '</div>';
            }),
        ];
    }
}
