<?php

namespace App\Orchid\Screens\Advises;

use App\Models\Advise;
use App\Orchid\Layouts\Advises\AdviseTable;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class AdviseScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'advises' => Advise::paginate(10)
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Advise' . ' ' . app()->getLocale();
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('Create Advise')
                ->icon('bs.plus')
                ->modal('create')
                ->method('create')
                ->modalTitle('Create Advise'),
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
            AdviseTable::class,
            Layout::modal('create', [
                Layout::rows([
                    Picture::make('advise.img')
                        ->required()
                        ->title('Image')
                        ->targetRelativeUrl(),

                ]),
                Layout::tabs([
                    'Create UZ' => Layout::rows([
                        Input::make('advise.title.uz')
                            ->required()
                            ->title('Title (UZ)'),
                        Input::make('advise.subtitle.uz')
                            ->required()
                            ->title('Subtitle (UZ)'),
                        Input::make('advise.description.uz')
                            ->required()
                            ->title('Description (UZ)'),
                    ]),
                    'Create RU' => Layout::rows([
                        Input::make('advise.title.ru')
                            ->required()
                            ->title('Title (RU)'),
                        Input::make('advise.subtitle.ru')
                            ->required()
                            ->title('Subtitle (RU)'),
                        Input::make('advise.description.ru')
                            ->required()
                            ->title('Description (RU)'),
                    ]),
                ])
            ])->method('create')->async('async'),

            Layout::modal('edit', [
                Layout::rows([
                    Picture::make('advise.img')
                        ->required()
                        ->title('Image')
                        ->targetRelativeUrl(),
                ]),
                Layout::tabs([
                    'Edit UZ' => Layout::rows([
                        Input::make('advise.title.uz')
                            ->required()
                            ->title('Title (UZ)'),
                        Input::make('advise.subtitle.uz')
                            ->required()
                            ->title('Subtitle (UZ)'),
                        Input::make('advise.description.uz')
                            ->required()
                            ->title('Description (UZ)'),
                    ]),
                    'Edit RU' => Layout::rows([
                        Input::make('advise.title.ru')
                            ->required()
                            ->title('Title (RU)'),
                        Input::make('advise.subtitle.ru')
                            ->required()
                            ->title('Subtitle (RU)'),
                        Input::make('advise.description.ru')
                            ->required()
                            ->title('Description (RU)'),
                    ]),
                ])
            ])->async('async')->method('update'),
        ];
    }


    /**
     * Create a new advise.
     */
    public function create(): void
    {
        $data = request()->post('advise');
        if (!is_array($data)) {
            parse_str($data, $data);
        }

        $validated = validator($data, [
            'img' => 'required|string',
            'title.uz' => 'required|string|max:255',
            'description.uz' => 'required|string',
            'subtitle.uz' => 'required',
        ])->validate();

        $advise = new Advise();
        $advise->img = $validated['img'];

        foreach (['uz', 'ru'] as $locale) {
            $advise->translateOrNew($locale)->title = $data['title'][$locale] ?? '';
            $advise->translateOrNew($locale)->subtitle = $data['subtitle'][$locale] ?? '';
            $advise->translateOrNew($locale)->description = $data['description'][$locale] ?? '';
        }
        $advise->save();

        Toast::info('Advise created successfully.');
    }

    /**
     * Edit modal uchun ma'lumotlarni yuboradi.
     */
    public function async(Advise $advise): array
    {
        $data = [
            'img' => $advise->img,
            'title' => [
                'uz' => $advise->translate('uz')->title ?? '',
                'ru' => $advise->translate('ru')->title ?? '',
            ],
            'description' => [
                'uz' => $advise->translate('uz')->description ?? '',
                'ru' => $advise->translate('ru')->description ?? '',
            ],
            'subtitle' => [
                'uz' => $advise->translate('uz')->subtitle ?? '',
                'ru' => $advise->translate('ru')->subtitle ?? '',
            ],
        ];

        return [
            'advise' => $data
        ];
    }

    /**
     * Advise va tarjimalarini yangilash.
     */
    public function update(Advise $advise): void
    {
        $data = request()->post('advise');
        if (!is_array($data)) {
            parse_str($data, $data);
        }

        $validated = validator($data, [
            'title.uz' => 'required|string|max:255',
            'description.uz' => 'required|string',
            'img' => 'nullable|string',
            'subtitle.uz' => 'required',
        ])->validate();

        $advise->img = $validated['img'] ?? null;

        foreach (['uz', 'ru'] as $locale) {
            $advise->translateOrNew($locale)->title = $data['title'][$locale] ?? '';
            $advise->translateOrNew($locale)->subtitle = $data['subtitle'][$locale] ?? '';
            $advise->translateOrNew($locale)->description = $data['description'][$locale] ?? '';
        }
        $advise->save();

        Toast::info('Advise updated successfully.');
    }

    /**
     * Advise va tarjimalarini o'chirish.
     */
    public function delete(Request $request)
    {
        $id = $request->input('advise');
        $advise = Advise::findOrFail($id);
        $advise->delete();

        Toast::info('Advise deleted successfully.');
    }
}
