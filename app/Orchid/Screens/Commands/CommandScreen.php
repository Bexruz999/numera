<?php

namespace App\Orchid\Screens\Commands;

use App\Models\Command;
use App\Orchid\Layouts\Commands\CommandTable;
use Illuminate\Support\Facades\App;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Matrix;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class CommandScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'commands' => Command::paginate(10),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Commands' . ' ' . App::currentLocale();
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('Create Command')
                ->modal('create')
                ->icon('bs.plus')
                ->method('create')
                ->modalTitle('Create Command'),
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
            CommandTable::class,
            Layout::modal('create', [
                Layout::rows([
                    Picture::make('command.img')
                        ->title('Image'),
                    Matrix::make('command.social')
                        ->title('Social')
                        ->columns([
                            'icon' => 'Icon',
                            'link' => 'Link',
                        ])->nullable(),
                ]),
                Layout::tabs([
                    'Create UZ' =>Layout::rows([
                        Input::make('command.name.uz')
                            ->title('Name (Uz)')
                            ->placeholder('Enter command name'),
                        Input::make('command.position.uz')
                            ->title('Position (Uz)')
                            ->placeholder('Enter command position (uz)'),
                        Input::make('command.description.uz')
                            ->title('Description (Uz)')
                            ->placeholder('Enter command description (uz)'),
                    ]),
                    'Create RU' =>Layout::rows([
                        Input::make('command.name.ru')
                            ->title('Name (Ru)')
                            ->placeholder('Enter command name'),
                        Input::make('command.position.ru')
                            ->title('Position (Ru)')
                            ->placeholder('Enter command position (ru)'),
                        Input::make('command.description.ru')
                            ->title('Description (Ru)')
                            ->placeholder('Enter command description (ru)'),
                    ])
                ])
            ]),
            Layout::modal('edit', [
                Layout::rows([
                    Picture::make('command.img')
                        ->title('Image'),
                    Matrix::make('command.social')
                        ->title('Social')
                        ->columns([
                            'icon' => 'Icon',
                            'link' => 'Link',
                        ])->nullable(),
                ]),
                Layout::tabs([
                    'Edit UZ' =>Layout::rows([
                        Input::make('command.name.uz')
                            ->title('Name (Uz)')
                            ->placeholder('Enter command name'),
                        Input::make('command.position.uz')
                            ->title('Position (Uz)')
                            ->placeholder('Enter command position (uz)'),
                        Input::make('command.description.uz')
                            ->title('Description (Uz)')
                            ->placeholder('Enter command description (uz)'),
                    ]),
                    'Edit RU' =>Layout::rows([
                        Input::make('command.name.ru')
                            ->title('Name (Ru)')
                            ->placeholder('Enter command name'),
                        Input::make('command.position.ru')
                            ->title('Position (Ru)')
                            ->placeholder('Enter command position (ru)'),
                        Input::make('command.description.ru')
                            ->title('Description (Ru)')
                            ->placeholder('Enter command description (ru)'),
                    ])
                ])
            ])->async('async')->method('update')
                ->title('Edit Command'),
        ];
    }

    public function create(): void
    {
        $data = request()->get('command');
        if (!is_array($data)) {
            parse_str($data, $data);
        }

        $validated = validator($data, [
            'name.uz' => 'nullable|string|max:255',
            'name.ru' => 'nullable|string|max:255',
            'description.uz' => 'nullable|string',
            'description.ru' => 'nullable|string',
            'img' => 'nullable|string',
            'position.uz' => 'nullable',
            'position.ru' => 'nullable',
            'social' => 'nullable|array',
        ])->validate();

        $command  = new Command();
        $command->img = $validated['img'] ?? null;
        $command->social = isset($validated['social']) ? json_encode($validated['social']) : null;

        foreach (['uz', 'ru'] as $locale) {
            $command->translateOrNew($locale)->name = $data['name'][$locale] ?? null;
            $command->translateOrNew($locale)->description = $data['description'][$locale] ?? null;
            $command->translateOrNew($locale)->position = $data['position'][$locale] ??  null;
        }

        $command->save();

        Toast::info('Command created successfully!');
    }

    public function async(Command $command): array
    {
        $data = [
            'img' => $command->img,
            'social' => json_decode($command->social, true),
            'name' => [
                'uz' => $command->translate('uz')->name ?? '',
                'ru' => $command->translate('ru')->name ?? '',
            ],
            'description' => [
                'uz' => $command->translate('uz')->description ?? '',
                'ru' => $command->translate('ru')->description ?? '',
            ],
            'position' => [
                'uz' => $command->translate('uz')->position ?? '',
                'ru' => $command->translate('ru')->position ?? '',
            ],
        ];

        return [
            'command' => $data
        ];
    }

    public function update(Command $command): void
    {
        $data = request()->post('command');
        if (!is_array($data)) {
            parse_str($data, $data);
        }

        $validated = validator($data, [
            'name.uz' => 'nullable|string|max:255',
            'name.ru' => 'nullable|string|max:255',
            'description.uz' => 'nullable|string',
            'description.ru' => 'nullable|string',
            'img' => 'nullable|string',
            'position.uz' => 'nullable',
            'position.ru' => 'nullable',
            'social' => 'nullable|array',
        ])->validate();

        $command->img = $validated['img'] ?? null;
        $command->social = isset($validated['social']) ? json_encode($validated['social']) : null;

        foreach (['uz', 'ru'] as $locale) {
            $command->translateOrNew($locale)->name = $data['name'][$locale] ?? null;
            $command->translateOrNew($locale)->description = $data['description'][$locale] ?? null;
            $command->translateOrNew($locale)->position = $data['position'][$locale] ?? null;
        }

        $command->save();

        Toast::info('Command updated successfully!');
    }

    public function delete(Command $command): void
    {
        $command->delete();
        Toast::info('Command deleted successfully!');
    }
}
