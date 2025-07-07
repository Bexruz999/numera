<?php

namespace App\Orchid\Screens\History;

use App\Models\Article;
use App\Models\History;
use App\Orchid\Layouts\History\HistoryTable;
use Illuminate\Support\Facades\App;
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
        return 'History' . ' ' . App::currentLocale();
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
            Layout::modal('create', [
                Layout::rows([
                    Picture::make('history.img')
                        ->title('Image')
                        ->targetRelativeUrl()
                        ->required()
                        ->help('Upload an image for the history'),
                ]),
                Layout::tabs([
                    'Create UZ' => Layout::rows([
                        Input::make('history.name.uz')
                            ->title('Title (UZ)')
                            ->placeholder('Enter history title (uz)')
                            ->required(),
                        Input::make('history.description.uz')
                            ->title('Description (UZ)')
                            ->placeholder('Enter the description (uz)')
                            ->required(),
                        Input::make('history.position.uz')
                            ->title('Type')
                            ->placeholder('Enter the position')
                            ->required(),
                    ]),
                    'Create RU' => Layout::rows([
                        Input::make('history.name.ru')
                            ->title('Title (RU)')
                            ->placeholder('Enter history title (ru)')
                            ->required(),
                        Input::make('history.description.ru')
                            ->title('Description (RU)')
                            ->placeholder('Enter the description (ru)')
                            ->required(),
                        Input::make('history.position.ru')
                            ->title('Type')
                            ->placeholder('Enter the position')
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
                        ->help('Upload an image for the history'),
                ]),
                Layout::tabs([
                    'Uz' => Layout::rows([
                        Input::make('history.name.uz')
                            ->title('Title (UZ)')
                            ->placeholder('Enter history title (uz)')
                            ->required(),
                        Input::make('history.description.uz')
                            ->title('Description (UZ)')
                            ->placeholder('Enter the description (uz)')
                            ->required(),
                        Input::make('history.position.uz')
                            ->title('Type')
                            ->placeholder('Enter the position')
                            ->required(),
                    ]),
                    'Ru' => Layout::rows([
                        Input::make('history.name.ru')
                            ->title('Title (RU)')
                            ->placeholder('Enter history title (ru)')
                            ->required(),
                        Input::make('history.description.ru')
                            ->title('Description (RU)')
                            ->placeholder('Enter the description (ru)')
                            ->required(),
                        Input::make('history.position.ru')
                            ->title('Type')
                            ->placeholder('Enter the position')
                            ->required(),
                    ]),
                ])
            ])->async('asyncGet')->method('update'),

            HistoryTable::class,
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

        Toast::info('History created successfully!');
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

    public function update(History $history): void
    {
        $data = request()->post('history');
        if (!is_array($data)) {
            parse_str($data, $data);
        }

        $validated = validator($data, [
            'title.uz' => 'required|string|max:255',
            'description.uz' => 'required|string',
            'img' => 'nullable|string',
            'position.uz' => 'required',
        ])->validate();

        $history->img = $validated['img'] ?? null;

        foreach (['uz', 'ru'] as $locale) {
            $history->translateOrNew($locale)->name = $data['title'][$locale] ?? null;
            $history->translateOrNew($locale)->description = $data['description'][$locale] ?? null;
            $history->translateOrNew($locale)->position = $data['position'][$locale] ?? null;
        }

        $history->save();

        Toast::info('History updated successfully!');
    }

    public function delete(History $history): void
    {
        $history->delete();
        Toast::info('History deleted successfully!');
    }


}
