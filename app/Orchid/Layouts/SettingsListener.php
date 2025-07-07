<?php

namespace App\Orchid\Layouts;

use Illuminate\Http\Request;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Matrix;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\Switcher;
use Orchid\Screen\Layouts\Listener;
use Orchid\Screen\Repository;
use Orchid\Support\Facades\Layout;

class SettingsListener extends Listener
{
    /**
     * List of field names for which values will be listened.
     *
     * @var string[]
     */
    protected $targets = [
        'new_setting.type',
        'new_setting.options',
    ];

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    protected function layouts(): iterable
    {
        return [
            Layout::rows([
                Select::make('new_setting.type')
                    ->title('Type')
                    ->options([
                        'text' => 'Text',
                        'textarea' => 'Textarea',
                        'boolean' => 'Boolean',
                        'image' => 'Image',
                        'select' => 'Select',
                        'matrix' => 'Matrix',
                    ])
                    ->required()
                    ->help('Select the field type'),
                Input::make('new_setting.group')
                    ->title('Group')
                    ->required(),
                Input::make('new_setting.name')
                    ->title('Name')
                    ->required(),
                Switcher::make('new_setting.locked')
                    ->title('Locked')
                    ->sendTrueOrFalse(),
                Matrix::make('new_setting.options')
                    ->title('Options (for Select and Matrix types)')
                    ->columns([
                        'Key' => 'key',
                        'Value' => 'value',
                    ])
                    ->help('Add key-value pairs for options')
                    ->canSee($this->query->get('new_setting.type') === 'select' || $this->query->get('new_setting.type') === 'matrix'),
            ]),
        ];
    }

    /**
     * Update state
     *
     * @param \Orchid\Screen\Repository $repository
     * @param \Illuminate\Http\Request  $request
     *
     * @return \Orchid\Screen\Repository
     */
    public function handle(Repository $repository, Request $request): Repository
    {
        // Show or hide options field based on selected type
        return $repository->set('new_setting.type' , $request->input('new_setting.type'));
    }
}
