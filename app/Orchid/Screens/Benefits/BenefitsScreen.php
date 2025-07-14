<?php

namespace App\Orchid\Screens\Benefits;

use App\Models\Benefit;
use App\Orchid\Layouts\Benefits\BenefitTable;
use Illuminate\Support\Facades\App;
use Orchid\Screen\Action;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class BenefitsScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'benefits' => Benefit::paginate(10)
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {

        return 'Benefits' . ' ' . App::currentLocale();
    }

    /**
     * The screen's action buttons.
     *
     * @return Action[]
     */
    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('Create Benefit')
                ->modal('createBenefit')
                ->icon('bs.plus')
                ->method('createBenefit')
                ->modalTitle('Create Benefit'),
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
            BenefitTable::class,

            Layout::modal('createBenefit', [
                Layout::rows([
                    Picture::make('benefit.img')
                        ->title('Image')
                        ->targetRelativeUrl()
                        ->required()
                        ->help('Upload an image for the benefit'),
                ]),
                Layout::tabs([
                    'Create UZ' => Layout::rows([
                        Input::make('benefit.title.uz')
                            ->title('Title (UZ)')
                            ->placeholder('Enter benefit title (uz)')
                            ->required(),
                        Input::make('benefit.text.uz')
                            ->title('Description (UZ)')
                            ->placeholder('Enter benefit description (uz)')
                            ->required(),
                    ]),
                    'Create RU' => Layout::rows([
                        Input::make('benefit.title.ru')
                            ->title('Title (RU)')
                            ->placeholder('Enter benefit title (ru)'),
                        Input::make('benefit.text.ru')
                            ->title('Description (RU)')
                            ->placeholder('Enter benefit description (ru)'),
                    ]),
                ])
            ]),

            Layout::modal('editBenefit', [
                Layout::rows([
                    Picture::make('benefit.img')
                        ->title('Image')
                        ->targetRelativeUrl()
                        ->required()
                        ->help('Upload an image for the benefit'),
                ]),
                Layout::tabs([
                    'Uz' => Layout::rows([
                        Input::make('benefit.title.uz')
                            ->title('Title (UZ)')
                            ->placeholder('Enter benefit title (uz)')
                            ->required(),
                        Input::make('benefit.text.uz')
                            ->title('Text (UZ)')
                            ->placeholder('Enter benefit description (uz)')
                            ->required(),
                    ]),
                    'Ru' => Layout::rows([
                        Input::make('benefit.title.ru')
                            ->title('Title (RU)')
                            ->placeholder('Enter benefit title (ru)'),
                        Input::make('benefit.text.ru')
                            ->title('Text (RU)')
                            ->placeholder('Enter benefit description (ru)'),
                    ]),
                ])
            ])
                ->async('asyncGetbenefit'), // <-- Make edit modal async to populate fields
        ];
    }

    public function createBenefit(): void
    {
        $data = request()->post('benefit');
        if (!is_array($data)) {
            parse_str($data, $data);
        }

        $validated = validator($data, [
            'title.uz' => 'required|string|max:255',
            'text.uz' => 'required|string',
            'img' => 'nullable|string',

        ])->validate();

        $benefit = new benefit();
        $benefit->img = $validated['img'] ?? null;

        foreach (['uz', 'ru'] as $locale) {
            $benefit->translateOrNew($locale)->title = $data['title'][$locale] ?? null;
            $benefit->translateOrNew($locale)->text = $data['text'][$locale] ?? null;
        }

        $benefit->save();

        Toast::info('benefit created successfully!');
    }

    public function asyncGetbenefit(benefit $benefit): array
    {
        $data = [
            'img' => $benefit->img,
            'title' => [
                'uz' => $benefit->translate('uz')->title ?? '',
                'ru' => $benefit->translate('ru')->title ?? '',
            ],
            'text' => [
                'uz' => $benefit->translate('uz')->text ?? '',
                'ru' => $benefit->translate('ru')->text ?? '',
            ],
        ];

        return [
            'benefit' => $data
        ];
    }

    public function updateBenefit(benefit $benefit): void
    {
        $data = request()->post('benefit');
        if (!is_array($data)) {
            parse_str($data, $data);
        }

        $validated = validator($data, [
            'title.uz' => 'required|string|max:255',
            'text.uz' => 'required|string',
            'img' => 'nullable|string',
        ])->validate();

        $benefit->img = $validated['img'] ?? null;

        foreach (['uz', 'ru'] as $locale) {
            $benefit->translateOrNew($locale)->title = $data['title'][$locale] ?? null;
            $benefit->translateOrNew($locale)->text = $data['text'][$locale] ?? null;
        }

        $benefit->save();

        Toast::info('benefit updated successfully!');
    }

    public function delete(benefit $benefit): void
    {
        $benefit->delete();
        Toast::info('benefit deleted successfully!');
    }
}
