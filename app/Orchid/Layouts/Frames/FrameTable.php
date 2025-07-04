<?php

namespace App\Orchid\Layouts\Frames;

use App\Models\Frame;
use Orchid\Screen\Actions\Button;
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
        return [
            TD::make('name', 'Name')->render(function (Frame $frame) {
                $locale = app()->getLocale();
                return $frame->translate($locale)?->name ?? '';
            }),
            TD::make('title', 'Title')->render(function (Frame $frame) {
                $locale = app()->getLocale();
                return $frame->translate($locale)?->title ?? '';
            }),
            TD::make('text', 'Description')->render(function (Frame $frame) {
                $locale = app()->getLocale();
                return $frame->translate($locale)?->text ?? '';
            }),
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
                    . Button::make()
                        ->icon('bs.trash')
                        ->confirm('Are you sure you want to delete this review?')
                        ->method('delete', ['frame' => $frame->id])
                        ->render()
                    . '</div>';
            }),
        ];
    }
}
