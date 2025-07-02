<?php

namespace App\Orchid\Layouts\Services;

use App\Models\Frame;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class FrameTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'frames';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        $locale = app()->getLocale();
        return [
            TD::make('name', 'Name')->sort()->render(function (Frame $frame) use ($locale) {
                return optional($frame->translate($locale))->name;}),
            TD::make('title', 'Title')->sort()->render(function (Frame $frame) use ($locale) {
                return optional($frame->translate($locale))->title;}),
            TD::make('text', 'Text')->sort()->render(function (Frame $frame) use ($locale) {
                return optional($frame->translate($locale))->text;}),
            TD::make('created_at', 'Created At')->sort(),
            TD::make('updated_at', 'Updated At')->sort(),
            TD::make('img', 'Image')->render(function ($frame) {
                return $frame->img ? "<img src='{$frame->img}' style='max-width:100px;'>" : '';
            }),
            TD::make('action')->render(function (Frame $frame) {
                return
                    '<div class="d-flex gap-2">'
                    . ModalToggle::make()
                        ->icon('bs.pencil-square')
                        ->modal('editFrame')
                        ->method('updateFrame')
                        ->modalTitle('Edit Frame')
                        ->asyncParameters([
                            'frame' => $frame->id,
                        ])->render()
                    . ModalToggle::make()
                        ->icon('bs.trash')
                        ->modal('deleteFrame')
                        ->method('deleteFrame')
                        ->modalTitle('Delete Frame')
                        ->asyncParameters([
                            'frame' => $frame->id,
                        ])->render()
                    . '</div>';
            }),
        ];
    }
}
