<?php

namespace App\Orchid\Screens\Articles;

use App\Models\Article;
use App\Orchid\Layouts\Articles\ArticleTable;
use Illuminate\Support\Facades\App;
use Orchid\Screen\Action;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class ArticlesScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'articles' => Article::paginate(10)
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {

        return 'Articles' . ' ' . App::currentLocale();
    }

    /**
     * The screen's action buttons.
     *
     * @return Action[]
     */
    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('Create Article')
                ->modal('createArticle')
                ->icon('bs.plus')
                ->method('createArticle')
            ,
            // Add more actions as needed
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
            Layout::modal('createArticle', [
                Layout::rows([
                    Picture::make('article.img')
                        ->title('Image')
                        ->targetRelativeUrl()
                        ->required()
                        ->help('Upload an image for the article'),
                ]),
                Layout::tabs([
                    'Create UZ' => Layout::rows([
                        Input::make('article.title.uz')
                            ->title('Title (UZ)')
                            ->placeholder('Enter article title (uz)')
                            ->required(),
                        Input::make('article.description.uz')
                            ->title('Description (UZ)')
                            ->placeholder('Enter article description (uz)')
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

            Layout::modal('editArticle', [
                Layout::rows([
                    Picture::make('article.img')
                        ->title('Image')
                        ->targetRelativeUrl()
                        ->required()
                        ->help('Upload an image for the article'),
                ]),
                Layout::tabs([
                    'Uz' => Layout::rows([
                        Input::make('article.title.uz')
                            ->title('Title (UZ)')
                            ->placeholder('Enter article title (uz)')
                            ->required(),
                        Input::make('article.description.uz')
                            ->title('Description (UZ)')
                            ->placeholder('Enter article description (uz)')
                            ->required(),
                        Input::make('article.type.uz')
                            ->title('Type')
                            ->placeholder('Select the type of the article')
                            ->required(),
                    ]),
                    'Ru' => Layout::rows([
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
            ])
                ->async('asyncGetArticle'), // <-- Make edit modal async to populate fields

            ArticleTable::class,
        ];
    }

    public function createArticle(): void
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

    public function asyncGetArticle(Article $article): array
    {
        // Prepare the article data in the structure expected by the form
        $data = [
            'img' => $article->img,
            'title' => [
                'uz' => $article->translate('uz')->title ?? '',
                'ru' => $article->translate('ru')->title ?? '',
            ],
            'description' => [
                'uz' => $article->translate('uz')->description ?? '',
                'ru' => $article->translate('ru')->description ?? '',
            ],
            'type' => [
                'uz' => $article->translate('uz')->type ?? '',
                'ru' => $article->translate('ru')->type ?? '',
            ],
        ];

        return [
            'article' => $data
        ];
    }

    public function updateArticle(Article $article): void
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

    public function deleteArticle(Article $article): void
    {
        $article->delete();
        Toast::info('Article deleted successfully!');
    }
}
