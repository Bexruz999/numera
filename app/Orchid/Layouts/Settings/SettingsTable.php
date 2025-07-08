<?php

namespace App\Orchid\Layouts\Settings;

use App\Models\Setting;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Matrix;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\Switcher;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use Orchid\Support\Color;

class SettingsTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'settings';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('group', 'Group')
                ->sort()
                ->filter(Input::make()),

            TD::make('name_uz', 'Name (UZ)')
                ->render(function (Setting $setting) {
                    return $setting->translate('uz')->name ?? '-';
                }),

            TD::make('name_ru', 'Name (RU)')
                ->render(function (Setting $setting) {
                    return $setting->translate('ru')->name ?? '-';
                }),

            TD::make('type', 'Type')
                ->sort()
                ->filter(Select::make()->options([
                    'text' => 'Text',
                    'textarea' => 'Textarea',
                    'boolean' => 'Boolean',
                    'image' => 'Image',
                    'select' => 'Select',
                    'matrix' => 'Matrix',
                ])),

            TD::make('value_uz', 'Value (UZ)')
                ->render(function (Setting $setting) {
                    return $this->renderValueField($setting, 'uz');
                }),

            TD::make('value_ru', 'Value (RU)')
                ->render(function (Setting $setting) {
                    return $this->renderValueField($setting, 'ru');
                }),

            TD::make('locked', 'Locked')
                ->render(function (Setting $setting) {
                    return $setting->locked ? 'Yes' : 'No';
                }),

            TD::make('actions', 'Actions')
                ->align(TD::ALIGN_CENTER)
                ->width('200px')
                ->render(function (Setting $setting) {
                    return Group::make([
                        ModalToggle::make('Edit')
                            ->modal('editSetting')
                            ->modalTitle('Edit Setting')
                            ->method('updateSetting')
                            ->asyncParameters(['setting' => $setting->id])
                            ->icon('pencil')
                            ->type(Color::INFO),
                        Button::make('Delete')
                            ->confirm(__('Are you sure you want to delete this setting?'))
                            ->method('delete')
                            ->parameters(['setting' => $setting->id])
                            ->icon('trash')
                            ->type(Color::DANGER)
                            ->canSee(!$setting->locked),
                    ]);
                }),
        ];
    }

    /**
     * Render value field based on type
     */
    protected function renderValueField(Setting $setting, $locale)
    {
        $translation = $setting->translate($locale);
        $value = $translation ? $translation->value : '';

        switch ($setting->type) {
            case 'boolean':
                return $value ? 'Yes' : 'No';
            case 'image':
                return $value ? "<img src='{$value}' style='max-width: 100px; max-height: 50px;' />" : '-';
            case 'select':
                // Show selected option
                $options = [];
                if ($translation && $translation->options) {
                    $optionsData = $translation->options;
                    if (is_string($optionsData)) {
                        $optionsData = json_decode($optionsData, true);
                    }
                    if (is_array($optionsData)) {
                        foreach ($optionsData as $option) {
                            if (isset($option['key']) && isset($option['value'])) {
                                $options[$option['key']] = $option['value'];
                            }
                        }
                    }
                }
                return $options[$value] ?? $value;
            case 'matrix':
                return is_array($value) ? json_encode($value) : $value;
            default:
                return $value ? (strlen($value) > 50 ? substr($value, 0, 50) . '...' : $value) : '-';
        }
    }
}
