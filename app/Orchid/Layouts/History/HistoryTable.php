<?php

namespace App\Orchid\Layouts\History;

use App\Models\Article;
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
    protected $target = 'histories';

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
            TD::make('img', 'Image')->render(function (History $history) {
                return $history->img ? "<img src='{$history->img}' style='max-width:50px;'>" : '';
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
                        ->confirm('bla bla ?')
                        ->method('delete', ['history' => $history->id])
                    . '</div>';
            }),
        ];
    }
}
