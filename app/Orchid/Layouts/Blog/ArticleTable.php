<?php

namespace App\Orchid\Layouts\Blog;

use App\Models\Article;
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
            TD::make('description', 'Description')->render(function (Article $article) use ($locale) {
                return optional($article->translate($locale))->description;
            }),
            TD::make('type', 'Type')->render(function (Article $article) use ($locale) {
                return optional($article->translate($locale))->type;
            }),
            TD::make('created_at', 'Created At')->sort(),
            TD::make('updated_at', 'Updated At')->sort(),
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
                    . ModalToggle::make()
                        ->icon('bs.trash')
                        ->modal('deleteArticle')
                        ->method('deleteArticle')
                        ->modalTitle('Delete Article')
                        ->asyncParameters([
                            'article' => $article->id,
                        ])->render()
                    . '</div>';
            }),
        ];
    }
}
