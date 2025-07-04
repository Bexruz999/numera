<?php

namespace App\Orchid\Screens\Reviews;

use App\Models\Review;
use App\Orchid\Layouts\Reviews\ReviewTable;
use Illuminate\Support\Facades\App;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Label;
use Orchid\Screen\Fields\Matrix;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class ReviewScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return ['reviews' => Review::paginate(10)];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public $description = 'Manage reviews for your products.';

    public function name(): ?string
    {
        return 'Review' . ' ' . App::currentLocale();
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
                ->method('create')
                ->icon('plus')
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
            ReviewTable::class,
            Layout::modal('create', [
                Layout::rows([
                    Picture::make('review.img')
                        ->title('Image')
                        ->targetRelativeUrl()
                        ->required()
                        ->help('Upload an image for the review'),
                ]),
                Layout::tabs([
                    'Create UZ' => Layout::rows([
                        Input::make('review.title.uz')
                            ->title('Title (UZ)')
                            ->placeholder('Enter review title (uz)')
                            ->required(),
                        Input::make('review.description.uz')
                            ->title('Description (UZ)')
                            ->placeholder('Enter review description (uz)')
                            ->required(),
                        Matrix::make('review.matrix.uz')
                            ->help('Matrix for UZ')
                            ->columns([
                                'Icon',
                                'Key (UZ)',
                                'Value (UZ)',
                            ]),
                    ]),
                    'Create RU' => Layout::rows([
                        Input::make('review.title.ru')
                            ->title('Title (RU)')
                            ->placeholder('Enter review title (ru)'),
                        Input::make('review.description.ru')
                            ->title('Description (RU)')
                            ->placeholder('Enter review description (ru)'),
                        Matrix::make('review.matrix.ru')
                            ->help('Matrix for RU')
                            ->columns([
                                'Icon',
                                'Key (RU)',
                                'Value  (RU)',
                            ])
                    ])
                ]),
            ])->title('Create Review')->method('create'),

            Layout::modal('edit', [
                Layout::rows([
                    Picture::make('review.img')
                        ->title('Image')
                        ->targetRelativeUrl()
                        ->required()
                        ->help('Upload an image for the review'),
                ]),
                Layout::tabs([
                    'Create UZ' => Layout::rows([
                        Input::make('review.title.uz')
                            ->title('Title (UZ)')
                            ->placeholder('Enter review title (uz)')
                            ->required(),
                        Input::make('review.description.uz')
                            ->title('Description (UZ)')
                            ->placeholder('Enter review description (uz)')
                            ->required(),
                        Matrix::make('review.matrix.uz')
                            ->help('Matrix for UZ')
                            ->columns([
                                'Icon ',
                                'Key (UZ)',
                                'Value (UZ)',
                            ]),
                    ]),
                    'Create RU' => Layout::rows([
                        Input::make('review.title.ru')
                            ->title('Title (RU)')
                            ->placeholder('Enter review title (ru)'),
                        Input::make('review.description.ru')
                            ->title('Description (RU)')
                            ->placeholder('Enter review description (ru)'),
                        Matrix::make('review.matrix.ru')
                            ->help('Matrix for RU')
                            ->columns([
                                'Icon',
                                'Key (RU)',
                                'Value  (RU)',
                            ])
                    ])
                ]),
            ])->title('Edit Review')
                ->async('asyncGetReview')
                ->method('update'),
        ];
    }

    public function create(): void
    {
        $data = request()->post('review');
        if (!is_array($data)) {
            parse_str($data, $data);
        }

        $validated = validator($data, [
            'title.uz' => 'required|string|max:255',
            'description.uz' => 'required|string',
            'img' => 'nullable|string',
            'matrix.uz' => 'nullable|array',
        ])->validate();

        $review = new Review();
        $review->img = $validated['img'] ?? null;

        foreach (['uz', 'ru'] as $locale) {
            $review->translateOrNew($locale)->title = $data['title'][$locale] ?? null;
            $review->translateOrNew($locale)->description = $data['description'][$locale] ?? null;
            $review->translateOrNew($locale)->matrix = $data['matrix'][$locale] ? json_encode($data['matrix'][$locale]) : null;
        }

        $review->save();

        Toast::info('Review created successfully!');
    }

    public function asyncGetReview(Review $review): array
    {
        $data = [
            'img' => $review->img,
            'title' => [
                'uz' => $review->translate('uz')->title ?? '',
                'ru' => $review->translate('ru')->title ?? '',
            ],
            'description' => [
                'uz' => $review->translate('uz')->description ?? '',
                'ru' => $review->translate('ru')->description ?? '',
            ],
            'matrix' => [
                'uz' => $review->translate('uz')->matrix ?? '',
                'ru' => $review->translate('ru')->matrix ?? '',
            ],
        ];

        return [
            'review' => $data
        ];
    }

    public function update(Review $review): void
    {
        $data = request()->get('review');
        if (!is_array($data)) {
            parse_str($data, $data);
        }

        $validated = validator($data, [
            'title.uz' => 'required|string|max:255',
            'description.uz' => 'required|string',
            'img' => 'nullable|string',
            'matrix.uz' => 'nullable|array',
        ])->validate();

        $review->img = $validated['img'] ?? null;

        foreach (['uz', 'ru'] as $locale) {
            $review->translateOrNew($locale)->title = $data['title'][$locale] ?? null;
            $review->translateOrNew($locale)->description = $data['description'][$locale] ?? null;
            $review->translateOrNew($locale)->matrix = $data['matrix'][$locale] ? json_encode($data['matrix'][$locale]) : null;
        }

        $review->save();

        Toast::info('Review updated successfully!');
    }

    public function delete(Review $review): void
    {
        $review->delete();
        Toast::info('Review deleted successfully!');
    }
}
