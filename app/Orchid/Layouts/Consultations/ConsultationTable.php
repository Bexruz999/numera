<?php

namespace App\Orchid\Layouts\Consultations;

use App\Models\Consultation;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class ConsultationTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'consultations';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        $locale = app()->getLocale();
        return [
            TD::make('link', 'Link')->render(function (Consultation $consultation) use ($locale) {
                return optional($consultation->translate($locale))->link;
            }),
            TD::make('title', 'Title')->render(function (Consultation $consultation) use ($locale) {
                return optional($consultation->translate($locale))->title;
            }),
            TD::make('description', 'Description')->render(function (Consultation $consultation) use ($locale) {
                return optional($consultation->translate($locale))->description;
            }),
            TD::make('subtitle', 'Subtitle')->render(function (Consultation $consultation) use ($locale) {
                return optional($consultation->translate($locale))->subtitle;
            }),
            TD::make('created_at', 'Created At')->sort(),
            TD::make('updated_at', 'Updated At')->sort(),
            TD::make('img', 'Image')->render(function (Consultation $consultation) {
                return $consultation->img ? "<img src='{$consultation->img}' style='max-width:100px;'>" : '';
            }),
            TD::make('action')->render(function (Consultation $consultation) {
                return
                    '<div class="d-flex gap-2">'
                    . ModalToggle::make()
                        ->icon('bs.pencil-square')
                        ->modal('edit')
                        ->method('update')
                        ->modalTitle('Edit Consultation')
                        ->asyncParameters([
                            'consultation' => $consultation->id,
                        ])->render()
                    . Button::make()
                        ->icon('bs.trash')
                        ->confirm('Are you sure you want to delete this review?')
                        ->method('delete', ['consultation' => $consultation->id])
                        ->render()
                    . '</div>';
            })
        ];
    }
}
