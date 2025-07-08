<?php

namespace App\Orchid\Layouts;

use Illuminate\Http\Request;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Matrix;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\Switcher;
use Orchid\Screen\Fields\TextArea;
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
        'setting.type',
    ];

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    protected function layouts(): iterable
    {
        $type = $this->query->get('setting.type');

        return [
            Layout::rows([
                Select::make('setting.type')
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
                Input::make('setting.group')
                    ->title('Group')
                    ->placeholder('Enter group name')
                    ->required(),
                Switcher::make('setting.locked')
                    ->title('Locked')
                    ->sendTrueOrFalse(),
            ]),
            Layout::tabs([
                'Create UZ' => Layout::rows([
                    Input::make('setting.name.uz')
                        ->title('Name (UZ)')
                        ->placeholder('Enter setting name (uz)')
                        ->required(),
                    $this->getValueField('uz', $type),
                    $this->getOptionsField('uz', $type),
                ]),
                'Create RU' => Layout::rows([
                    Input::make('setting.name.ru')
                        ->title('Name (RU)')
                        ->placeholder('Enter setting name (ru)'),
                    $this->getValueField('ru', $type),
                    $this->getOptionsField('ru', $type),
                ]),
            ])
        ];
    }

    /**
     * Get value field based on type and locale
     */
    protected function getValueField($locale, $type)
    {
        $fieldName = "setting.value.$locale";
        $title = "Value (" . strtoupper($locale) . ")";
        $placeholder = "Enter setting value ($locale)";

        switch ($type) {
            case 'text':
                return Input::make($fieldName)
                    ->title($title)
                    ->placeholder($placeholder);
            case 'textarea':
                return TextArea::make($fieldName)
                    ->title($title)
                    ->placeholder($placeholder);
            case 'boolean':
                return Switcher::make($fieldName)
                    ->title($title)
                    ->sendTrueOrFalse();
            case 'image':
                return Input::make($fieldName)
                    ->title($title)
                    ->placeholder($placeholder);
            case 'select':
                return TextArea::make($fieldName)
                    ->title($title)
                    ->placeholder($placeholder)
                    ->help('Enter comma-separated values');
            case 'matrix':
                return TextArea::make($fieldName)
                    ->title($title)
                    ->placeholder($placeholder)
                    ->help('Enter JSON format data');
            default:
                return Input::make($fieldName)
                    ->title($title)
                    ->placeholder($placeholder);
        }
    }

    /**
     * Get options field based on type and locale
     */
    protected function getOptionsField($locale, $type)
    {
        $fieldName = "setting.options.$locale";
        $title = "Options (" . strtoupper($locale) . ")";

        if ($type === 'select' || $type === 'matrix') {
            return Matrix::make($fieldName)
                ->title($title)
                ->columns([
                    'Key' => 'key',
                    'Value' => 'value',
                ])
                ->help('Add key-value pairs for options');
        }

        // Return empty/hidden field for other types
        return Input::make($fieldName)
            ->title($title)
            ->placeholder("Enter options ($locale)")
            ->canSee(false); // Hide by default
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
        // Update the type in repository to trigger re-render
        return $repository->set('setting.type', $request->input('setting.type'));
    }
}
