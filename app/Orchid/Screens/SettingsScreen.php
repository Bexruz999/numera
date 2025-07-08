<?php

namespace App\Orchid\Screens;

use App\Models\Setting;
use App\Orchid\Layouts\SettingsListener;
use Orchid\Screen\Action;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Screen;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Switcher;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\Matrix;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\ModalToggle;
use Illuminate\Http\Request;
use Orchid\Support\Color;
use Orchid\Support\Facades\Layout;
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
        return [
            'settings' => Setting::all()->groupBy('group')
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return __('Settings');
    }

    /**
     * The screen's action buttons.
     *
     * @return Action[]
     */
    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('Create Setting')
                ->modal('createSetting')
                ->icon('bs.plus')
                ->method('createSetting')
                ->modalTitle('Create Setting'),
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        $settingsGroups = Setting::all()->groupBy('group');
        $tabs = [];

        foreach ($settingsGroups as $group => $settings) {
            $rows = [];
            foreach ($settings as $setting) {
                $rows[] = Group::make([
                    $this->getDynamicField($setting, 'uz'),
                    $this->getDynamicField($setting, 'ru'),
                ]);
            }

            $rows[] = Button::make(__('Save'))
                ->method('saveSettings')
                ->parameters(['group' => $group])
                ->type(Color::SUCCESS);

            $tabs[$group] = Layout::rows($rows);
        }

        return [
            Layout::tabs($tabs),

            Layout::modal('createSetting', [
                SettingsListener::class,
            ])->title('Create Setting')->applyButton('Create'),
        ];
    }


    /**
     * Get dynamic field based on setting type and locale
     */
    protected function getDynamicField(Setting $setting, $locale)
    {
        $fieldName = 'settings.' . $setting->id . '.value.' . $locale;
        $translation = $setting->translate($locale);
        $value = $translation ? $translation->value : '';

        switch ($setting->type) {
            case 'text':
                return Input::make($fieldName)
                    ->title("Value ($locale)")
                    ->value($value)
                    ->disabled($setting->locked);
            case 'textarea':
                return TextArea::make($fieldName)
                    ->title("Value ($locale)")
                    ->value($value)
                    ->disabled($setting->locked);
            case 'boolean':
                return Switcher::make($fieldName)
                    ->title("Value ($locale)")
                    ->value($value)
                    ->sendTrueOrFalse()
                    ->disabled($setting->locked);
            case 'image':
                return Picture::make($fieldName)
                    ->title("Value ($locale)")
                    ->value($value)
                    ->targetRelativeUrl()
                    ->disabled($setting->locked);
            case 'select':
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
                return Select::make($fieldName)
                    ->title("Value ($locale)")
                    ->options($options)
                    ->value($value)
                    ->disabled($setting->locked);
            case 'matrix':
                $columns = [];
                if ($translation && $translation->options) {
                    $optionsData = $translation->options;
                    if (is_string($optionsData)) {
                        $optionsData = json_decode($optionsData, true);
                    }
                    if (is_array($optionsData)) {
                        foreach ($optionsData as $option) {
                            if (isset($option['key']) && isset($option['value'])) {
                                $columns[$option['value']] = $option['key'];
                            }
                        }
                    }
                }
                return Matrix::make($fieldName)
                    ->title("Value ($locale)")
                    ->columns($columns)
                    ->value(is_array($value) ? $value : [])
                    ->disabled($setting->locked);
            default:
                return Input::make($fieldName)
                    ->title("Value ($locale)")
                    ->value($value)
                    ->disabled($setting->locked);
        }
    }

    public function createSetting(): void
    {
        $data = request()->post('setting');
        if (!is_array($data)) {
            parse_str($data, $data);
        }

        if (!$data || !is_array($data)) {
            Toast::error('Invalid data provided.');
            return;
        }

        // Check if name.uz exists in nested array
        $nameUz = $data['name']['uz'] ?? null;

        if (!$nameUz) {
            Toast::error('Name (UZ) is required.');
            return;
        }

        $validated = validator($data, [
            'group' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'locked' => 'boolean',
        ])->validate();

        $setting = new Setting();
        $setting->group = $validated['group'];
        $setting->type = $validated['type'];
        $setting->locked = $validated['locked'] ?? false;

        foreach (['uz', 'ru'] as $locale) {
            $setting->translateOrNew($locale)->name = $data['name'][$locale] ?? null;
            $setting->translateOrNew($locale)->value = $data['value'][$locale] ?? null;
            $setting->translateOrNew($locale)->options = $data['options'][$locale] ?? null;
        }

        $setting->save();

        Toast::info('Setting created successfully!');
    }

    public function asyncGetSetting(Setting $setting): array
    {
        $data = [
            'group' => $setting->group,
            'type' => $setting->type,
            'locked' => $setting->locked,
            'name' => [
                'uz' => $setting->translate('uz')->name ?? '',
                'ru' => $setting->translate('ru')->name ?? '',
            ],
            'value' => [
                'uz' => $setting->translate('uz')->value ?? '',
                'ru' => $setting->translate('ru')->value ?? '',
            ],
            'options' => [
                'uz' => $setting->translate('uz')->options ?? '',
                'ru' => $setting->translate('ru')->options ?? '',
            ],
        ];

        return [
            'setting' => $data
        ];
    }

    public function updateSetting(Setting $setting): void
    {
        $data = request()->post('setting');
        if (!is_array($data)) {
            parse_str($data, $data);
        }

        if (!$data || !is_array($data)) {
            Toast::error('Invalid data provided.');
            return;
        }

        // Check if name.uz exists in nested array
        $nameUz = $data['name']['uz'] ?? null;

        if (!$nameUz) {
            Toast::error('Name (UZ) is required.');
            return;
        }

        $validated = validator($data, [
            'group' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'locked' => 'boolean',
        ])->validate();

        $setting->group = $validated['group'];
        $setting->type = $validated['type'];
        $setting->locked = $validated['locked'] ?? false;

        foreach (['uz', 'ru'] as $locale) {
            $setting->translateOrNew($locale)->name = $data['name'][$locale] ?? null;
            $setting->translateOrNew($locale)->value = $data['value'][$locale] ?? null;
            $setting->translateOrNew($locale)->options = $data['options'][$locale] ?? null;
        }

        $setting->save();

        Toast::info('Setting updated successfully!');
    }

    public function saveSettings(Request $request)
    {
        $group = $request->input('group');
        $settingsData = $request->input('settings', []);

        if (!$group || !is_array($settingsData)) {
            return;
        }

        foreach ($settingsData as $settingId => $data) {
            $setting = Setting::find($settingId);
            if (!$setting || $setting->locked || $setting->group !== $group) {
                continue;
            }

            foreach (['uz', 'ru'] as $locale) {
                if (isset($data['name'][$locale])) {
                    $setting->translateOrNew($locale)->name = $data['name'][$locale];
                }
                if (isset($data['value'][$locale])) {
                    $setting->translateOrNew($locale)->value = $data['value'][$locale];
                }
            }

            $setting->save();
        }

        Toast::info(__('Settings saved successfully.'));
    }

    public function delete(Setting $setting): void
    {
        if (!$setting->locked) {
            $setting->delete();
            Toast::info('Setting deleted successfully!');
        } else {
            Toast::warning('Cannot delete locked setting.');
        }
    }
}
