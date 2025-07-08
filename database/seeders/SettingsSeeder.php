<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $groups = [
            'home' => [
                'home_page_title' => [
                    'type' => 'text',
                    'translations' => [
                        'uz' => 'Bosh sahifa sarlavhasi',
                        'ru' => 'Заголовок главной страницы',
                    ],
                ],
                'home_page_description' => [
                    'type' => 'textarea',
                    'translations' => [
                        'uz' => 'Bosh sahifa tavsifi',
                        'ru' => 'Описание главной страницы',
                    ],
                ],

                'buh__subtitle' => [
                    'type' => 'text',
                    'translations' => [
                        'uz' => 'Buh sarlavhasi',
                        'ru' => 'Подзаголовок Buh',
                    ],
                ],
                'buh__title' => [
                    'type' => 'textArea',
                    'translations' => [
                        'uz' => 'Цифровая [бухгалтерия] без визитов и бумаги',
                        'ru' => 'Цифровая [бухгалтерия] без визитов и бумаги',
                    ],
                ],
                'buh__list' => [
                    'type' => 'matrix',
                    'translations' => [
                        'uz' => '{"1":{"icon":"flash","text":"\u0411\u0443\u0445\u0433\u0430\u043b\u0442\u0435\u0440\u0438\u044f \u043d\u043e\u0432\u043e\u0433\u043e \u043f\u043e\u043a\u043e\u043b\u0435\u043d\u0438\u044f"}}',
                        'ru' => '{"1":{"icon":"flash","text":"\u0411\u0443\u0445\u0433\u0430\u043b\u0442\u0435\u0440\u0438\u044f \u043d\u043e\u0432\u043e\u0433\u043e \u043f\u043e\u043a\u043e\u043b\u0435\u043d\u0438\u044f"}}',
                    ],
                    'options' => [
                        'uz' => '{"1":{"key":"icon","value":"Icon"},"2":{"key":"text","value":"Text"}}',
                        'ru' => '{"1":{"key":"icon","value":"Иконка"},"2":{"key":"text","value":"Текст"}}',
                    ],
                ],
                'buh__text' => [
                    'type' => 'textArea',
                    'translations' => [
                        'uz' => 'Мы здесь, чтобы сделать бухгалтерию простой и понятной Честность, профессионализм и забота — основа нашей работы',
                        'ru' => 'Мы здесь, чтобы сделать бухгалтерию простой и понятной Честность, профессионализм и забота — основа нашей работы',
                    ],
                ],
                'buh__bg-light' => [
                    'type' => 'image',
                    'translations' => [
                        'uz' => 'Изображение для светлого фона Buh',
                        'ru' => 'Изображение для светлого фона Buh',
                    ],
                ],
                // Add more settings for the home group as needed
            ],
            'footer' => [
                'social_networks' => [
                    'type' => 'matrix',
                    'translations' => [
                        'uz' => '{"1":{"icon":"facebook","link":"https://facebook.com","title":"Facebook"},"2":{"icon":"instagram","link":"https://instagram.com","title":"Instagram"},"3":{"icon":"telegram","link":"https://t.me/yourchannel","title":"Telegram"}}',
                        'ru' => '{"1":{"icon":"facebook","link":"https://facebook.com","title":"Facebook"},"2":{"icon":"instagram","link":"https://instagram.com","title":"Instagram"},"3":{"icon":"telegram","link":"https://t.me/yourchannel","title":"Telegram"}}',
                    ],
                ],
                'phones' => [
                    'type' => 'matrix',
                    'translations' => [
                        'uz' => '{"1":{"link":"tel:+998712946062","title":"+998 71 294 60 62"},"2":{"link":"tel:+998909332420","title":"+998 90 933 24 20"}}',
                        'ru' => '{"1":{"link":"tel:+998712946062","title":"+998 71 294 60 62"},"2":{"link":"tel:+998909332420","title":"+998 90 933 24 20"}}',
                    ],
                    'options' => [
                        'uz' => '{"1":{"key":"link","value":"Link"},"2":{"key":"number","value":"Number"}}',
                        'ru' => '{"1":{"key":"link","value":"Ссылка"},"2":{"key":"number","value":"Номер"}}',
                    ],
                ],

                'work_schedule' => [
                    'type' => 'text',
                    'translations' => [
                        'uz' => 'Dushanba – Juma: 9:00 – 18:00',
                        'ru' => 'Пн–Пт: 9:00 – 18:00',
                    ],
                ],

                'office_address' => [
                    'type' => 'text',
                    'translations' => [
                        'uz' => 'Toshkent, Yashnobod tumani, Karasuv ko\'chasi, 33A',
                        'ru' => 'г. Ташкент, Яшнабадский район, ул. Карасув, 33А',
                    ],
                ],

                'email' => [
                    'type' => 'matrix',
                    'translations' => [
                        'uz' => '{"1":{"email":"info@numera.uz"},"2":{"email":"khusankhonaliev@gmail.com"}}',
                        'ru' => '{"1":{"email":"info@numera.uz"},"2":{"email":"khusankhonaliev@gmail.com"}}',
                    ],
                    'options' => [
                        'uz' => '{"1":{"key":"email","value":"Email"}}',
                        'ru' => '{"1":{"key":"email","value":"Email"}}',
                    ],
                ],

                'rights' => [
                    'type' => 'text',
                    'translations' => [
                        'uz' => '© 2022–2025 «Numera.uz»',
                        'ru' => '© 2022–2025 «Numera.uz»',
                    ],
                ],

                'map' => [
                    'type' => 'text',
                    'translations' => [
                        'uz' => 'https://www.google.com/maps/embed?pb=!1m13!1m8!1m3!1d5995.009854645912!2d69.341487!3d41.297878000000004!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNDHCsDE3JzUyLjQiTiA2OcKwMjAnMjkuNCJF!5e0!3m2!1sru!2s!4v1750238504433!5m2!1sru!2s',
                        'ru' => 'https://www.google.com/maps/embed?pb=!1m13!1m8!1m3!1d5995.009854645912!2d69.341487!3d41.297878000000004!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNDHCsDE3JzUyLjQiTiA2OcKwMjAnMjkuNCJF!5e0!3m2!1sru!2s!4v1750238504433!5m2!1sru!2s',
                    ],
                ],
                // Add more settings for the footer group as needed
            ],
            // Add more groups and their settings as needed
        ];

        foreach ($groups as $gn => $group) {
            foreach ($group as $key => $setting) {
                $model = Setting::create([
                    'group' => $gn,
                    'locked' => false,
                    'type' => $setting['type'],
                    'name' => $key,
                ]);

                foreach ($setting['translations'] as $ln => $translation) {
                    $model->translateOrNew($ln)->value = $translation;
                }
                if (isset($setting['options'])) {
                    foreach ($setting['options'] as $ln => $options) {
                        $model->translateOrNew($ln)->options = json_decode($options, true);
                    }
                }

                $model->save();
            }
        }
    }
}
