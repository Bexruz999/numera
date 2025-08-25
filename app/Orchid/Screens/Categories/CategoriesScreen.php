<?php

namespace App\Orchid\Screens\Categories;

use App\Models\Category;
use App\Orchid\Layouts\CategoriesList\CategoriesListLayout;
use Orchid\Screen\Action;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class CategoriesScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            // You can fetch categories from the database or any other source here
            // For example:
            'categories' => Category::all(),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Categories';
    }

    /**
     * The screen's action buttons.
     *
     * @return Action[]
     */
    public function commandBar(): iterable
    {
        return [
            // You can add action buttons here, for example:
            ModalToggle::make('Create Category')
                ->modal('createCategory')
                ->icon('bs.plus')
                ->method('storeCategory')
                ->modalTitle('Create Category'),
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            CategoriesListLayout::class,

            Layout::modal('createCategory', [
                Layout::tabs([
                    'Create UZ' => Layout::rows([
                        Input::make('category.name.uz')
                            ->title('Kategoriya')
                            ->placeholder('Kategoriya nomini kiriting')
                            ->required(),
                    ]),
                    'Create RU' => Layout::rows([
                        Input::make('category.name.ru')
                            ->title('Категория')
                            ->placeholder('Введите название категории')
                            ->required(),
                    ]),

                ]),
                Layout::rows([
                    // Define the fields for creating a category
                    Picture::make('category.img')
                        ->targetRelativeUrl(),
                    Input::make('category.parent_id')
                        ->type('number')
                        ->placeholder('Agar mavjud bo\'lsa, Mansub bo\'lgan ID sini kiriting'),
                ]),
            ])->title('Create Category')->applyButton('Save Category')->method('storeCategory'),


            Layout::modal('editCategory', [
                Layout::rows([
                    Select::make('category.parent_id')
                        ->options(Category::all()->pluck('name', 'id'))
                        ->title('Mavjud bo\'lsa, ota kategoriya tanlang'),
                    Picture::make('category.img')->targetRelativeUrl()
                ]),
                Layout::tabs([
                    'Edit UZ' => Layout::rows([
                        Input::make('category.name.uz')
                            ->title('Kategoriya')
                            ->placeholder('Kategoriya nomini kiriting')
                            ->required(),
                    ]),
                    'Edit RU' => Layout::rows([
                        Input::make('category.name.ru')
                            ->title('Категория')
                            ->placeholder('Введите название категории')
                            ->required(),
                    ]),
                ]),
            ])
        ];
    }

    public function storeCategory(): void
    {
        $data = request()->post('category');
        if (!is_array($data)) {
            parse_str($data, $data);
        }

        $validated = validator($data, [
            'name.uz' => 'required|string|max:255',
        ])->validate();

        $category = new Category();
        $category->parent_id = $data['parent_id'] ?? null;
        $category->img = $data['img'] ?? null;

        foreach(['uz', 'ru'] as $locale) {
            $category->translateOrNew($locale)->name = $data['name'][$locale] ?? null;
        }

        $category->save();

        Toast::info('Category created successfully!');
    }

    public function asyncGetArticle(Category $article): array
    {
        $data = [
            'img' => $article->img,
            'name' => [
                'uz' => $article->translate('uz')->title ?? '',
                'ru' => $article->translate('ru')->title ?? '',
            ],
        ];

        return [
            'category' => $data
        ];
    }
    public function updateCategory(Category $category): void
    {
        $data = request()->post('category');
        if (!is_array($data)) {
            parse_str($data, $data);
        }

        $validated = validator($data, [
            'name.uz' => 'required|string|max:255',
        ])->validate();

        foreach (['uz', 'ru'] as $locale) {
            $category->translateOrNew($locale)->name = $data['name'][$locale] ?? null;
        }

        $category->parent_id = $data['parent_id'] ?? null;
        $category->img = $data['img'] ?? null; // Assuming 'img' is a file path or URL
        $category->save();

        Toast::info('Category updated successfully!');
    }
    public function asyncGetCategory(Category $category): array
    {
        return [
            'name' => $category->name,
            'description' => $category->description,
        ];
    }
    public function deleteCategory(Category $category): void
    {
        $category->delete();
        Toast::info('Category deleted successfully!');
    }
}
