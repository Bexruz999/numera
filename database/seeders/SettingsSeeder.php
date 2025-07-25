<?php

namespace Database\Seeders;

use App\Models\Setting;
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
                'main_title' => [
                    'type' => 'text',
                    'translations' => [
                        'uz' => 'Biznesni rivojlantiring [buxgalteriya]ni bizga qoldiring',
                        'ru' => 'Развивайте бизнес [бухгалтерию] оставьте нам',
                    ],
                ],
                'main_description' => [
                    'type' => 'textarea',
                    'translations' => [
                        'uz' => "Biznes yuritish buxgalteriya hisobini tushunishni anglatmaydi. Biz siz uchun hisoblaymiz, rejalashtiramiz va hisobot beramiz - halol, aniq va o'z vaqtida.",
                        'ru' => 'Вести бизнес — не значит разбираться в бухгалтерии. Мы считаем, планируем и отчитываемся за вас — честно, точно и вовремя.',
                    ],
                ],
                'main_list' => [
                    'type' => 'matrix',
                    'translations' => [
                        'uz' => [
                            ['icon' => '../img/svg/main-icon01.svg', 'text' => '100% raqamli buxgalteriya xizmati'],
                            ['icon' => '../img/svg/main-icon02.svg', 'text' => 'O‘zbekistonning kichik va o‘rta biznesiga ixtisoslashgan'],
                            ['icon' => '../img/svg/main-icon03.svg', 'text' => 'Kontragentlarni tekshirish va xavflardan himoya qilish'],
                        ],
                        'ru' => [
                            ['icon' => '../img/svg/main-icon01.svg', 'text' => '100% цифровой бухгалтерский сервис'],
                            ['icon' => '../img/svg/main-icon02.svg', 'text' => 'Специализация на малом и среднем бизнесе Узбекистана '],
                            ['icon' => '../img/svg/main-icon03.svg', 'text' => 'Проверка контрагентов и защита от рисков'],
                        ]
                    ],
                    'options' => [
                        'uz' => [['key' => 'icon', 'value' => 'Icon'], ['key' => 'text', 'value' => 'Text']],
                        'ru' => [['key' => 'icon', 'value' => 'Иконка'], ['key' => 'text', 'value' => 'Текст']],
                    ],
                ],
                'main_btn' => [
                    'type' => 'text',
                    'translations' => [
                        'uz' => 'Maslahat olish',
                        'ru' => 'Получить консультацию',
                    ],
                ],
                'main_btn_link' => [
                    'type' => 'text',
                    'translations' => [
                        'uz' => '/contact',
                        'ru' => '/contact',
                    ],
                ],
                'main_box' => [
                    'type' => 'image',
                    'translations' => [
                        'uz' => '../img/png/main-3d.png',
                        'ru' => '../img/png/main-3d.png',
                    ],
                ],
                'main_img' => [
                    'type' => 'image',
                    'translations' => [
                        'uz' => '../img/jpg/main-img01.jpg',
                        'ru' => '../img/jpg/main-img01.jpg',
                    ],
                ],

                'we_title' => [
                    'type' => 'text',
                    'translations' => [
                        'uz' => 'Biz kimmiz va biznesga qanday yordam beramiz',
                        'ru' => 'Кто мы и чем помогаем бизнесу',
                    ],
                ],
                'we_text' => [
                    'type' => 'textArea',
                    'translations' => [
                        'uz' => "Numera — bu O‘zbekistondagi kichik va o‘rta biznes uchun raqamli buxgalteriya hisobini taqdim etuvchi kompaniya. Bizning maqsadimiz — buxgalteriya hisobini shaffof, qulay va ochiq qilish. Biz tadbirkorlarni o'z bizneslarini rivojlantirishga e'tibor qaratishlari uchun ularni muntazam ishlardan ozod qilishga intilamiz.",
                        'ru' => 'Numera — аутсорсинговая бухгалтерская компания, предоставляющая полный спектр бухгалтерских, налоговых услуг для малого и среднего бизнеса в Узбекистане. Мы специализируемся на ведении бухгалтерского и налогового учёта, подготовке отчётности, сопровождении бухгалтерии бизнеса на маркетплейсах, а также предоставляем уникальные услуги по проверке контрагентов и оптимизации налоговой нагрузки. ',
                    ],
                ],
                'we_img' => [
                    'type' => 'image',
                    'translations' => [
                        'uz' => '../img/jpg/we02.jpg',
                        'ru' => '../img/jpg/we02.jpg',
                    ],
                ],

                'source_title' => [
                    'type' => 'text',
                    'translations' => [
                        'uz' => 'Biznes uchun foydali Autsorsing',
                        'ru' => 'Аутсорсинг с пользой для бизнеса',
                    ],
                ],

                'service_title' => [
                    'type' => 'text',
                    'translations' => [
                        'uz' => 'Har qanday <br> qulay usulda aloqada',
                        'ru' => 'На связи <br> любым удобным способом',
                    ],
                ],

                'service_text' => [
                    'type' => 'textArea',
                    'translations' => [
                        'uz' => "Jamoamiz bilan o'zaro aloqalar \"bir darcha\" tamoyili asosida tashkil etilgan - siz turli mutaxassislarga murojaat qilishingiz yoki o'zingizni qayta-qayta tushuntirishingiz shart emas. vazifa. Siz bilan butun jarayonni muvofiqlashtiradigan, muddatlarni nazorat qiluvchi va har qanday savollarga javob beradigan shaxsiy yordamchi ishlaydi. Siz u bilan xohlagan usulda bog'lanishingiz mumkin: telefon, messenjerlar yoki elektron pochta orqali - sizga eng qulay tarzda.",
                        'ru' => 'Взаимодействие с нашей командой организовано по принципу “одного окна” — вам не нужно обращаться к разным специалистам или повторно объяснять свою задачу. С вами работает персональный ассистент, который координирует весь процесс, контролирует сроки и отвечает на любые вопросы. Вы можете связаться с ним любым удобным способом: по телефону, через мессенджеры или по электронной почте — как вам удобно.',
                    ],
                ],

                'service_items' => [
                    'type' => 'matrix',
                    'translations' => [
                        'uz' => [
                            ['icon' => '../img/svg/service01.svg', 'text' => 'Service Desk'],
                            ['icon' => '../img/svg/service02.svg', 'text' => 'Messenjerlar'],
                            ['icon' => '../img/svg/service03.svg', 'text' => 'Telefon'],
                            ['icon' => '../img/svg/service04.svg', 'text' => 'Email'],
                        ],
                        'ru' => [
                            ['icon' => '../img/svg/service01.svg', 'text' => 'Service Desk'],
                            ['icon' => '../img/svg/service02.svg', 'text' => 'Мессенджеры'],
                            ['icon' => '../img/svg/service03.svg', 'text' => 'Телефон'],
                            ['icon' => '../img/svg/service04.svg', 'text' => 'Email'],
                        ]
                    ],
                    'options' => [
                        'uz' => [['key' => 'icon', 'value' => 'Icon'], ['key' => 'text', 'value' => 'Text']],
                        'ru' => [['key' => 'icon', 'value' => 'Иконка'], ['key' => 'text', 'value' => 'Текст']],
                    ],
                ],

                'service__bottom_title' => [
                    'type' => 'text',
                    'translations' => [
                        'uz' => 'Sizning biznesingiz uchun xizmatlarni tanlang',
                        'ru' => 'Подберите услуги для вашего бизнеса',
                    ],
                ],

                'service__bottom_text' => [
                    'type' => 'textArea',
                    'translations' => [
                        'uz' => "\"Biz har qanday miqyosdagi va profildagi kompaniyalarga haqiqiy foyda keltirish uchun ishlaymiz. Tajriba va professionallikka tayanib, biz eng yaxshi yechimlarni topishga yordam beramiz. Keling, siz uchun eng samarali nima bo'lishini birgalikda aniqlaymiz.\"",
                        'ru' => '"Мы работаем, чтобы приносить реальную пользу компаниям любого масштаба и профиля. Опираясь на опыт и профессионализм, мы помогаем находить лучшие решения. Давайте вместе определим, что будет наиболее эффективным именно для вас."',
                    ],
                ],

                'cta_title' => [
                    'type' => 'text',
                    'translations' => [
                        'uz' => 'Numera biznesingizga qanday yordam berishi mumkinligini bilmoqchimisiz?',
                        'ru' => 'Хотите узнать, как Numera может помочь вашему бизнесу?',
                    ],
                ],

                'cta_text' => [
                    'type' => 'textArea',
                    'translations' => [
                        'uz' => "Numera buxgalteriya hisobi va ish haqini hisoblashdan tortib soliqlarni optimallashtirish va hamkorlarni tekshirishgacha bo'lgan hamma narsani o'z zimmasiga oladi, biz onlayn ishlaymiz, oddiy tilda gaplashamiz, Biz sizning biznesingizga o'zimiznikidek g'amxo'rlik qilamiz.",
                        'ru' => 'Numera берёт на себя всё: от учёта и расчёта зарплат до налоговой оптимизации и проверки партнёров, работаем онлайн, говорим на простом языке, заботимся о вашем бизнесе, как о своём.',
                    ],
                ],

                'cta_btn' => [
                    'type' => 'text',
                    'translations' => [
                        'uz' => 'Bepul maslahat oling',
                        'ru' => 'Получить бесплатную консультацию',
                    ],
                ],

                'cta_btn_link' => [
                    'type' => 'text',
                    'translations' => [
                        'uz' => '/contact',
                        'ru' => '/contact',
                    ],
                ],

                'cta_item_title_0' => [
                    'type' => 'text',
                    'translations' => [
                        'uz' => 'Turli sohalarda chuqur ekspertiza',
                        'ru' => 'Глубокая экспертиза в разных сферах',
                    ],
                ],
                'cta_item_text_0' => [
                    'type' => 'textArea',
                    'translations' => [
                        'uz' => "Yakka tartibdagi tadbirkorlar, MChJlar, soddalashtirilgan soliq tizimi bo'yicha kompaniyalar, ishlab chiqarish, savdo va xizmat ko'rsatish tashkilotlari bilan ishlash tajribasi. Shu jumladan, bozorlarda ishlaydigan biznes bilan.",
                        'ru' => 'Опыт работы с ИП, ООО, компаниями на УСН, производственными, торговыми и сервисными организациями. В том числе — с бизнесом, работающим на маркетплейсах.',
                    ],
                ],

                'cta_item_title_1' => [
                    'type' => 'text',
                    'translations' => [
                        'uz' => 'Zamonaviy yondashuv',
                        'ru' => 'Современный подход',
                    ],
                ],
                'cta_item_text_1' => [
                    'type' => 'textArea',
                    'translations' => [
                        'uz' => "Jarayonlarni avtomatlashtirish, onlayn xizmatlar bilan ishlash, masofaviy xizmat ko'rsatish, elektron hujjatlar - qulay va tez.",
                        'ru' => 'Автоматизация процессов, работа с онлайн-сервисами, удалённое обслуживание, документы в электронном виде — удобно и быстро.',
                    ],
                ],

                'cta_item_title_2' => [
                    'type' => 'text',
                    'translations' => [
                        'uz' => 'Shaxsiy yondashuv',
                        'ru' => 'Индивидуальный подход',
                    ],
                ],
                'cta_item_text_2' => [
                    'type' => 'textArea',
                    'translations' => [
                        'uz' => "Har bir mijoz shaxsiy buxgalter va tushunarli hisobotlarni oladi. Biz xizmatlarni \"shtamplash\" bilan shug'ullanmaymiz - biz ularni sizning biznesingizga moslashtiramiz.",
                        'ru' => 'Каждый клиент получает персонального бухгалтера и понятную отчётность. Мы не «штампуем» услуги — мы адаптируем их под ваш бизнес.',
                    ],
                ],

                'cta_item_title_3' => [
                    'type' => 'text',
                    'translations' => [
                        'uz' => 'Arzon narxlar',
                        'ru' => 'Доступные цены',
                    ],
                ],
                'cta_item_text_3' => [
                    'type' => 'textArea',
                    'translations' => [
                        'uz' => "Biz O'zbekiston bozoridagi eng arzon autsorsing buxgalteriya kompaniyalaridan biri - shaffof va raqobatbardosh narx siyosati.",
                        'ru' => 'Мы одни из самых доступных аутсорсинговых бухгалтерских компаний на рынке Узбекистана — прозрачная и конкурентоспособная ценовая политика.',
                    ],
                ],

                'cta_item_title_4' => [
                    'type' => 'text',
                    'translations' => [
                        'uz' => 'Javobgarlik kafolati',
                        'ru' => 'Гарантия ответственности',
                    ],
                ],
                'cta_item_text_4' => [
                    'type' => 'textArea',
                    'translations' => [
                        'uz' => "Shartnomadan oldin hamkorlaringizni tahlil qiling: xavflar, ishonchlilik, shaffoflik. Har bir shartnomada ishonch hosil qilish uchun",
                        'ru' => 'Анализируем ваших партнёров до сделки: риски, благонадёжность, прозрачность. Чтобы вы были уверены в каждом контракте.',
                    ],
                ],
            ],

            'about' => [
                'buh__subtitle' => [
                    'type' => 'text',
                    'translations' => [
                        'uz' => 'Kompaniya haqida',
                        'ru' => 'О компании',
                    ],
                ],
                'buh__title' => [
                    'type' => 'textArea',
                    'translations' => [
                        'uz' => "Tashriflar va qog'ozsiz raqamli [buxgalteriya] hisobi",
                        'ru' => 'Цифровая [бухгалтерия] без визитов и бумаги',
                    ],
                ],
                'buh__list' => [
                    'type' => 'matrix',
                    'translations' => [
                        'uz' => [
                            ['icon' => '../img/svg/flash.svg', 'text' => 'Yangi avlod buxgalteriya hisobi'],
                            ['icon' => '../img/svg/charge.svg', 'text' => 'Biz muntazam ishlarni avtomatlashtiramiz - vaqtingizni tejaymiz'],
                            ['icon' => '../img/svg/danger.svg', 'text' => 'Biz aniq ishlaymiz. Biz halol hisobot beramiz'],
                            ['icon' => '../img/svg/crown.svg', 'text' => 'Siz uchun individual, shablonga muvofiq emas'],
                        ],
                        'ru' => [
                            ['icon' => '../img/svg/flash.svg', 'text' => 'Бухгалтерия нового поколения'],
                            ['icon' => '../img/svg/charge.svg', 'text' => 'Автоматизируем рутину — экономим ваше время'],
                            ['icon' => '../img/svg/danger.svg', 'text' => 'Работаем чётко. Отчитываемся честно'],
                            ['icon' => '../img/svg/crown.svg', 'text' => 'Индивидуально под вас, не по шаблону'],
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
                        'uz' => 'Biz buxgalteriya hisobini sodda va tushunarli qilish uchun shu yerdamiz. Halollik, professionallik va g`amxo`rlik bizning ishimizning asosidir.',
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
                            ['icon' => '../img/svg/shield.svg', 'text' => "Halollik va shaffoflik - biz yashirin to'lovlarsiz ishlaymiz va har doim mijoz bilan ochiqmiz."],
                            ['icon' => '../img/svg/octagon.svg', 'text' => "Professionallik va mas'uliyat - har bir Numera buxgalteri ishonchli mutaxassisdir."],
                            ['icon' => '../img/svg/done.svg', 'text' => "Mijozlarga yo'naltirilganlik - bu har bir biznesning vazifalariga individual yondashuv va jalb qilish."],
                            ['icon' => '../img/svg/lock.svg', 'text' => "Maxfiylik - ma'lumotlaringiz doimo xavfsiz."],
                            ['icon' => '../img/svg/hash.svg', 'text' => "Innovatsiya va samaradorlik - biz tez va aniq ishlash uchun zamonaviy texnologiyalardan foydalanamiz."],
                        ],
                        'ru' => [
                            ['icon' => '../img/svg/shield.svg', 'text' => 'Честность и прозрачность — мы работаем без скрытых платежей и всегда открыты перед клиентом.'],
                            ['icon' => '../img/svg/octagon.svg', 'text' => 'Профессионализм и ответственность — каждый бухгалтер Numera — это эксперт, которому можно доверять.'],
                            ['icon' => '../img/svg/done.svg', 'text' => 'Клиентоориентированность — индивидуальный подход и вовлечённость в задачи каждого бизнеса.'],
                            ['icon' => '../img/svg/lock.svg', 'text' => 'Конфиденциальность — ваши данные всегдa в безопасности.'],
                            ['icon' => '../img/svg/hash.svg', 'text' => 'Инновации и эффективность — мы используем современные технологии, чтобы работать быстро и точно.'],
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

            'services' => [
                'title' => [
                    'type' => 'text',
                    'translations' => [
                        'uz' => "Buxgalteriya hisobi nazorat ostida. O'sish - biz muntazam ishlarni o'z zimmamizga olamiz",
                        'ru' => 'Бухгалтерия под контролем. Растите — мы берём рутину на себя',
                    ],
                ],
                'text' => [
                    'type' => 'textArea',
                    'translations' => [
                        'uz' => "Biz kichik va o'rta biznes uchun keng qamrovli buxgalteriya xizmatlarini taqdim etamiz. Bizning barcha xizmatlarimiz sizni asosiy narsaga - biznesingiz o'sishiga e'tiboringizni qaratishga qaratilgan bo'lib, qog'oz ishlariga chalg'imasdan.",
                        'ru' => 'Мы предоставляем комплексное бухгалтерское сопровождение для малого и среднего бизнеса. Все наши услуги нацелены на то, чтобы вы могли сосредоточиться на главном — росте своего бизнеса, не отвлекаясь на бумажную рутину.',
                    ],
                ],

                'feed_number' => [
                    'type' => 'text',
                    'translations' => [
                        'uz' => '100+',
                        'ru' => '100+',
                    ],
                ],

                'feed_title' => [
                    'type' => 'text',
                    'translations' => [
                        'uz' => 'Sharhlar...',
                        'ru' => 'Отзывы...',
                    ],
                ],

                'feed_text' => [
                    'type' => 'textArea',
                    'translations' => [
                        'uz' => "Bizni butun mamlakat bo'ylab korxonalar tanlaydi!",
                        'ru' => 'Нас выбирают бизнесы по всей стране!',
                    ],
                ],

                'feed_link' => [
                    'type' => 'text',
                    'translations' => [
                        'uz' => '/cases',
                        'ru' => '/cases',
                    ],
                ],

                'feed_btns' => [
                    'type' => 'matrix',
                    'translations' => [
                        'uz' => [
                            ['text' => 'Maslahat olish', 'link' => '/index.html#support-form', 'class' => 'feed__top_content-yellow-btn yellow-button'],
                            ['text' => 'Kontaktlar', 'link' => '/contact.html', 'class' => 'feed__top_content-contact-btn button-transparent'],
                        ],
                        'ru' => [
                            ['text' => 'Получить консультацию', 'link' => 'index.html#support-form', 'class' => 'feed__top_content-yellow-btn yellow-button'],
                            ['text' => 'Контакты', 'link' => '/contact.html', 'class' => 'feed__top_content-contact-btn button-transparent'],
                        ],
                    ],
                    'options' => [
                        'uz' => [['key' => 'text', 'value' => 'Text'], ['key' => 'link', 'value' => 'Link'], ['key' => 'class', 'value' => 'Class']],
                        'ru' => [['key' => 'text', 'value' => 'Text'], ['key' => 'link', 'value' => 'Link'], ['key' => 'class', 'value' => 'Class']],
                    ],
                ],

                'feed_together_image_mb' => [
                    'type' => 'image',
                    'translations' => [
                        'uz' => '../img/png/bottom-mobile01.png',
                        'ru' => '../img/png/bottom-mobile01.png',
                    ],
                ],
                'feed_together_image' => [
                    'type' => 'image',
                    'translations' => [
                        'uz' => '../img/png/bottom01.png',
                        'ru' => '../img/png/bottom01.png',
                    ],
                ],

                'feed_together_title' => [
                    'type' => 'text',
                    'translations' => [
                        'uz' => "Birgalikda kuchliroq. Numera hamkorlik tarmog'ining bir qismiga aylaning",
                        'ru' => 'Вместе — сильнее. Станьте частью партнёрской сети Numera',
                    ],
                ],

                'feed_together_btn_link' => [
                    'type' => 'text',
                    'translations' => [
                        'uz' => 'https://t.me/numeraservices',
                        'ru' => 'https://t.me/numeraservices',
                    ],
                ],

                'feed_together_btn_text' => [
                    'type' => 'text',
                    'translations' => [
                        'uz' => "Hoziroq qo'shiling",
                        'ru' => 'Присоединиться сейчас',
                    ],
                ],

                'feed_video' => [
                    'type' => 'text',
                    'translations' => [
                        'uz' => '../img/jpg/video02.jpg',
                        'ru' => '../img/jpg/video02.jpg',
                    ],
                ],

                'advan_img_1' => [
                    'type' => 'image',
                    'translations' => [
                        'uz' => '../img/jpg/work01.jpg',
                        'ru' => '../img/jpg/work01.jpg',
                    ],
                ],
                'advan_img_2' => [
                    'type' => 'image',
                    'translations' => [
                        'uz' => '../img/jpg/work02.jpg',
                        'ru' => '../img/jpg/work02.jpg',
                    ],
                ],
                'advan_img_3' => [
                    'type' => 'image',
                    'translations' => [
                        'uz' => '../img/jpg/work03.jpg',
                        'ru' => '../img/jpg/work03.jpg',
                    ],
                ],

                'advan_title' => [
                    'type' => 'text',
                    'translations' => [
                        'uz' => 'Biz biznesning har qanday sohasi bilan ishlaymiz',
                        'ru' => 'Работаем с любой сферой бизнеса',
                    ],
                ],

                'advan_text' => [
                    'type' => 'textArea',
                    'translations' => [
                        'uz' => "Bizning shtabimizda katta tajribaga ega 300 dan ortiq mutaxassislar mavjud. Agar sizda g'ayrioddiy biznesingiz bo'lsa ham, bizda sizning sohangizda mutaxassis bor. Biz iqtisodiyotning turli sohalaridagi kompaniyalarga xizmat ko'rsatamiz.",
                        'ru' => 'В нашем штате более 300 экспертов с большим опытом. Даже если у вас необычный бизнес, у нас точно найдется специалист в вашей сфере. Мы предоставляем услуги компаниям из самых разных отраслей экономики.',
                    ],
                ],

                'advan_btn_text' => [
                    'type' => 'text',
                    'translations' => [
                        'uz' => "Mutaxassis bilan bog'laning",
                        'ru' => 'Связаться с экспертом',
                    ],
                ],

                'advan_btn_link' => [
                    'type' => 'text',
                    'translations' => [
                        'uz' => '/contact',
                        'ru' => '/contact',
                    ],
                ],

                'start_title' => [
                    'type' => 'text',
                    'translations' => [
                        'uz' => 'Bugun professionallar bilan ishlashni boshlang',
                        'ru' => 'Начните работать с профессионалами уже сегодня',
                    ],
                ],

                'start_text' => [
                    'type' => 'textArea',
                    'translations' => [
                        'uz' => "Buxgalteriya hisobi tartibini o'tmishda qoldirish vaqti keldi. Sizning biznesingiz haqida qayg'uradigan mutaxassislardan keng qamrovli xizmat oling. Siz kompaniyangizning o'sishi va rivojlanishi bilan xotirjam shug'ullanishingiz uchun barcha hisob-kitoblarni, hisobotlarni va muddatlarni nazorat qilishni o'z zimmamizga olamiz.",
                        'ru' => 'Пора оставить рутину бухучёта в прошлом. Получите комплексное обслуживание от специалистов, которые действительно заботятся о вашем бизнесе. Мы возьмём на себя все расчёты, отчётность и контроль за сроками, чтобы вы могли спокойно заниматься ростом и развитием вашей компании',
                    ],
                ],

                'start_btn_text' => [
                    'type' => 'text',
                    'translations' => [
                        'uz' => 'Maslahat oling',
                        'ru' => 'Получить консультацию',
                    ],
                ],

                'start_btn_link' => [
                    'type' => 'text',
                    'translations' => [
                        'uz' => '/contact',
                        'ru' => '/contact',
                    ],
                ],

                'latest_title' => [
                    'type' => 'text',
                    'translations' => [
                        'uz' => "Eng so'nggi yangiliklardan xabardor bo'ling.",
                        'ru' => 'Будьте в курсе последних новостей.',
                    ],
                ]

                // Add more settings for the services group as needed
            ],

            'cases' => [
                'title' => [
                    'type' => 'text',
                    'translations' => [
                        'uz' => "Siz o'yalmaydigan natijalar - faqat faxrlanish uchun",
                        'ru' => 'Результаты, за которые не нужно краснеть — только гордиться',
                    ],
                ],
                'text' => [
                    'type' => 'textArea',
                    'translations' => [
                        'uz' => "Bu yerda biz mijozlarimizning boshidan tizimli o'sishgacha bo'lgan hikoyalarini baham ko'ramiz. Haqiqiy holatlar va jonli sharhlar - Numera xizmati ishonch, aniqlik va xotirjamlik haqida",
                        'ru' => 'Здесь мы делимся историями наших клиентов — от старта до системного роста. Настоящие кейсы и живые отзывы — о доверии, точности и спокойствии, которое даёт сервис Numera',
                    ],
                ],

                'imgage' => [
                    'type' => 'image',
                    'translations' => [
                        'uz' => '../img/png/case-bg01.png',
                        'ru' => '../img/png/case-bg01.png',
                    ],
                ],

                'btn_text' => [
                    'type' => 'text',
                    'translations' => [
                        'uz' => 'Maslahat oling',
                        'ru' => 'Получить консультацию',
                    ],
                ],

                'btn_link' => [
                    'type' => 'text',
                    'translations' => [
                        'uz' => '/contact',
                        'ru' => '/contact',
                    ],
                ],

                'history_title' => [
                    'type' => 'text',
                    'translations' => [
                        'uz' => 'Haqiqiy hikoyalar',
                        'ru' => 'Реальные истории',
                    ],
                ],

                'want_title' => [
                    'type' => 'text',
                    'translations' => [
                        'uz' => 'Xuddi shu natijani xohlaysizmi?',
                        'ru' => 'Хотите такой же результат?',
                    ],
                ],

                'want_text' => [
                    'type' => 'textArea',
                    'translations' => [
                        'uz' => "Vaqt, asab va pulni tejang. Biz barcha hisob-kitoblar, hisobotlar va hisob-kitoblarni o'z zimmamizga olamiz, shunda siz biznesingizni xotirjam davom ettirishingiz mumkin. Birlamchi maslahat-bepul",
                        'ru' => 'Сэкономьте время, нервы и деньги. Мы возьмём на себя весь учёт, отчётность и расчёты, чтобы вы могли спокойно заниматься бизнесом. Первичная консультация — бесплатно',
                    ],
                ],

                'want_btn_text' => [
                    'type' => 'text',
                    'translations' => [
                        'uz' => 'Arizani qoldiring',
                        'ru' => 'Оставить заявку',
                    ],
                ],

                'want_btn_link' => [
                    'type' => 'text',
                    'translations' => [
                        'uz' => '/index.html#support-form',
                        'ru' => '/index.html#support-form',
                    ],
                ],

                'trust_title' => [
                    'type' => 'text',
                    'translations' => [
                        'uz' => 'Bizga ishonishadi',
                        'ru' => 'Нам доверяют',
                    ],
                ],
            ],

            'blog' => [
                'title' => [
                    'type' => 'text',
                    'translations' => [
                        'uz' => 'Numera blogi-tushunarli tilda buxgalteriya hisobi',
                        'ru' => 'Блог Numera — бухгалтерия понятным языком',
                    ],
                ],
                'text' => [
                    'type' => 'textArea',
                    'translations' => [
                        'uz' => "Soliqlar, hisobot berish, qonunchilikdagi o'zgarishlar va buxgalteriya hisobini optimallashtirish haqida halol, sodda va aniq. Biznesingizni ishonch bilan boshqarish uchun o'qing - taxminlar va keraksiz xavflarsiz",
                        'ru' => 'Честно, просто и по делу о налогах, отчётности, изменениях в законодательстве и оптимизации учёта. Читайте, чтобы управлять бизнесом уверенно — без догадок и лишнего риска',
                    ],
                ],

                'btn_text' => [
                    'type' => 'text',
                    'translations' => [
                        'uz' => "Obuna bo'lish",
                        'ru' => 'Подписаться',
                    ],
                ],

                'btn_link' => [
                    'type' => 'text',
                    'translations' => [
                        'uz' => 'https://www.instagram.com/numera_services?igsh=cGhybTM5aHJoZzJw" class="blog__button yellow-button',
                        'ru' => 'https://www.instagram.com/numera_services?igsh=cGhybTM5aHJoZzJw" class="blog__button yellow-button',
                    ],
                ],

                'below_text' => [
                    'type' => 'textArea',
                    'translations' => [
                        'uz' => "Soliqlar, hisobot berish, qonunchilikdagi o'zgarishlar va buxgalteriya hisobini optimallashtirish haqida halol, sodda va aniq. Biznesingizni ishonch bilan boshqarish uchun o'qing - taxminlar va keraksiz xavflarsiz",
                        'ru' => 'Честно, просто и по делу о налогах, отчётности, изменениях в законодательстве и оптимизации учёта. Читайте, чтобы управлять бизнесом уверенно — без догадок и лишнего риска',
                    ],
                ],

                'article_title' => [
                    'type' => 'text',
                    'translations' => [
                        'uz' => 'Yangi maqolalar:',
                        'ru' => 'Свежие статьи:',
                    ],
                ],

                'article_text' => [
                    'type' => 'textArea',
                    'translations' => [
                        'uz' => "Biznesingizni ishonchli boshqarishga yordam beradigan buxgalteriya hisobi, soliqlar, qonunlar va texnologiyalar haqida foydali materiallarni o'qing",
                        'ru' => 'Читайте полезные материалы о бухгалтерии, налогах, законах и технологиях, которые помогут вам управлять бизнесом увереннее',
                    ],
                ],

                'cta_title' => [
                    'type' => 'text',
                    'translations' => [
                        'uz' => 'Siz uyalmaydigan natijalar - faqat faxrlanish uchun',
                        'ru' => 'Результаты, за которые не нужно краснеть — только гордиться',
                    ],
                ],

                'cta_text' => [
                    'type' => 'textArea',
                    'translations' => [
                        'uz' => "Soliqlar, hisobot berish, qonunchilikdagi o'zgarishlar va buxgalteriya hisobini optimallashtirish haqida halol, sodda va aniq. Biznesingizni ishonch bilan boshqarish uchun o'qing - taxminlar va keraksiz xavflarsiz",
                        'ru' => 'Честно, просто и по делу о налогах, отчётности, изменениях в законодательстве и оптимизации учёта. Читайте, чтобы управлять бизнесом уверенно — без догадок и лишнего риска',
                    ],
                ],

                'cta_btn_text' => [
                    'type' => 'text',
                    'translations' => [
                        'uz' => 'Arizani qoldiring',
                        'ru' => 'Оставить заявку',
                    ],
                ],

                'cta_btn_link' => [
                    'type' => 'text',
                    'translations' => [
                        'uz' => '#form01',
                        'ru' => '#form01',
                    ],
                ],

                'fc_title' => [
                    'type' => 'text',
                    'translations' => [
                        'uz' => "Ha, bu aynan o'sha forma",
                        'ru' => 'Да, это та самая форма',
                    ],
                ],

                'fc_text' => [
                    'type' => 'textArea',
                    'translations' => [
                        'uz' => "Elektron pochtangizni qayerga qoldirasiz va buning evaziga siz haqiqatan ham ishlaydigan buxgalteriya maslahatlarini olasiz",
                        'ru' => 'Где вы оставляете email — а взамен получаете бухсоветы, которые реально работают',
                    ],
                ],

                'fc_cta_title' => [
                    'type' => 'text',
                    'translations' => [
                        'uz' => "Biz 1 ish kuni ichida javob beramiz",
                        'ru' => 'Ответим в течение 1 рабочего дня',
                    ],
                ],

                'fc_cta_text' => [
                    'type' => 'text',
                    'translations' => [
                        'uz' => "Stresssiz",
                        'ru' => 'Без стресса',
                    ],
                ],

                'fc_cta_image' => [
                    'type' => 'image',
                    'translations' => [
                        'uz' => '../img/png/form-content01.png',
                        'ru' => '../img/png/form-content01.png',
                    ],
                ],
                // Add more settings for the blog group as needed
            ],

            'contact' => [
                'title' => [
                    'type' => 'text',
                    'translations' => [
                        'uz' => "Biz bilan bog'laning",
                        'ru' => 'Свяжитесь с нами',
                    ],
                ],
                'text' => [
                    'type' => 'textArea',
                    'translations' => [
                        'uz' => "Buxgalteriya hisobi, xizmatlar yoki hamkorlik bo'yicha savollaringiz bormi? Biz yordam berishga tayyormiz - shunchaki yozing, qo'ng'iroq qiling yoki ofisimizga keling.",
                        'ru' => 'У вас есть вопросы по бухгалтерии, услугам или сотрудничеству? Мы готовы помочь — просто напишите, позвоните или приходите к нам в офис.',
                    ],
                ],

                'btn_text' => [
                    'type' => 'text',
                    'translations' => [
                        'uz' => "Bog'lanish",
                        'ru' => 'Связаться',
                    ],
                ],

                'btn_link' => [
                    'type' => 'text',
                    'translations' => [
                        'uz' => '/index.html#support-form',
                        'ru' => '/index.html#support-form',
                    ],
                ],

                'image' => [
                    'type' => 'image',
                    'translations' => [
                        'uz' => '../img/png/contactbg01.png',
                        'ru' => '../img/png/contactbg01.png',
                    ],
                ],

                'form_image' => [
                    'type' => 'image',
                    'translations' => [
                        'uz' => '../img/jpg/operatorbg01.jpg',
                        'ru' => '../img/jpg/operatorbg01.jpg',
                    ],
                ],
            ],

            'footer' => [
                'social_networks' => [
                    'type' => 'matrix',
                    'translations' => [
                        'uz' => [
                            ['icon' => '../img/svg/facebook.svg', 'link' => 'https://facebook.com', 'title' => 'Facebook'],
                            ['icon' => '../img/svg/instagram.svg', 'link' => 'https://instagram.com', 'title' => 'Instagram'],
                            ['icon' => '../img/svg/telegram.svg', 'link' => 'https://t.me/yourchannel', 'title' => 'Telegram'],
                        ],
                        'ru' => [
                            ['icon' => '../img/svg/facebook.svg', 'link' => 'https://facebook.com', 'title' => 'Facebook'],
                            ['icon' => '../img/svg/instagram.svg', 'link' => 'https://instagram.com', 'title' => 'Instagram'],
                            ['icon' => '../img/svg/telegram.svg', 'link' => 'https://t.me/yourchannel', 'title' => 'Telegram'],
                        ],
                    ],
                    'options' => [
                        'uz' => [
                            ['key' => 'icon', 'value' => 'Icon'],
                            ['key' => 'link', 'value' => 'Link'],
                            ['key' => 'title', 'value' => 'Name'],
                        ],
                        'ru' => [
                            ['key' => 'icon', 'value' => 'Icon'],
                            ['key' => 'link', 'value' => 'Link'],
                            ['key' => 'title', 'value' => 'Name'],
                        ],
                    ],
                ],
                'phones' => [
                    'type' => 'matrix',
                    'translations' => [
                        'uz' => [
                            ['link' => 'tel:+998712946062', 'title' => '+998 71 294 60 62'],
                            ['link' => 'tel:+998909332420', 'title' => '+998 90 933 24 20'],
                        ],
                        'ru' => [
                            ['link' => 'tel:+998712946062', 'title' => '+998 71 294 60 62'],
                            ['link' => 'tel:+998909332420', 'title' => '+998 90 933 24 20'],
                        ],
                    ],
                    'options' => [
                        'uz' => [
                            ['key' => 'link', 'value' => 'Link'],
                            ['key' => 'title', 'value' => 'Nomer'],
                        ],
                        'ru' => [
                            ['key' => 'link', 'value' => 'Link'],
                            ['key' => 'title', 'value' => 'Номер'],
                        ],
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
            ],

            'form' => [

            ],
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
