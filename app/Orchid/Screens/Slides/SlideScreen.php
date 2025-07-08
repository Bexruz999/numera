<?php

namespace App\Orchid\Screens\Slides;

use App\Models\Slide;
use App\Orchid\Layouts\Slides\SlideTable;
use Illuminate\Support\Facades\App;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Illuminate\Http\Request;
use Orchid\Support\Facades\Toast;

class SlideScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'slides' => Slide::paginate(10)
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Slides' . ' ' . App::currentLocale();
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
             ModalToggle::make('Create Slide')
                 ->modal('create')
                 ->icon('bs.plus')
                 ->method('create')
                 ->modalTitle('Create Slide'),
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
            SlideTable::class,
            Layout::modal('create', [
                Layout::rows([
                    Picture::make('slide.img')
                        ->title('Image')
                        ->targetRelativeUrl()
                        ->required(),
                ]),
            ])->title('Create Slide')->method('create'),

            Layout::modal('edit', [
                Layout::rows([
                    Picture::make('slide.img')
                        ->title('Image')
                        ->targetRelativeUrl()
                        ->required(),
                ]),
            ])
            ->async('async')
            ->title('Edit Slide'),
        ];
    }

    public function create(Request $request)
    {
        $request->validate([
            'slide.img' => 'required|string',
        ]);
        $img = $request->input('slide.img');
        Slide::create(['img' => $img]);
        Toast::info('Slide created successfully.');
    }

    public function async(Slide $slide): array
    {

        return [
            'slide' => $slide,
        ];
    }

    public function update(Slide $slide):void
    {
        $data = request()->post('slide');
        if (!is_array($data)) {
            parse_str($data, $data);
        }

        $validated = validator($data, [
            'img' => 'required|string',
        ])->validate();

        $slide = Slide::findOrFail($validated['id']);
        $slide->img = $validated['img'] ?? null;
        $slide->save();

        Toast::info('Slide updated successfully.');
    }

    public function delete(Slide $slide): void
    {
        $slide->delete();
        Toast::info('Slide deleted successfully!');
    }
}
