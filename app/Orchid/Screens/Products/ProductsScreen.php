<?php

namespace App\Orchid\Screens\Products;

use App\Models\Category;
use Orchid\Screen\Fields\Attach;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Screen;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Support\Facades\Layout;
use App\Orchid\Layouts\Products\ProductsTable;
use Orchid\Screen\Fields\Input;
use Orchid\Support\Facades\Toast;
use App\Models\Product;
use Orchid\Attachment\Models\Attachment;


class ProductsScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'products' => Product::all(),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Products';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('Create Product')
                ->modal('createProduct')
                ->icon('bs.plus')
                ->method('createProduct')
                ->modalTitle('Create Product'),
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
            ProductsTable::class,

            Layout::modal('createProduct', [
                Layout::rows([
                    Select::make('product.category_id')
                        ->options(Category::all()->pluck('name', 'id'))
                        ->title('Category')
                        ->required(),

                    Input::make('product.name')
                        ->title('Product Name')
                        ->required(),

                    Input::make('product.articular')
                        ->title('Articular')
                        ->required(),

                    Input::make('product.price')
                        ->title('Price')
                        ->required(),

                    Input::make('product.stock')
                        ->title('Stock')
                        ->type('number'),

                    Input::make('product.guarantee')
                        ->title('Guarantee')
                        ->required(),

                    Input::make('product.code')
                        ->title('Code')
                        ->required(),

                    Attach::make('product.img')
                        ->multiple()
                        ->title('Product Images')
                        ->maxFiles(5)
                        ->acceptedFiles('image/png,image/jpg,image/jpeg,image/gif'),

                    CheckBox::make('product.is_active')
                        ->value(1)
                        ->title('activity')
                        ->placeholder('is active?'),

                    Quill::make('product.description')
                        ->title('Description')
                        ->placeholder('Enter product description'),

                    Quill::make('product.short_description')
                        ->title('Short Description')
                        ->placeholder('Enter short description'),

                    Input::make('product.delivery')
                        ->title('Delivery')
                        ->placeholder('Enter delivery information'),

                    Attach::make('product.docs')
                        ->title('Product Documents')
                        ->multiple()
                        ->maxFiles(5)
                        ->acceptedFiles('application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document'),

                    Attach::make('product.certificates')
                        ->title('Certificates')
                        ->multiple()
                        ->maxFiles(5)
                        ->acceptedFiles('application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document'),

                    Attach::make('product.drivers')
                        ->title('Drivers')
                        ->multiple()
                        ->maxFiles(5)
                        ->acceptedFiles('application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document'),
                ]),
            ])->title('Create Product')->applyButton('Save Product'),

            Layout::modal('editProduct', [
                Layout::rows([
                    Select::make('product.category_id')
                        ->options(Category::all()->pluck('name', 'id'))
                        ->title('Category')
                        ->required(),

                    Input::make('product.name')
                        ->title('Product Name')
                        ->required(),

                    Input::make('product.articular')
                        ->title('Articular')
                        ->required(),

                    Input::make('product.price')
                        ->title('Price')
                        ->required(),

                    Input::make('product.stock')
                        ->title('Stock')
                        ->type('number'),

                    Input::make('product.guarantee')
                        ->title('Guarantee')
                        ->required(),

                    Input::make('product.code')
                        ->title('Code')
                        ->required(),

                    Attach::make('product.img')
                        ->multiple()
                        ->title('Product Images ')
                        ->maxFiles(5)
                        ->acceptedFiles('image/png,image/jpg,image/jpeg,image/gif'),

                    CheckBox::make('product.is_active')
                        ->value(1)
                        ->title('activity')
                        ->placeholder('is active?'),

                    Quill::make('product.description ')
                        ->title('Description')
                        ->placeholder('Enter product description'),

                    Quill::make('product.short_description')
                        ->title('Short Description ')
                        ->placeholder('Enter short description'),

                    Input::make('product.delivery')
                        ->title('Delivery')
                        ->placeholder('Enter delivery information'),

                    Attach::make('product.docs')
                        ->title('Product Documents ')
                        ->multiple()
                        ->maxFiles(5)
                        ->acceptedFiles('application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document'),

                    Attach::make('product.certificates')
                        ->title('Certificates ')
                        ->multiple()
                        ->maxFiles(5)
                        ->acceptedFiles('application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document'),

                    Attach::make('product.drivers')
                        ->title('Drivers ')
                        ->multiple()
                        ->maxFiles(5)
                        ->acceptedFiles('application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document'),
                ]),
            ])->title(__('Edit Product'))->applyButton(__('Update Product'))->method("updateProduct"),

        ];
    }

    public function createProduct(): void
    {
        $data = request()->post('product');

        $validated = validator($data, [
            'name' => 'required|string|max:255',
            'articular' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'nullable|integer|min:0',
            'guarantee' => 'required|string|max:255',
            'code' => 'required|string|max:255',
            'img' => 'nullable|array',
            'delivery' => 'nullable|string|max:255',
            'is_active' => 'boolean',
            'docs' => 'nullable|array',
            'certificates' => 'nullable|array',
            'drivers' => 'nullable|array',
            'category_id' => 'nullable|integer|exists:categories,id',
            'description' => 'nullable|string',
            'short_description' => 'nullable|string',

        ])->validate();


        $product = new Product();
        $product->name = $data['name'];
        $product->articular = $data['articular'];
        $product->price = $data['price'];
        $product->stock = $data['stock'] ?? 0;
        $product->guarantee = $data['guarantee'];
        $product->code = $data['code'];
        $product->delivery = $data['delivery'] ?? null;
        $product->is_active = $data['is_active'] ?? false;
        $product->category_id = $data['category_id'] ?? null;
        $product->description = $data['description'] ?? null;
        $product->short_description = $data['short_description'] ?? null;

        // Convert attachment IDs to URLs
        $convertAttachments = function($attachmentIds) {
            if (!isset($attachmentIds) || !is_array($attachmentIds)) {
                return '';
            }

            $paths = Attachment::whereIn('id', $attachmentIds)
                ->get(['path', 'name', 'extension'])
                ->map(fn($attachment) => "/storage/{$attachment->path}{$attachment->name}.{$attachment->extension}")
                ->toArray();

            return implode(',', $paths);
        };

        $product->drivers = $convertAttachments($validated['drivers'] ?? null);
        $product->certificates = $convertAttachments($validated['docs'] ?? null);
        $product->docs = $convertAttachments($validated['docs'] ?? null);
        $product->img = $convertAttachments($validated['img'] ?? null);



        // Handle translations
        foreach (['uz', 'ru'] as $locale) {
            $product->translateOrNew($locale)->name = $data['name'] ?? null;
            $product->translateOrNew($locale)->description = $data['description'] ?? null;
            $product->translateOrNew($locale)->short_description = $data['short_description'] ?? null;
        }

        $product->save();

        Toast::info('Product created successfully.');
    }

    public function updateProduct(Product $product): void
    {
        $data = request()->post('product');
        if (!is_array($data)) {
            parse_str($data, $data);
        }

        $validated = validator($data, [
            'name' => 'required|string|max:255',
            'articular' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'nullable|integer|min:0',
            'guarantee' => 'required|string|max:255',
            'code' => 'required|string|max:255',
            'img' => 'nullable|array',
            'delivery' => 'nullable|string|max:255',
            'is_active' => 'boolean',
            'docs' => 'nullable|array',
            'certificates' => 'nullable|array',
            'drivers' => 'nullable|array',
            'category_id' => 'nullable|integer|exists:categories,id',
            'description' => 'nullable|string',
            'short_description' => 'nullable|string',

        ])->validate();

        $product->name = $data['name'];
        $product->articular = $data['articular'];
        $product->price = $data['price'];
        $product->stock = $data['stock'] ?? 0;
        $product->guarantee = $data['guarantee'];
        $product->code = $data['code'];
        $product->delivery = $data['delivery'] ?? null;
        $product->is_active = $data['is_active'] ?? false;
        $product->category_id = $data['category_id'] ?? null;
        $product->description = $data['description'] ?? null;
        $product->short_description = $data['short_description'] ?? null;

        // Convert attachment IDs to URLs
        $convertAttachments = function($attachmentIds) {
            if (!isset($attachmentIds) || !is_array($attachmentIds)) {
                return '';
            }

            $paths = Attachment::whereIn('id', $attachmentIds)
                ->get(['path', 'name', 'extension'])
                ->map(fn($attachment) => "/storage/{$attachment->path}{$attachment->name}.{$attachment->extension}")
                ->toArray();

            return implode(',', $paths);
        };

        $product->drivers = $convertAttachments($validated['drivers'] ?? null);
        $product->certificates = $convertAttachments($validated['docs'] ?? null);
        $product->docs = $convertAttachments($validated['docs'] ?? null);
        $product->img = $convertAttachments($validated['img'] ?? null);



        // Handle translations
        foreach (['uz', 'ru'] as $locale) {
            $product->translateOrNew($locale)->name = $data['name'] ?? null;
            $product->translateOrNew($locale)->description = $data['description'] ?? null;
            $product->translateOrNew($locale)->short_description = $data['short_description'] ?? null;
        }

        $product->save();

        Toast::info('Product created successfully.');
    }

    public function deleteProduct($id): void
    {
        $product = Product::findOrFail($id);
        $product->delete();
        Toast::info('Product deleted successfully.');
    }
}
