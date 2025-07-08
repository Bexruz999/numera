<?php

namespace App\Orchid\Layouts\Advises;

use App\Models\Advise;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class AdviseTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'advises';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        $locale = app()->getLocale();

        return [
            TD::make('title', 'Title')->sort()->render(function (Advise $advise) use ($locale) {
                return optional($advise->translate($locale))->title;
            }),
            TD::make('subtitle', 'Subtitle')->render(function (Advise $advise) use ($locale) {
                return optional($advise->translate($locale))->subtitle;
            }),
            TD::make('img', 'Image')->render(function (Advise $advise) {
                return $advise->img ? "<img src='{$advise->img}' style='max-width:100px;'>" : '';
            }),
            TD::make('action')->render(function (Advise $advise) {
                return
                    '<div class="d-flex gap-2">'
                    . ModalToggle::make()
                        ->icon('bs.pencil-square')
                        ->modal('edit')
                        ->method('update')
                        ->modalTitle('Edit Advise')
                        ->asyncParameters([
                            'advise' => $advise->id,
                        ])->render()
                    . Button::make()
                        ->icon('bs.trash')
                        ->confirm('Are you sure you want to delete this review?')
                        ->method('delete', ['advise' => $advise->id])
                        ->render()
                    . '</div>';
            }),
        ];
    }
}
