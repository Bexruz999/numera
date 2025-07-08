<?php

namespace App\Orchid\Layouts\Articles;

use App\Models\Article;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class ArticleTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'articles';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        $locale = app()->getLocale();

        return [
            TD::make('title', 'Title')->sort()->render(function (Article $article) use ($locale) {
                return optional($article->translate($locale))->title;
            }),
            TD::make('type', 'Type')->render(function (Article $article) use ($locale) {
                return optional($article->translate($locale))->type;
            }),
            TD::make('img', 'Image')->render(function (Article $article) {
                return $article->img ? "<img src='{$article->img}' style='max-width:100px;'>" : '';
            }),
            TD::make('action')->render(function (Article $article) {
                return
                    '<div class="d-flex gap-2">'
                    . ModalToggle::make()
                        ->icon('bs.pencil-square')
                        ->modal('editArticle')
                        ->method('updateArticle')
                        ->modalTitle('Edit Article')
                        ->asyncParameters([
                            'article' => $article->id,
                        ])->render()
                    . Button::make()
                        ->icon('bs.trash')
                        ->confirm('Are you sure you want to delete this review?')
                        ->method('delete', ['article' => $article->id])
                        ->render()
                    . '</div>';
            }),
        ];
    }
}
