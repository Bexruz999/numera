<?php

namespace App\Orchid\Layouts\Slides;

use App\Models\Slide;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class SlideTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'slides';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('img', 'Image')->render(function (Slide $slide) {
                return $slide->img ? "<img src='{$slide->img}' style='max-width:100px;'>" : '';
            }),
            TD::make('action')->render(function (Slide $slide) {
                return
                    '<div class="d-flex gap-2">'
                    . ModalToggle::make()
                        ->icon('bs.pencil-square')
                        ->modal('edit')
                        ->method('update')
                        ->modalTitle('Edit Slide')
                        ->asyncParameters([
                            'slide' => $slide->id,
                        ])->render()
                    . Button::make()
                        ->icon('bs.trash')
                        ->confirm('Are you sure you want to delete this review?')
                        ->method('delete', ['slide' => $slide->id])
                        ->render()
                    . '</div>';
            }),
        ];
    }
}
