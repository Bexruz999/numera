<?php

namespace App\Orchid\Screens;

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
     * @return \Orchid\Screen\Action[]
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
            $tabs[$group] = Layout::rows([
                ...$this->getDynamicFields($settings),
                Button::make('Save')
                    ->method('saveSettings')
                    ->parameters(['group' => $group])
                    ->type(Color::SUCCESS),
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
                Layout::rows($this->getCreateSettingFields())
            ])
                ->title('Create New Setting')
                ->applyButton('Create')
                ->closeButton('Cancel'),
        ];
    }

    protected function getDynamicFields($settings)
    {
        $fields = [];
        foreach ($settings as $setting) {
            $fieldName = 'values.' . $setting->group . '.' . $setting->name;
            $decodedValue = json_decode($setting->value, true);
            switch ($setting->type) {
                case 'text':
                    $fields[] = Input::make($fieldName)
                        ->title($setting->name)
                        ->placeholder($setting->name)
                        ->value($decodedValue);
                    break;
                case 'textarea':
                    $fields[] = TextArea::make($fieldName)
                        ->title($setting->name)
                        ->placeholder($setting->name)
                        ->value($decodedValue);
                    break;
                case 'boolean':
                    $fields[] = Switcher::make($fieldName)
                        ->title($setting->name)
                        ->value((bool)$decodedValue);
                    break;
                case 'image':
                    $fields[] = Picture::make($fieldName)
                        ->title($setting->name)
                        ->value($decodedValue);
                    break;
                case 'select':
                    $options = [];
                    if (!empty($setting->options)) {
                        $options = json_decode($setting->options, true) ?: [];
                    }
                    $fields[] = Select::make($fieldName)
                        ->title($setting->name)
                        ->options($options)
                        ->value($decodedValue);
                    break;
                default:
                    $fields[] = Input::make($fieldName)
                        ->title($setting->name)
                        ->placeholder($setting->name)
                        ->value($decodedValue);
            }
            if ($setting->locked) {
                $fields[count($fields) - 1]->disabled();
            }
        }
        return $fields;
    }

    /**
     * @return array
     */
    protected function getCreateSettingFields()
    {
        return [
            Input::make('new_setting.group')
                ->title('Group')
                ->required(),
            Input::make('new_setting.name')
                ->title('Name')
                ->required(),
            Switcher::make('new_setting.locked')
                ->title('Locked')
                ->sendTrueOrFalse(),
            Select::make('new_setting.type')
                ->title('Type')
                ->options([
                    'text' => 'Text',
                    'textarea' => 'Textarea',
                    'boolean' => 'Boolean',
                    'image' => 'Image',
                    'select' => 'Select',
                ])
                ->required(),
        ];
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

        DB::table('settings')->insert([
            'group' => $data['group'],
            'name' => $data['name'],
            'locked' => !empty($data['locked']),
            'type' => $data['type'],
        ]);
    }

    /**
     * @param Request $request
     */
    public function saveSettings(Request $request)
    {
        // Only run if 'values' is present and not empty
        $group = $request->input('group');
        $values = $request->input('values.' . $group, []);
        if (!$group || !is_array($values) || empty($values)) {
            return;
        }

        $settings = DB::table('settings')->where('group', $group)->get();
        foreach ($settings as $setting) {
            if ($setting->locked) {
                continue;
            }
            if (array_key_exists($setting->name, $values)) {
                DB::table('settings')
                    ->where('id', $setting->id)
                    ->update([
                        'value' => json_encode($values[$setting->name]),
                        'updated_at' => now(),
                    ]);
            }
        }

        Toast::info('Settings saved successfully.');
    }
}
