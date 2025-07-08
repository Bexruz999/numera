<?php

namespace App\Orchid\Screens;

use App\Orchid\Layouts\SettingsListener;
use Orchid\Screen\Action;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Matrix;
use Orchid\Screen\Screen;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Switcher;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Fields\Select;
use Orchid\Support\Color;
use Orchid\Support\Facades\Layout;
use Illuminate\Support\Facades\DB;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\ModalToggle;
use Illuminate\Http\Request;
use Orchid\Support\Facades\Toast;

class SettingsScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        // Sort by group ASC, then by id ASC
        $settings = DB::table('settings')
            ->orderBy('group')
            ->orderBy('id')
            ->get();
        $grouped = [];
        $values = [];
        foreach ($settings as $setting) {
            $grouped[$setting->group][] = $setting;
            $decodedValue = json_decode($setting->value, true);
            $values[$setting->group][$setting->name] = $decodedValue;
        }
        return [
            'settings' => $settings,
            'grouped' => $grouped,
            'values' => $values,
            'new_setting' => [
                'group' => '',
                'name' => '',
                'locked' => false,
                'type' => '',
                'options' => '',
            ],
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Settings';
    }

    /**
     * The screen's action buttons.
     *
     * @return Action[]
     */
    public function commandBar(): iterable
    {
        return [];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        // Sort by group ASC, then by id ASC
        $grouped = DB::table('settings')
            ->orderBy('group')
            ->orderBy('id')
            ->get()
            ->groupBy('group');
        $tabs = [];
        foreach ($grouped as $group => $settings) {
            $fields = [];
            foreach ($settings as $setting) {
                $field = $this->getSingleDynamicField($setting);
                if (!$setting->locked) {
                    // Render field and delete button as a single horizontal group using a custom array
                    $fields[] = $this->fieldWithDeleteButtonRow($field, $setting, $group);
                } else {
                    $fields[] = $field;
                }
            }
            $tabs[$group] = Layout::rows([
                ...$fields,
                Button::make('Save')
                    ->method('saveSettings')
                    ->parameters(['group' => $group])
                    ->type(Color::SECONDARY),
            ]);
        }

        return [
            Layout::tabs($tabs),
            Layout::rows([
                ModalToggle::make('Create Setting')
                    ->modal('createSettingModal')
                    ->method('createSetting')
                    ->type(Color::DARK),
            ]),
            Layout::modal('createSettingModal', [
                SettingsListener::class,
            ])
                ->title('Create New Setting')
                ->applyButton('Create')
                ->closeButton('Cancel'),
        ];
    }

    /**
     * Helper to render a field and a delete button in a single row.
     */
    protected function fieldWithDeleteButtonRow($field, $setting, $group)
    {
        return Group::make([
            $field,
            Button::make()
                ->confirm('Are you sure you want to delete "' . $setting->name . '"?')
                ->method('deleteSetting')
                ->parameters(['id' => $setting->id, 'group' => $group])
                ->type(Color::DARK)
                ->icon('trash')
                ->class('btn icon-link btn-dark mb-1'),
        ])->alignEnd();
    }

    protected function getSingleDynamicField($setting)
    {
        $fieldName = 'values.' . $setting->group . '.' . $setting->name;
        $decodedValue = json_decode($setting->value, true);
        switch ($setting->type) {
            case 'text':
                $field = Input::make($fieldName)
                    ->title($setting->name)
                    ->placeholder($setting->name)
                    ->value($decodedValue);
                break;
            case 'textarea':
                $field = TextArea::make($fieldName)
                    ->title($setting->name)
                    ->placeholder($setting->name)
                    ->value($decodedValue);
                break;
            case 'boolean':
                $field = Switcher::make($fieldName)
                    ->title($setting->name)
                    ->value($decodedValue)
                    ->sendTrueOrFalse(); // Ensure it always sends a value, even when unchecked
                break;
            case 'image':
                $field = Picture::make($fieldName)
                    ->title($setting->name)
                    ->value($decodedValue)
                    ->targetRelativeUrl(); // Save relative URLs instead of absolute URLs with domain
                break;
            case 'select':
                $options = [];
                if (!empty($setting->options)) {
                    $options = json_decode($setting->options, true) ?: [];
                }
                $field = Select::make($fieldName)
                    ->title($setting->name)
                    ->options($options)
                    ->value($decodedValue);
                break;
            case 'matrix':
                $optionsArray = [];
                if (!empty($setting->options)) {
                    $options = json_decode($setting->options, true) ?: [];
                    foreach ($options as $key => $value) {
                        // Ensure options are in the correct format for Matrix
                        $optionsArray[$value] = $key;
                    }
                }

                $field = Matrix::make($fieldName)
                    ->title($setting->name)
                    ->columns($optionsArray)
                    ->value(is_array($decodedValue) ? $decodedValue : []);
                break;
            default:
                $field = Input::make($fieldName)
                    ->title($setting->name)
                    ->placeholder($setting->name)
                    ->value($decodedValue);
        }
        if ($setting->locked) {
            $field->disabled();
        }
        return $field;
    }

    /**
     * @param Request $request
     */
    public function createSetting(Request $request)
    {
        // Only run if 'new_setting' is present and not empty
        $data = $request->get('new_setting');
        if (!$data || empty($data['name'])) {
            return;
        }

        $request->validate([
            'new_setting.group' => 'required',
            'new_setting.name' => 'required',
            'new_setting.type' => 'required',
        ]);

        // Process options for select and matrix types
        $options = null;
        if (($data['type'] === 'select' || $data['type'] === 'matrix') && !empty($data['options'])) {
            $optionsArray = [];
            // Handle Matrix format
            $optionsData = is_array($data['options']) ? $data['options'] : [];
            foreach ($optionsData as $option) {
                if (isset($option['key']) && isset($option['value'])) {
                    $optionsArray[$option['key']] = $option['value'];
                }
            }
            $options = json_encode($optionsArray);
        }

        DB::table('settings')->insert([
            'group' => $data['group'],
            'name' => $data['name'],
            'locked' => !empty($data['locked']),
            'type' => $data['type'],
            'options' => $options,
            'value' => json_encode(''),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Toast::info('Setting created successfully.');
    }

    /**
     * @param Request $request
     */
    public function saveSettings(Request $request)
    {
        // Only run if 'values' is present and not empty
        $group = $request->input('group');
        $values = $request->input('values.' . $group, []);
        if (!$group || !is_array($values)) {  // Removed empty() check to allow for saving empty values
            return;
        }

        $settings = DB::table('settings')->where('group', $group)->get();
        foreach ($settings as $setting) {
            if ($setting->locked) {
                continue;
            }

            // Special handling for boolean settings - if not present in values, it means it was unchecked
            if ($setting->type === 'boolean' && !array_key_exists($setting->name, $values)) {
                DB::table('settings')
                    ->where('id', $setting->id)
                    ->update([
                        'value' => json_encode(false),
                        'updated_at' => now(),
                    ]);
                continue;
            }

            if (array_key_exists($setting->name, $values)) {
                $value = $values[$setting->name];

                // For image type, ensure we're saving relative paths
                if ($setting->type === 'image' && is_string($value) && str_contains($value, 'localhost')) {
                    // Convert absolute URL to relative path
                    $value = parse_url($value, PHP_URL_PATH);
                }

                DB::table('settings')
                    ->where('id', $setting->id)
                    ->update([
                        'value' => json_encode($value),
                        'updated_at' => now(),
                    ]);
            }
        }

        Toast::info('Settings saved successfully.');
    }

    /**
     * Delete a setting by id.
     */
    public function deleteSetting(Request $request)
    {
        $id = $request->input('id');
        $setting = DB::table('settings')->where('id', $id)->first();
        if ($setting && !$setting->locked) {
            DB::table('settings')->where('id', $id)->delete();
            Toast::info('Setting deleted.');
        } else {
            Toast::warning('Cannot delete locked setting.');
        }
    }
}
