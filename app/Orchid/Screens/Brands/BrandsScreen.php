<?php

namespace App\Orchid\Screens\Brands;

use App\Models\Brand;
use App\Orchid\Layouts\Brands\BrandsTable;
use Orchid\Support\Facades\Toast;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Screen;

class BrandsScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'brands' => Brand::all(),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Brands';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
             ModalToggle::make('Create Brand')
                 ->modal('createBrand')
                 ->icon('bs.plus')
                 ->method('createBrand')
                 ->modalTitle('Create Brand'),
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
            BrandsTable::class,

            Layout::modal('createBrand', [
                Layout::rows([
                    Picture::make('brand.image')
                        ->title('Logo')
                        ->targetRelativeUrl()
                ])
            ]),

            Layout::modal('editBrand', [
                Layout::rows([
                    Picture::make('brand.image')
                        ->title('Logo')
                        ->targetRelativeUrl()
                ])
            ]),
        ];
    }

    public function createBrand(): void
    {
        $data = request()->post('brand');
        if (!is_array($data)) {
            parse_str($data, $data);
        }

        $brand = new Brand();
        $brand->image = $data['image'] ?? '';
        $brand->save();
        Toast::info('Brand created successfully!');
    }

    public function editBrand(Brand $brand): void
    {
        $data = request()->post('brand');
        if (!is_array($data)) {
            parse_str($data, $data);
        }

        $brand->image = $data['image'] ?? '';
        $brand->save();
        Toast::info('Brand updated successfully!');
    }

    public function deleteBrand($id): void
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();
        Toast::info('Brand deleted successfully!');
    }
}
