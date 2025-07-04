<?php

namespace App\Orchid\Screens\Questions;

use App\Models\Question;
use App\Orchid\Layouts\Questions\QuestionTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Orchid\Screen\Action;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class QuestionScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'questions' => Question::orderby('order')->with('translations')->get(),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public $description = 'Manage your questions and answers';

    public function name(): ?string
    {
        return 'Questions' . ' ' . App::currentLocale();
    }

    /**
     * The screen's action buttons.
     *
     * @return Action[]
     */
    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('Create Question')
                ->icon('plus')
                ->modal('createQuestion')
                ->method('createQuestion')
                ->modalTitle('Create Question')
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            QuestionTable::class,

            Layout::modal('createQuestion', [
                Layout::tabs([
                    'Uz' => Layout::rows([
                        Input::make('question.uz.question')
                            ->title('Savol (Uz)')
                            ->required(),
                        Input::make('question.uz.answer')
                            ->title('Javob (Uz)')
                            ->required(),
                    ]),
                    'Ru' => Layout::rows([
                        Input::make('question.ru.question')
                            ->title('Savol (Ru)')
                            ->required(),
                        Input::make('question.ru.answer')
                            ->title('Javob (Ru)')
                            ->required(),
                    ]),
                ]),
            ])->title('Create Question')
                ->method('createQuestion'),

            Layout::modal('editQuestion', [
                Layout::tabs([
                    'Edit Uz' => Layout::rows([
                        Input::make('question.question.uz')
                            ->title('Savol (Uz)')
                            ->required(),
                        Input::make('question.answer.uz')
                            ->title('Javob (Uz)')
                            ->required(),
                    ]),
                    'Edit Ru' => Layout::rows([
                        Input::make('question.question.ru')
                            ->title('Savol (Ru)')
                            ->required(),
                        Input::make('question.answer.ru')
                            ->title('Javob (Ru)')
                            ->required(),
                    ]),
                ]),

                Layout::rows([
                    Input::make('question.order')
                        ->title('Order')
                        ->type('number')
                        ->help('Set the order of the question in the list')
                        ->required(),
                ])
            ])->title('Edit Question')
                ->async('asyncGetQuestion')
                ->method('updateQuestion'),
        ];
    }

    /**
     * Create a new question with translations.
     */
    public function createQuestion(Request $request)
    {
        $data = $request['question'] ?? [];

        // Get max order and increment for new question
        $maxOrder = Question::max('order');
        $order = $maxOrder ? $maxOrder + 1 : 1;

        $question = new Question();
        $question->order = $order;
        $question->save();

        foreach (['uz', 'ru'] as $locale) {
            $question->translateOrNew($locale)->question = $data[$locale]['question'] ?? '';
            $question->translateOrNew($locale)->answer = $data[$locale]['answer'] ?? '';
        }
        $question->save();

        Toast::info('Question created successfully!');
    }

    /**
     * Update an existing question with translations.
     */
    public function updateQuestion(Request $request)
    {
        $id = $request->get('question');
        $data = $request->input('question', []);

        $question = Question::findOrFail($id);

        foreach (['uz', 'ru'] as $locale) {
            $question->translateOrNew($locale)->question = $data['question'][$locale] ?? '';
            $question->translateOrNew($locale)->answer = $data['answer'][$locale] ?? '';
        }
        $question->order = $data['order'] ?? 1; // Ensure order is set
        $question->save();

        Toast::info('Question updated successfully!');
    }

    /**
     * Drag-and-drop orqali tartiblangan orderlarni saqlash.
     */
    public function saveOrder(Request $request)
    {
        $items = $request->input('questions', []);
        foreach ($items as $index => $id) {
            Question::where('id', $id)->update(['order' => $index + 1]);
        }
        Toast::info('Order updated!');
    }

    /**
     * Delete a question and its translations.
     */
    public function deleteQuestion(Request $request)
    {
        $id = $request->input('question');
        $question = Question::findOrFail($id);
        $question->delete();
        Toast::info('Question deleted successfully!');
    }

    public function asyncGetQuestion(Question $question): array
    {
        // Prepare the article data in the structure expected by the form
        $data = [
            'question' => [
                'uz' => $question->translate('uz')->question ?? '',
                'ru' => $question->translate('ru')->question ?? '',
            ],
            'answer' => [
                'uz' => $question->translate('uz')->answer ?? '',
                'ru' => $question->translate('ru')->answer ?? '',
            ],
            'order' => $question->order ?? 1,
        ];

        return [
            'question' => $data
        ];
    }
}
