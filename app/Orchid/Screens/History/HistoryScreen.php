<?php

namespace App\Orchid\Screens\History;

use App\Models\Article;
use App\Models\History;
use App\Orchid\Layouts\History\HistoryTable;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Screen;
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
                ->modal('createArticle')
                ->method('createArticle')
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
            Layout::modal('createArticle', [
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
                        Input::make('history.position.uz')
                            ->title('Position (UZ)')
                            ->placeholder('Pozitsiyani kiriting (uz)')
                            ->required(),
                        Input::make('article.type.uz')
                            ->title('Type')
                            ->placeholder('Select the type of the article')
                            ->required(),
                    ]),
                    'Create RU' => Layout::rows([
                        Input::make('article.title.ru')
                            ->title('Title (RU)')
                            ->placeholder('Enter article title (ru)'),
                        Input::make('article.description.ru')
                            ->title('Description (RU)')
                            ->placeholder('Enter article description (ru)'),
                        Input::make('article.type.ru')
                            ->title('Type')
                            ->placeholder('Select the type of the article')
                            ->required(),
                    ]),
                ])
            ]),
        ];
    }

    public function create()
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

        $article = new Article();
        $article->img = $validated['img'] ?? null;

        foreach (['uz', 'ru'] as $locale) {
            $article->translateOrNew($locale)->title = $data['title'][$locale] ?? null;
            $article->translateOrNew($locale)->description = $data['description'][$locale] ?? null;
            $article->translateOrNew($locale)->type = $data['type'][$locale] ?? null;
        }

        $article->save();

        Toast::info('Article created successfully!');
    }
}
