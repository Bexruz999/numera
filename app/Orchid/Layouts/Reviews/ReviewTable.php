<?php

namespace App\Orchid\Layouts\Reviews;

use App\Models\Review;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class ReviewTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'reviews';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        $locale = app()->getLocale();

        return [
            TD::make('title', 'Title')->sort()->render(function (Review $review) use ($locale) {
                return optional($review->translate($locale))->title;
            }),
            TD::make('description', 'Description')->render(function (Review $review) use ($locale) {
                return optional($review->translate($locale))->description;
            }),
            TD::make('matrix', 'Matrix')->render(function (Review $review) use ($locale) {
                return optional($review->translate($locale))->type;
            }),
            TD::make('created_at', 'Created At')->sort(),
            TD::make('updated_at', 'Updated At')->sort(),
            TD::make('img', 'Image')->render(function (Review $review) {
                return $review->img ? "<img src='{$review->img}' style='max-width:100px;'>" : '';
            }),
            TD::make('action')->render(function (Review $review) {
                return
                    '<div class="d-flex gap-2">'
                    . ModalToggle::make()
                        ->icon('bs.pencil-square')
                        ->modal('edit')
                        ->method('update')
                        ->modalTitle('Edit Review')
                        ->asyncParameters([
                            'review' => $review->id,
                        ])->render()
                    . Button::make()
                        ->icon('bs.trash')
                        ->confirm('Are you sure you want to delete this review?')
                        ->method('delete', ['review' => $review->id])
                        ->render()
                    . '</div>';
            }),
        ];
    }
}
