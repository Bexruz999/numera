<?php

namespace App\Orchid\Layouts\Products;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use App\Models\Product;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\ModalToggle;
use Illuminate\Support\Facades\Lang;
use Orchid\Support\Facades\Toast;

/**
 * Class ProductsTable
 *
 * @package App\Orchid\Layouts\Products
 */

class ProductsTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'products';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        $locale = app()->getLocale();

        return [
            TD::make('name', Lang::get('Name'))->style('border-bottom: 1px solid #dee2e6;')->render(function (Product $product) use ($locale) {
                return optional($product->translate($locale))->name;
            }),
            TD::make('category_id', Lang::get('Category'))->style('border-bottom: 1px solid #dee2e6;')->render(function (Product $product) {
                // Fixed: Properly access the category name
                return optional($product->category)->name ?? '<span class="text-muted">No category</span>';
            }),
            TD::make('is_active', Lang::get('Active'))->style('border-bottom: 1px solid #dee2e6;')->render(function (Product $product) {
                return $product->is_active ? '<span class="text-success">Yes</span>' : '<span class="text-danger">No</span>';
            }),
            TD::make('articular', Lang::get('Articular'))->style('border-bottom: 1px solid #dee2e6;')->render(function (Product $product) {
                return optional($product)->articular;
            }),
            TD::make('img', Lang::get('img'))->style('border-bottom: 1px solid #dee2e6;')->render(function (Product $product) {
                if (!$product->img || empty($product->img)) {
                    return '<span class="text-muted">No images</span>';
                }

                // Split the comma-separated image paths
                $imagePaths = explode(',', $product->img);
                $imagePaths = array_filter($imagePaths); // Remove empty values

                if (empty($imagePaths)) {
                    return '<span class="text-muted">No images</span>';
                }

                $html = '<div class="d-flex flex-wrap gap-1">';

                // Show all images (up to 5)
                foreach ($imagePaths as $imagePath) {
                    $imagePath = trim($imagePath); // Remove any whitespace
                    $html .= "<img src='{$imagePath}' style='width:40px; height:40px; object-fit:cover; border-radius:4px; ' alt='Product image'>";
                }

                $html .= '</div>';
                return $html;
            }),
            TD::make('price', Lang::get('Price'))->style('border-bottom: 1px solid #dee2e6;')->render(function (Product $product) {
                return optional($product)->price;
            }),
            TD::make('stock', Lang::get('Stock'))->style('border-bottom: 1px solid #dee2e6;')->render(function (Product $product)  {
                return optional($product)->stock;
            }),
            TD::make('guarantee', Lang::get('Guarantee'))->style('border-bottom: 1px solid #dee2e6;')->render(function (Product $product){
                return optional($product)->guarantee;
            }),
            TD::make('code', Lang::get('Code'))->style('border-bottom: 1px solid #dee2e6;')->render(function (Product $product) {
                return optional($product)->code;
            }),
            TD::make('delivery', Lang::get('Delivery'))->style('border-bottom: 1px solid #dee2e6;')->render(function (Product $product) {
                return optional($product)->delivery;
            }),
            TD::make('action')->style('border-bottom: 1px solid #dee2e6;')->render(function (Product $product) {
                return
                    '<div class="d-flex gap-2">'
                    . ModalToggle::make()
                        ->icon('bs.pencil-square')
                        ->modal('editProduct')
                        ->method('updateProduct')
                        ->modalTitle(Lang::get('Edit Product'))
                        ->asyncParameters([
                            'product' => $product->id,
                        ])->render()
                    . Button::make()
                        ->icon('bs.trash')
                        ->confirm(Lang::get('Are you sure you want to delete this product?'))
                        ->method('deleteProduct', ['id' => $product->id])
                        ->render()
                    . '</div>';
            }),
        ];
    }

    public function deleteProduct($id): void
    {
        $product = Product::findOrFail($id);
        $product->delete();
        Toast::info('Product deleted successfully.');
    }
}
