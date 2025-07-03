<?php

namespace App\Orchid\Layouts\Questions;

use App\Models\Question;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class QuestionTable extends Table
{
    /**
     * Jadvalni drag-and-drop qilish uchun.
     */
    public $reorderable = true;

    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'questions';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        $locale = app()->getLocale();

        return [
            TD::make('question', 'Question')->sort()->render(function (Question $question) use ($locale) {
                return optional($question->translate($locale))->question;
            }),
            TD::make('answer', 'Answer')->sort()->render(function (Question $question) use ($locale) {
                return optional($question->translate($locale))->answer;
            }),
            TD::make('order', 'Order')
                ->sort()
                ->render(function (Question $question) {
                    return $question->order;
                }),
            TD::make('action', 'Action')->render(function (Question $question) {
                return
                    '<div class="d-flex gap-2">'
                    . ModalToggle::make()
                        ->icon('bs.pencil-square')
                        ->modal('editQuestion')
                        ->method('updateQuestion')
                        ->modalTitle('Edit Question')
                        ->asyncParameters([
                            'question' => $question->id,
                        ])->render()
                    . ModalToggle::make()
                        ->icon('bs.trash')
                        ->modal('deleteQuestion')
                        ->method('deleteQuestion')
                        ->modalTitle('Delete Question')
                        ->asyncParameters([
                            'question' => $question->id,
                        ])->render()
                    . '</div>';
            }),
        ];
    }
}
