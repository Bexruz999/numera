<?php

namespace App\Orchid\Screens\Frames;

use Illuminate\Http\Request;
use App\Models\Frame;
use App\Orchid\Layouts\Frames\FrameTable;
use Illuminate\Support\Facades\App;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class FramesScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return ['frames' => Frame::paginate(10)];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public $description = 'Manage your frames';
    public function name(): ?string
    {
        return 'Frames' . ' ' . App::currentLocale();
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('Create Frame')
                ->icon('plus')
                ->modal('createFrame')
                ->method('createFrame')
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
            FrameTable::class,
            Layout::modal('createFrame', [
                Layout::rows([
                    Picture::make('frame.img')
                ]),
                Layout::tabs([
                    'Uz' => Layout::rows([
                        Input::make('frame.name.uz')
                            ->title('Name (UZ)')
                            ->required(),
                        Input::make('frame.title.uz')
                            ->title('Title (UZ)'),
                        Input::make('frame.text.uz')
                            ->title('Text (UZ)')
                            ->required()
                    ]),
                    'Ru' => Layout::rows([
                        Input::make('frame.name.ru')
                            ->title('Name (RU)')
                            ->required(),
                        Input::make('frame.title.ru')
                            ->title('Title (RU)'),
                        Input::make('frame.text.ru')
                            ->title('Text (RU)')
                            ->required()
                    ])
                ]),
            ])->method('createFrame'),
            // --- Edit Modal ---
            Layout::modal('editFrame', [
                Layout::rows([
                    Picture::make('frame.img')
                ]),
                Layout::tabs([
                    'Uz' => Layout::rows([
                        Input::make('frame.name.uz')
                            ->title('Name (UZ)')
                            ->required(),
                        Input::make('frame.title.uz')
                            ->title('Title (UZ)'),
                        Input::make('frame.text.uz')
                            ->title('Text (UZ)')
                            ->required()
                    ]),
                    'Ru' => Layout::rows([
                        Input::make('frame.name.ru')
                            ->title('Name (RU)')
                            ->required(),
                        Input::make('frame.title.ru')
                            ->title('Title (RU)'),
                        Input::make('frame.text.ru')
                            ->title('Text (RU)')
                            ->required()
                    ])
                ])
            ])->async('asyncGetFrame')->method('updateFrame'), // <-- set method for update
        ];
    }

    public function createFrame(Request $request)
    {
        $data = $request->input('frame', []);

        $frame = new Frame();
        $frame->img = $data['img'] ?? null;

        foreach (['uz', 'ru'] as $locale) {
            $frame->translateOrNew($locale)->name = $data['name'][$locale] ?? '';
            $frame->translateOrNew($locale)->title = $data['title'][$locale] ?? '';
            $frame->translateOrNew($locale)->text = $data['text'][$locale] ?? '';
        }

        $frame->save();

        Toast::info('Frame created successfully!');
    }

    public function updateFrame(Request $request, Frame $frame)
    {
        $data = $request->input('frame', []);

        $frame->img = $data['img'] ?? $frame->img;

        foreach (['uz', 'ru'] as $locale) {
            $frame->translateOrNew($locale)->name = $data['name'][$locale] ?? '';
            $frame->translateOrNew($locale)->title = $data['title'][$locale] ?? '';
            $frame->translateOrNew($locale)->text = $data['text'][$locale] ?? '';
        }

        $frame->save();

        Toast::info('Frame updated successfully!');
    }

    public function asyncGetFrame(Frame $frame): array
    {
        $data = [
            'img' => $frame->img,
            'name' => [
                'uz' => $frame->translate('uz')->name ?? '',
                'ru' => $frame->translate('ru')->name ?? '',
            ],
            'title' => [
                'uz' => $frame->translate('uz')->title ?? '',
                'ru' => $frame->translate('ru')->title ?? '',
            ],
            'text' => [
                'uz' => $frame->translate('uz')->text ?? '',
                'ru' => $frame->translate('ru')->text ?? '',
            ],
        ];
        return ['frame' => $data];
    }

    public function delete(Frame $frame): void
    {
        $frame->delete();
        Toast::info('Review deleted successfully!');
    }
}
