<?php

namespace App\Orchid\Layouts\Commands;

use App\Models\Command;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class CommandTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'commands';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        $locale = app()->getLocale();

        return [
            TD::make('name', 'Name')->sort()->render(function (Command $command) use ($locale) {
                return optional($command->translate($locale))->name;
            }),
            TD::make('position', 'Position')->render(function (Command $command) use ($locale) {
                return optional($command->translate($locale))->position;
            }),
            TD::make('img', 'Image')->render(function (Command $command) {
                return $command->img ? "<img src='{$command->img}' style='max-width:100px;'>" : '';
            }),
            TD::make('action', 'Action')->render(function (Command $command) {
                return
                    '<div class="d-flex gap-2">'
                    . ModalToggle::make()
                        ->icon('bs.pencil-square')
                        ->modal('edit')
                        ->method('update')
                        ->modalTitle('Edit Command')
                        ->asyncParameters([
                            'command' => $command->id,
                        ])->render()
                    . Button::make()
                        ->icon('bs.trash')
                        ->confirm('Are you sure you want to delete this review?')
                        ->method('delete', ['command' => $command->id])
                        ->render()
                    . '</div>';
            }),
        ];
    }
}
