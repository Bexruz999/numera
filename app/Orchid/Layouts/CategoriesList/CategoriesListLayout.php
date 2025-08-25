<?php

namespace App\Orchid\Layouts\CategoriesList;

use App\Models\Article;
use App\Models\Category;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Attach;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class CategoriesListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'categories';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        $locale = app()->getLocale();

        return [
            TD::make('id', 'ID')
                ->sort()
                ->filter(TD::FILTER_NUMERIC),

            TD::make('name', 'Name')->render(function (Category $category) use ($locale) {
                return optional($category->translate(app()->getLocale()))->name;
            }),
            TD::make('img', 'Image')
                ->render(fn ($category) => $category->img ? '<img src="' . $category->img . '" alt="Category Image" style="width: 50px; height: 50px;">' : 'No Image'),

            TD::make('parent_id', 'Parent Category')
                ->render(function (Category $category) use ($locale) {
                    if (!$category->parent_id) {
                        return 'None';
                    }

                    // Get parent category with translations
                    $parent = Category::with('translations')->find($category->parent_id);

                    if ($parent) {
                        $parentName = optional($parent->translate($locale))->name;
                        return $parentName ?: 'Parent #' . $category->parent_id;
                    }

                    return 'Parent #' . $category->parent_id;
            }),


            TD::make('action', 'Action')
                ->render(function ($category) {
                    return
                        '<div class="d-flex gap-2">'
                        . ModalToggle::make()
                            ->icon('bs.pencil-square')
                            ->modal('editCategory')
                            ->method('updateCategory')
                            ->modalTitle('Edit Category')
                            ->asyncParameters([
                                'category' => $category->id,
                            ])->render()
                        . Button::make()
                            ->icon('bs.trash')
                            ->confirm('Are you sure you want to delete this review?')
                            ->method('deleteCategory', ['category' => $category->id])
                            ->render()
                        . '</div>';
                }),
        ];
    }
}
