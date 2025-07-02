<?php

namespace App\Orchid\Screens\Services;

use App\Models\Frame;
use App\Orchid\Layouts\Services\FrameTable;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;

class FramesScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return ['frame' => Frame::paginate(10)];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Frames';
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
                    Input::make('img',)
                        ->title('Image')
                        ->targetRelativeUrl(),
                ])
            ]),
            Layout::tabs([
                'edit Uz' => Layout::rows([

                ])
            ])

        ];
    }
}
