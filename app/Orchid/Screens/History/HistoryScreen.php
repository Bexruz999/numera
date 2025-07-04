<?php

namespace App\Orchid\Screens\History;

use App\Models\Article;
use App\Models\History;
use App\Orchid\Layouts\History\HistoryTable;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class HistoryScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'history' => History::query()->get()
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'History';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('Create history')
                ->modal('create')
                ->method('create')
                ->icon('bs.plus')
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
            HistoryTable::class,

            Layout::modal('create', [
                Layout::rows([
                    Picture::make('history.img')
                        ->title('Image')
                        ->targetRelativeUrl()
                        ->required()
                        ->help('Upload an image for the article'),
                ]),
                Layout::tabs([
                    'Create UZ' => Layout::rows([
                        Input::make('history.name.uz')
                            ->title('Ism (UZ)')
                            ->placeholder('Ism kiriting (uz)')
                            ->required(),
                        Input::make('history.description.uz')
                            ->title('description (UZ)')
                            ->placeholder('Pozitsiyani kiriting (uz)')
                            ->required(),
                        Input::make('history.position.uz')
                            ->title('Type')
                            ->placeholder('Select the position of the article')
                            ->required(),
                    ]),
                    'Create RU' => Layout::rows([
                        Input::make('history.name.ru')
                            ->title('Title (RU)')
                            ->placeholder('Enter article title (ru)'),
                        Input::make('history.description.ru')
                            ->title('Description (RU)')
                            ->placeholder('Enter article description (ru)'),
                        Input::make('history.position.ru')
                            ->title('Type')
                            ->placeholder('Select the position of the article')
                            ->required(),
                    ]),
                ])
            ])->method('create'),

            Layout::modal('edit', [
                Layout::rows([
                    Picture::make('history.img')
                        ->title('Image')
                        ->targetRelativeUrl()
                        ->required()
                        ->help('Upload an image for the article'),
                ]),
                Layout::tabs([
                    'Uz' => Layout::rows([
                        Input::make('history.name.uz')
                            ->title('Title (UZ)')
                            ->placeholder('Enter article title (uz)')
                            ->required(),
                        Input::make('history.description.uz')
                            ->title('Description (UZ)')
                            ->placeholder('Enter article description (uz)')
                            ->required(),
                        Input::make('history.position.uz')
                            ->title('Type')
                            ->placeholder('Select the type of the article')
                            ->required(),
                    ]),
                    'Ru' => Layout::rows([
                        Input::make('history.name.ru')
                            ->title('Title (RU)')
                            ->placeholder('Enter article title (ru)'),
                        Input::make('history.description.ru')
                            ->title('Description (RU)')
                            ->placeholder('Enter article description (ru)'),
                        Input::make('history.position.ru')
                            ->title('Type')
                            ->placeholder('Select the type of the article')
                            ->required(),
                    ]),
                ])
            ])->async('asyncGet'),

        ];
    }

    public function create()
    {
        $data = request()->post('history');
        if (!is_array($data)) {
            parse_str($data, $data);
        }


        $validated = validator($data, [
            'img' => 'nullable|string',
        ])->validate();

        $history = new History();
        $history->img = $validated['img'] ?? null;

        foreach (['uz', 'ru'] as $locale) {
            $history->translateOrNew($locale)->name = $data['name'][$locale] ?? null;
            $history->translateOrNew($locale)->description = $data['description'][$locale] ?? null;
            $history->translateOrNew($locale)->position = $data['position'][$locale] ?? null;
        }

        $history->save();

        Toast::info('Article created successfully!');
    }

    public function asyncGet(History $history): array
    {
        // Prepare the article data in the structure expected by the form
        $data = [
            'img' => $history->img,
            'name' => [
                'uz' => $history->translate('uz')->name ?? '',
                'ru' => $history->translate('ru')->name ?? '',
            ],
            'description' => [
                'uz' => $history->translate('uz')->description ?? '',
                'ru' => $history->translate('ru')->description ?? '',
            ],
            'position' => [
                'uz' => $history->translate('uz')->position ?? '',
                'ru' => $history->translate('ru')->position ?? '',
            ],
        ];

        return [
            'history' => $data
        ];
    }

    public function update(History $article): void
    {
        $data = request()->post('article');
        if (!is_array($data)) {
            parse_str($data, $data);
        }

        $validated = validator($data, [
            'title.uz' => 'required|string|max:255',
            'description.uz' => 'required|string',
            'img' => 'nullable|string',
            'type.uz' => 'required',
        ])->validate();

        $article->img = $validated['img'] ?? null;

        foreach (['uz', 'ru'] as $locale) {
            $article->translateOrNew($locale)->title = $data['title'][$locale] ?? null;
            $article->translateOrNew($locale)->description = $data['description'][$locale] ?? null;
            $article->translateOrNew($locale)->type = $data['type'][$locale] ?? null;
        }

        $article->save();

        Toast::info('Article updated successfully!');
    }

    public function delete(History $article): void
    {
        $article->delete();
        Toast::info('Article deleted successfully!');
    }


}
