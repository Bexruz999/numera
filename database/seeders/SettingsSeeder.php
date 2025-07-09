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
            'about' => [
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
                        'uz' => [
                            ['icon' => 'flash', 'text' => 'Бухгалтерия нового поколения'],
                            ['icon' => 'check', 'text' => 'Профессионализм и забота'],
                        ],
                        'ru' => [
                            ['icon' => 'flash', 'text' => 'Бухгалтерия нового поколения'],
                            ['icon' => 'check', 'text' => 'Профессионализм и забота'],
                        ]
                    ],
                    'options' => [
                        'uz' => [['key' => 'icon', 'value' => 'Icon'], ['key' => 'text', 'value' => 'Text']],
                        'ru' => [['key' => 'icon', 'value' => 'Иконка'], ['key' => 'text', 'value' => 'Текст']],
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

            'about_mission' => [
                'title_l' => [
                    'type' => 'text',
                    'translations' => [
                        'uz' => 'Bizning missiyamiz',
                        'ru' => 'Наша миссия',
                    ],
                ],
                'text_l' => [
                    'type' => 'textArea',
                    'translations' => [
                        'uz' => "Buxgalteriya hisobini O‘zbekistonda kichik va o‘rta biznes uchun shaffof, qulay va ochiq qilish. Biz tadbirkorlarni o'z bizneslarini rivojlantirish va rivojlantirishga e'tibor qaratishlari uchun ularni muntazam ishlardan ozod qilishga intilamiz.",
                        'ru' => 'Сделать бухгалтерию прозрачной, удобной и доступной для малого и среднего бизнеса в Узбекистане. Мы стремимся освободить предпринимателей от рутины, чтобы они могли сосредоточиться на росте и развитии своего дела. ',
                    ],
                ],
                'title_r' => [
                    'type' => 'text',
                    'translations' => [
                        'uz' => 'Missiya va qadriyatlar',
                        'ru' => 'Миссия и ценности',
                    ],
                ],
                'text_r' => [
                    'type' => 'textArea',
                    'translations' => [
                        'uz' => "Bizning ishimizning markazida halollik, professionallik va mijozlarga g'amxo'rlik yotadi.",
                        'ru' => 'В центре нашей работы — честность, профессионализм и забота о клиенте.',
                    ],
                ],
                'our_values_title' => [
                    'type' => 'text',
                    'translations' => [
                        'uz' => 'Bizning qadriyatlarimiz',
                        'ru' => 'Наши ценности',
                    ],
                ],
                'our_values_list' => [
                    'type' => 'matrix',
                    'translations' => [
                        'uz' => [
                            ['icon' => 'check', 'text' => "Halollik va shaffoflik - biz yashirin to'lovlarsiz ishlaymiz va har doim mijoz bilan ochiqmiz."],
                            ['icon' => 'check', 'text' => "Professionallik va mas'uliyat - har bir Numera buxgalteri ishonchli mutaxassisdir."],
                            ['icon' => 'check', 'text' => "Mijozlarga yo'naltirilganlik - bu har bir biznesning vazifalariga individual yondashuv va jalb qilish."],
                            ['icon' => 'check', 'text' => "Innovatsiya va samaradorlik - biz tez va aniq ishlash uchun zamonaviy texnologiyalardan foydalanamiz."],
                        ],
                        'ru' => [
                            ['icon' => 'check', 'text' => 'Честность и прозрачность — мы работаем без скрытых платежей и всегда открыты перед клиентом.'],
                            ['icon' => 'check', 'text' => 'Профессионализм и ответственность — каждый бухгалтер Numera — это эксперт, которому можно доверять.'],
                            ['icon' => 'check', 'text' => 'Клиентоориентированность — индивидуальный подход и вовлечённость в задачи каждого бизнеса.'],
                            ['icon' => 'check', 'text' => 'Инновации и эффективность — мы используем современные технологии, чтобы работать быстро и точно.'],
                        ]
                    ],
                    'options' => [
                        'uz' => [['key' => 'icon', 'value' => 'Icon'], ['key' => 'text', 'value' => 'Text']],
                        'ru' => [['key' => 'icon', 'value' => 'Иконка'], ['key' => 'text', 'value' => 'Текст']],
                    ],
                ],
                'our_values_bg' => [
                    'type' => 'image',
                    'translations' => [
                        'uz' => '../img/png/target.png',
                        'ru' => '../img/png/target.png',
                    ],
                ],
                'team_title' => [
                    'type' => 'text',
                    'translations' => [
                        'uz' => 'Bizning jamoamiz bilan tanishing',
                        'ru' => 'Свяжитесь с нашей командой',
                    ],
                ],
                'team_text' => [
                    'type' => 'textArea',
                    'translations' => [
                        'uz' => "Bizning jamoamiz - bu o'z ishiga sodiq, tajribali va professional mutaxassislar. Biz har bir mijozga individual yondashamiz va ularning ehtiyojlarini tushunamiz.",
                        'ru' => 'Мы — команда молодых и амбициозных бухгалтеров, консультантов и управляющих. Каждый из нас верит, что бухгалтерия может быть простой и понятной.',
                    ],
                ],
                'history_title' => [
                    'type' => 'text',
                    'translations' => [
                        'uz' => 'Numera Tarixi',
                        'ru' => 'История Numera',
                    ],
                ],
                'history_text' => [
                    'type' => 'textArea',
                    'translations' => [
                        'uz' => "Numera oddiy, ammo kuchli g'oyadan tug'ilgan - buxgalteriya hisobi bosh og'rig'i bo'lishi shart emas. Biz zerikarli hisobotlar va tushunarsiz raqamlar haqidagi stereotiplarni buzish uchun noldan boshladik. Bugun biz buxgalteriya hisobini shaffof, qulay va haqiqatan ham foydali qiladigan jamoadamiz. Biz hali yoshmiz, lekin butun mamlakat bo'ylab o'nlab bizneslarga hamroh bo'lamiz va ishonch bilan oldinga intilamiz - bosqichma-bosqich, hisob-kitobdan keyin.",
                        'ru' => 'Numera родилась из простой, но мощной идеи — бухгалтерия не должна быть головной болью. Мы начали с нуля, чтобы сломать стереотипы о скучных отчётах и непонятных цифрах. Сегодня мы — команда, которая делает бухгалтерию прозрачной, удобной и по-настоящему полезной. Мы ещё молоды, но уже сопровождаем десятки бизнесов по всей стране и уверенно движемся вперёд — шаг за шагом, счёт за счётом',
                    ],
                ],
                'history_bg' => [
                    'type' => 'image',
                    'translations' => [
                        'uz' => '../img/jpg/history01.jpg',
                        'ru' => '../img/jpg/history01.jpg',
                    ],
                ],
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
                        'uz' => [['email' => 'info@numera.uz'], ['email' => 'khusankhonaliev@gmail.com']],
                        'ru' => [['email' => 'info@numera.uz'], ['email' => 'khusankhonaliev@gmail.com']],
                    ],
                    'options' => [
                        'uz' => [['key' => 'email', 'value' => 'Email']],
                        'ru' => [['key' => 'email', 'value' => 'Email']],
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
                        $model->translateOrNew($ln)->options = $options;
                    }
                }

                $model->save();
            }
        }
    }
}
