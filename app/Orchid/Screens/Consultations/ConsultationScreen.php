<?php

namespace App\Orchid\Screens\Consultations;

use App\Models\Consultation;
use App\Orchid\Layouts\Consultations\ConsultationTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Matrix;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class ConsultationScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return ['consultations' => Consultation::paginate(10)];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Consultation' . ' ' . App::currentLocale();
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('Create')
                ->modal('create')
                ->icon('bs.plus')
                ->method('create')
                ->modalTitle('Create Consultation'),
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
            ConsultationTable::class,

            Layout::modal('create', [
                Layout::rows([
                    Picture::make('consultation.img')
                        ->title('Image')
                        ->targetRelativeUrl()
                        ->required(),
                ]),
                Layout::tabs([
                    'Create UZ' => Layout::rows([
                        Input::make('consultation.title.uz')
                            ->title('Title (UZ)')
                            ->required(),
                        TextArea::make('consultation.description.uz')
                            ->title('Description (UZ)'),
                        Input::make('consultation.subtitle.uz')
                            ->title('Subtitle (UZ)'),
                        Matrix::make('consultation.button.uz')
                            ->help('Matrix for UZ')
                            ->columns([
                                'Color',
                                'Link',
                                'Name',
                            ]),
                        Input::make('consultation.link.uz')
                            ->title('Link (UZ)'),
                    ]),
                    'Create RU' => Layout::rows([
                        Input::make('consultation.title.ru')
                            ->title('Title (RU)'),
                        TextArea::make('consultation.description.ru')
                            ->title('Description (RU)'),
                        Input::make('consultation.subtitle.ru')
                            ->title('Subtitle (RU)'),
                        Matrix::make('consultation.button.ru')
                            ->help('Matrix for RU')
                            ->columns([
                                'Color',
                                'Link',
                                'Name',
                            ]),
                        Input::make('consultation.link.ru')
                            ->title('Link (RU)'),
                    ]),
                ]),
            ]),

            Layout::modal('edit', [
                Layout::rows([
                    Picture::make('consultation.img')
                        ->targetRelativeUrl()
                        ->title('Image')
                        ->required(),
                ]),
                Layout::tabs([
                    'Edit UZ' => Layout::rows([
                        Input::make('consultation.title.uz')
                            ->title('Title (UZ)')
                            ->required(),
                        TextArea::make('consultation.description.uz')
                            ->title('Description (UZ)'),
                        Input::make('consultation.subtitle.uz')
                            ->title('Subtitle (UZ)'),
                        Matrix::make('consultation.button.uz')
                            ->help('Matrix for UZ')
                            ->columns([
                                'Color',
                                'Link',
                                'Name',
                            ]),
                        Input::make('consultation.link.uz')
                            ->title('Link (UZ)'),
                    ]),
                    'Edit RU' => Layout::rows([
                        Input::make('consultation.title.ru')
                            ->title('Title (RU)')
                            ->required(),
                        TextArea::make('consultation.description.ru')
                            ->title('Description (RU)'),
                        Input::make('consultation.subtitle.ru')
                            ->title('Subtitle (RU)'),
                        Matrix::make('consultation.button.ru')
                            ->help('Matrix for RU')
                            ->columns([
                                'Color',
                                'Link',
                                'Name',
                            ]),
                        Input::make('consultation.link.ru')
                            ->title('Link (RU)'),
                    ]),
                ]),
            ])
                ->title('Edit Consultation')
                ->method('update')
                ->async('async'),
        ];
    }

    public function async(Consultation $consultation): array
    {
        $data = [
            'img' => $consultation->img,
            'title' => [
                'uz' => $consultation->translate('uz')->title ?? '',
                'ru' => $consultation->translate('ru')->title ?? '',
            ],
            'description' => [
                'uz' => $consultation->translate('uz')->description ?? '',
                'ru' => $consultation->translate('ru')->description ?? '',
            ],
            'subtitle' => [
                'uz' => $consultation->translate('uz')->subtitle ?? '',
                'ru' => $consultation->translate('ru')->subtitle ?? '',
            ],
            'button' => [
                'uz' => $this->decodeButton($consultation->translate('uz')->button ?? ''),
                'ru' => $this->decodeButton($consultation->translate('ru')->button ?? ''),
            ],
            'link' => [
                'uz' => $consultation->translate('uz')->link ?? '',
                'ru' => $consultation->translate('ru')->link ?? '',
            ],
        ];

        return [
            'consultation' => $data
        ];
    }

    private function decodeButton($button)
    {
        if (empty($button)) return [];
        if (is_array($button)) return $button;
        $decoded = json_decode($button, true);
        return (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) ? $decoded : [];
    }

    public function create(Request $request): void
    {
        $data = $request->get('consultation');

        if (!is_array($data)) {
            parse_str($data, $data);
        }

        $validated = validator($data, [
            'title.uz' => 'required|string',
            'description.uz' => 'nullable|string',
            'img' => 'required|string',
            'subtitle.uz' => 'string|nullable',
            'link.uz' => 'string|nullable',
            'button.uz' => 'nullable|array',
        ])->validate();

        $consultation = new Consultation();
        $consultation->img = $validated['img'] ?? null;

        foreach (['uz', 'ru'] as $locale) {
            $consultation->translateOrNew($locale)->title = $data["title"][$locale] ?? '';
            $consultation->translateOrNew($locale)->description = $data["description"][$locale] ?? '';
            $consultation->translateOrNew($locale)->subtitle = $data["subtitle"][$locale] ?? '';
            $buttonValue = $data["button"][$locale] ?? [];
            $consultation->translateOrNew($locale)->button = json_encode($buttonValue ?: []);
            $consultation->translateOrNew($locale)->link = $data["link"][$locale] ?? '';
        }

        $consultation->save();
        Toast::info('Consultation created successfully!');
    }

    public function update(Consultation $consultation): void
    {
        $data = request()->post('consultation');
        if (!is_array($data)) {
            parse_str($data, $data);
        }

        $validated = validator($data, [
            'title.uz' => 'required|string',
            'description.uz' => 'nullable|string',
            'img' => 'required|string',
            'link.uz' => 'string|nullable',
            'subtitle.uz' => 'string|nullable',
            'button.uz' => 'nullable|array',
        ])->validate();

        $consultation->img = $validated['img'] ?? null;

        foreach (['uz', 'ru'] as $locale) {
            $consultation->translateOrNew($locale)->title = $data["title"][$locale] ?? '';
            $consultation->translateOrNew($locale)->description = $data["description"][$locale] ?? '';
            $consultation->translateOrNew($locale)->subtitle = $data["subtitle"][$locale] ?? '';
            $buttonValue = $data["button"][$locale] ?? [];
            $consultation->translateOrNew($locale)->button = json_encode($buttonValue ?: []);
            $consultation->translateOrNew($locale)->link = $data["link"][$locale] ?? '';
        }

        $consultation->save();
        Toast::info('Consultation updated successfully!');
    }

    public function delete(Request $request)
    {
        $id = $request->input('consultation');
        $consultation = Consultation::find($id);

        if ($consultation) {
            $consultation->delete();
            Toast::info('Consultation deleted successfully!');
        } else {
            Toast::error('Consultation not found!');
        }
    }
}
