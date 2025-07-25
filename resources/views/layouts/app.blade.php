<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
                j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
                'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer','GTM-TCGMWR75');</script>
        <!-- End Google Tag Manager -->
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Numera</title>
        <link rel="stylesheet" href="css/style.css" />
        <link rel="icon" type="image/x-icon" href="../img/png/favicon.png" />
    </head>
    <body class="{{ session('theme') === 'light' ? 'light' : '' }}">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TCGMWR75"
                      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <header class="header {{ $headerClass ?? '' }}">
            <div class="header__container">
                <a href="{{ route('home') }}" class="header__logo">
                    <svg width="150" height="50" viewBox="0 0 150 50" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <rect width="150" height="50" fill="url(#pattern0_282_5493)"/>
                        <defs>
                        <pattern id="pattern0_282_5493" patternContentUnits="objectBoundingBox" width="1" height="1">
                        <use xlink:href="#image0_282_5493" transform="matrix(0.00266667 0 0 0.008 -0.22 -1.5)"/>
                        </pattern>
                        <image id="image0_282_5493" width="500" height="500" preserveAspectRatio="none" xlink:href="data:image/png;base64,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"/>
                        </defs>
                    </svg>
                </a>
                <nav class="header__nav active">
                    <ul class="header__nav_list">
                        <li class="header__nav_item active"><a href="{{ route('home') }}">{{ __('tr.home') }}</a></li>
                        <li class="header__nav_item"><a href="{{ route('about') }}">{{ __('tr.about') }}</a></li>
                        <li class="header__nav_item"><a href="{{ route('services') }}">{{ __('tr.services') }}</a></li>
                        <li class="header__nav_item"><a href="{{ route('cases') }}">{{ __('tr.reviews') }}</a></li>
                        <li class="header__nav_item"><a href="{{ route('blog') }}">{{ __('tr.blog') }}</a></li>
                        <li class="header__nav_item"><a href="{{ route('contact') }}">{{ __('tr.contact') }}</a></li>
                    </ul>
                    <div class="header__arrow">
                        <svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.66654 1L1.2558 5.41074C0.93036 5.73618 0.93036 6.26382 1.2558 6.58926L5.66654 11" stroke="white" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </div>
                </nav>
                <div class="header__lang">
                    <a href="/set-locale/ru" class="header__lang_item {{ app()->getLocale() === 'ru' ? 'active' : '' }}">
                        <img src="../img/svg/rus.svg" alt="#">
                        Ру
                    </a>
                    <a href="/set-locale/uz" class="header__lang_item {{ app()->getLocale() === 'uz' ? 'active' : '' }}">
                        <img src="../img/svg/uzb.svg" alt="#">
                        Uz
                    </a>
                </div>
                <div onclick="changeTheme()" class="header__theme">
                    <svg  width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="only-light" d="M12.4961 19.6992C16.6328 19.6992 19.9375 16.3945 19.9375 12.2695C19.9375 8.15625 16.6094 4.85156 12.4844 4.85156C8.37109 4.85156 5.08984 8.14453 5.08984 12.2695C5.08984 16.4062 8.38281 19.6992 12.4961 19.6992ZM12.5312 2.4375C13.1992 2.4375 13.7383 1.89844 13.7383 1.21875C13.7383 0.539062 13.1992 0 12.5312 0C11.8516 0 11.3125 0.539062 11.3125 1.21875C11.3125 1.89844 11.8516 2.4375 12.5312 2.4375ZM18.0508 3.92578C18.7188 3.92578 19.2578 3.38672 19.2578 2.70703C19.2578 2.02734 18.7188 1.48828 18.0508 1.48828C17.3711 1.48828 16.832 2.02734 16.832 2.70703C16.832 3.38672 17.3711 3.92578 18.0508 3.92578ZM22.1055 7.96875C22.7734 7.96875 23.3125 7.42969 23.3125 6.75C23.3125 6.07031 22.7734 5.53125 22.1055 5.53125C21.4258 5.53125 20.8867 6.07031 20.8867 6.75C20.8867 7.42969 21.4258 7.96875 22.1055 7.96875ZM23.5938 13.5C24.2617 13.5 24.8008 12.9609 24.8008 12.2812C24.8008 11.6016 24.2617 11.0625 23.5938 11.0625C22.9141 11.0625 22.375 11.6016 22.375 12.2812C22.375 12.9609 22.9141 13.5 23.5938 13.5ZM22.1055 19.0312C22.7734 19.0312 23.3125 18.4922 23.3125 17.8125C23.3125 17.1328 22.7734 16.5938 22.1055 16.5938C21.4258 16.5938 20.8867 17.1328 20.8867 17.8125C20.8867 18.4922 21.4258 19.0312 22.1055 19.0312ZM18.0508 23.0742C18.7188 23.0742 19.2578 22.5352 19.2578 21.8555C19.2578 21.1758 18.7188 20.6367 18.0508 20.6367C17.3711 20.6367 16.832 21.1758 16.832 21.8555C16.832 22.5352 17.3711 23.0742 18.0508 23.0742ZM12.5312 24.5625C13.1992 24.5625 13.7383 24.0117 13.7383 23.3438C13.7383 22.6641 13.1992 22.125 12.5312 22.125C11.8516 22.125 11.3125 22.6641 11.3125 23.3438C11.3125 24.0117 11.8516 24.5625 12.5312 24.5625ZM7.01172 23.0742C7.67969 23.0742 8.23047 22.5352 8.23047 21.8555C8.23047 21.1758 7.67969 20.6367 7.01172 20.6367C6.33203 20.6367 5.79297 21.1758 5.79297 21.8555C5.79297 22.5352 6.33203 23.0742 7.01172 23.0742ZM2.95703 19.0312C3.625 19.0312 4.17578 18.4922 4.17578 17.8125C4.17578 17.1328 3.625 16.5938 2.95703 16.5938C2.27734 16.5938 1.73828 17.1328 1.73828 17.8125C1.73828 18.4922 2.27734 19.0312 2.95703 19.0312ZM1.46875 13.5C2.14844 13.5 2.6875 12.9609 2.6875 12.2812C2.6875 11.6016 2.14844 11.0625 1.46875 11.0625C0.789062 11.0625 0.25 11.6016 0.25 12.2812C0.25 12.9609 0.789062 13.5 1.46875 13.5ZM2.95703 7.96875C3.625 7.96875 4.17578 7.42969 4.17578 6.75C4.17578 6.07031 3.625 5.53125 2.95703 5.53125C2.27734 5.53125 1.73828 6.07031 1.73828 6.75C1.73828 7.42969 2.27734 7.96875 2.95703 7.96875ZM7.01172 3.92578C7.67969 3.92578 8.23047 3.38672 8.23047 2.70703C8.23047 2.02734 7.67969 1.48828 7.01172 1.48828C6.33203 1.48828 5.79297 2.02734 5.79297 2.70703C5.79297 3.38672 6.33203 3.92578 7.01172 3.92578Z" fill="#FFC357"/>


                        <path class="only-dark" d="M12.7461 19.6992C16.8828 19.6992 20.1875 16.3945 20.1875 12.2695C20.1875 8.15625 16.8594 4.85156 12.7344 4.85156C8.62109 4.85156 5.33984 8.14453 5.33984 12.2695C5.33984 16.4062 8.63281 19.6992 12.7461 19.6992ZM12.7461 17.7422C9.71094 17.7422 7.28516 15.3281 7.28516 12.2695C7.28516 9.22266 9.69922 6.79688 12.7344 6.79688C15.7812 6.79688 18.2305 9.23438 18.2305 12.2695C18.2305 15.3164 15.8047 17.7422 12.7461 17.7422ZM12.7812 2.4375C13.4492 2.4375 13.9883 1.89844 13.9883 1.21875C13.9883 0.539062 13.4492 0 12.7812 0C12.1016 0 11.5625 0.539062 11.5625 1.21875C11.5625 1.89844 12.1016 2.4375 12.7812 2.4375ZM18.3008 3.92578C18.9688 3.92578 19.5078 3.38672 19.5078 2.70703C19.5078 2.02734 18.9688 1.48828 18.3008 1.48828C17.6211 1.48828 17.082 2.02734 17.082 2.70703C17.082 3.38672 17.6211 3.92578 18.3008 3.92578ZM22.3555 7.96875C23.0234 7.96875 23.5625 7.42969 23.5625 6.75C23.5625 6.07031 23.0234 5.53125 22.3555 5.53125C21.6758 5.53125 21.1367 6.07031 21.1367 6.75C21.1367 7.42969 21.6758 7.96875 22.3555 7.96875ZM23.8438 13.5C24.5117 13.5 25.0508 12.9609 25.0508 12.2812C25.0508 11.6016 24.5117 11.0625 23.8438 11.0625C23.1641 11.0625 22.625 11.6016 22.625 12.2812C22.625 12.9609 23.1641 13.5 23.8438 13.5ZM22.3555 19.0312C23.0234 19.0312 23.5625 18.4922 23.5625 17.8125C23.5625 17.1328 23.0234 16.5938 22.3555 16.5938C21.6758 16.5938 21.1367 17.1328 21.1367 17.8125C21.1367 18.4922 21.6758 19.0312 22.3555 19.0312ZM18.3008 23.0742C18.9688 23.0742 19.5078 22.5352 19.5078 21.8555C19.5078 21.1758 18.9688 20.6367 18.3008 20.6367C17.6211 20.6367 17.082 21.1758 17.082 21.8555C17.082 22.5352 17.6211 23.0742 18.3008 23.0742ZM12.7812 24.5625C13.4492 24.5625 13.9883 24.0117 13.9883 23.3438C13.9883 22.6641 13.4492 22.125 12.7812 22.125C12.1016 22.125 11.5625 22.6641 11.5625 23.3438C11.5625 24.0117 12.1016 24.5625 12.7812 24.5625ZM7.26172 23.0742C7.92969 23.0742 8.48047 22.5352 8.48047 21.8555C8.48047 21.1758 7.92969 20.6367 7.26172 20.6367C6.58203 20.6367 6.04297 21.1758 6.04297 21.8555C6.04297 22.5352 6.58203 23.0742 7.26172 23.0742ZM3.20703 19.0312C3.875 19.0312 4.42578 18.4922 4.42578 17.8125C4.42578 17.1328 3.875 16.5938 3.20703 16.5938C2.52734 16.5938 1.98828 17.1328 1.98828 17.8125C1.98828 18.4922 2.52734 19.0312 3.20703 19.0312ZM1.71875 13.5C2.39844 13.5 2.9375 12.9609 2.9375 12.2812C2.9375 11.6016 2.39844 11.0625 1.71875 11.0625C1.03906 11.0625 0.5 11.6016 0.5 12.2812C0.5 12.9609 1.03906 13.5 1.71875 13.5ZM3.20703 7.96875C3.875 7.96875 4.42578 7.42969 4.42578 6.75C4.42578 6.07031 3.875 5.53125 3.20703 5.53125C2.52734 5.53125 1.98828 6.07031 1.98828 6.75C1.98828 7.42969 2.52734 7.96875 3.20703 7.96875ZM7.26172 3.92578C7.92969 3.92578 8.48047 3.38672 8.48047 2.70703C8.48047 2.02734 7.92969 1.48828 7.26172 1.48828C6.58203 1.48828 6.04297 2.02734 6.04297 2.70703C6.04297 3.38672 6.58203 3.92578 7.26172 3.92578Z" fill="#FFB927"/>
                    </svg>
                </div>
                <a href="{{ $headerContact ?? '' }}" class="header__contact">{{__('tr.Talk to the accountant')}}</a>
            </div>
        </header>

        <main class="wrapper">
            @yield('content')
        </main>

        <footer class="footer">
            <div class="footer__container">
                <div class="footer__box">
                    <div class="footer__columns">
                        <div class="footer__columns_content">
                            <div class="footer__columns_content-1">
                                <ul class="footer__columns_list">
                                    <li>
                                        <div class="footer__columns_list-title" href="#">
                                            <img
                                                src="../img/svg/socials.svg"
                                            />
                                            <span>{{__('tr.Social networks')}}</span>
                                        </div>
                                    </li>
                                    @foreach($settings['footer.social_networks'] as $setting)
                                        <li>
                                            <a href="{{ $setting['link'] }}" target="_blank">
                                                <img
                                                    src="{{ $setting['icon'] }}"
                                                    alt="#"
                                                />
                                                <span>{{ $setting['title'] }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                   {{-- <li>
                                        <a href="https://t.me/husaynaliyev">
                                            <img
                                                src="../img/svg/telegram.svg"
                                                alt="#"
                                            />
                                            <span>Telegram</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            href="https://www.instagram.com/numera_services?igsh=cGhybTM5aHJoZzJw"
                                        >
                                            <img
                                                src="../img/svg/instagram.svg"
                                                alt="#"
                                            />
                                            <span>Instagram</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            href="https://www.facebook.com/share/192FkBJTiL/"
                                        >
                                            <img
                                                src="../img/svg/facebook.svg"
                                                alt="#"
                                            />
                                            <span>Facebook</span>
                                        </a>
                                    </li>--}}
                                </ul>
                                <ul class="footer__columns_list">
                                    <li>
                                        <div
                                            class="footer__columns_list-title"
                                        >
                                            <img
                                                src="../img/svg/footer-call.svg"
                                                alt="#"
                                            />
                                            <span>{{__('tr.Phones')}}</span>
                                        </div>
                                    </li>
                                    @foreach($settings['footer.phones'] as $phone)
                                        <li>
                                            <a href="{{ $phone['link'] }}">
                                                <span>{{ $phone['title'] }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                    {{--<li>
                                        <a href="tel:+998712946062">
                                            <span>+998 71 294 60 62</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="tel:+998909332420">
                                            <span>+998 90 933 24 20</span>
                                        </a>
                                    </li>--}}
                                </ul>
                                <div class="footer__columns_rights desktop-only">
                                    {{$settings['footer.rights']}}
                                </div>
                            </div>
                            <div class="footer__columns_content-2">
                                <ul class="footer__column_list">
                                    <li>
                                        <div class="footer__columns_list-title">
                                            <img src="../img/svg/clock.svg" alt="#"/>
                                            <span>{{__('tr.Work schedule:')}}</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <span>{{$settings['footer.work_schedule']}}</span>
                                        </div>
                                    </li>
                                </ul>
                                <ul class="footer__column_list">
                                    <li>
                                        <div
                                            class="footer__columns_list-title"
                                        >
                                            <img
                                                src="../img/svg/email.svg"
                                                alt="#"
                                            />
                                            <span>Email</span>
                                        </div>
                                    </li>
                                    @foreach($settings['footer.email__links'] as $email)
                                        <li>
                                            <a href="{{ $email['email_link'] }}" target="_blank">
                                                <span>{{ $email['email_name'] }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                    {{--<li>
                                        <a href="##">
                                            <span>info@numera.uz</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="##">
                                            <span
                                                >khusankhonaliev@gmail.com</span
                                            >
                                        </a>
                                    </li>--}}
                                </ul>
                                <ul class="footer__column_list">
                                    <li>
                                        <div
                                            class="footer__columns_list-title"
                                        >
                                            <img
                                                src="../img/svg/footer-location.svg"
                                                alt="#"
                                            />
                                            <span>{{__('tr.Office address')}}</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="footer__column_list-address">
                                            <span>{{$settings['footer.office_address']}}</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="footer__columns_rights mobile-only">
                                © 2022–2025 «Numera.uz»
                            </div>
                        </div>
                        <div class="footer__columns_map">
                            <iframe
                                src="{{$settings['footer.map']}}"
                                width="600"
                                height="450"
                                style="border: 0"
                                allowfullscreen=""
                                loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"
                            ></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <script>
            const settings = @json($settings);
            console.log(settings);
        </script>

        <script src="js/index.js"></script>
        <script>
            //CALCULATOR LOGIC
            let selectedMonths = 3; // по умолчанию 3 месяца

            function parseMonths(text) {
                if (text.includes("год")) return 12;
                let m = text.match(/\d+/);
                return m ? parseInt(m[0]) : 3;
            }

            function updatePrice() {
                // Получаем форму собственности
                let formaSobstElement = document.querySelector(".calc__inputs_box-input:first-child .dropdown-simple > a > span");
                let formaSobst = formaSobstElement ? formaSobstElement.textContent.trim() : "";

                // Получаем организационную форму
                let orgFormaElement = document.querySelector(".calc__inputs_box-input:nth-child(2) .dropdown-simple > a > span");
                let orgForma = orgFormaElement ? orgFormaElement.textContent.trim() : "";

                // Получаем вид деятельности
                let vidDeyatElement = document.querySelector(".calc__inputs_form .dropdown-simple > a > span");
                let vidDeyat = vidDeyatElement ? vidDeyatElement.textContent.trim() : "";

                // Получаем количество сотрудников
                let numberInputs = document.querySelectorAll(".calc__inputs_box--2 input[type=number]");
                let kolSotrudnikov = numberInputs.length > 0 ? parseInt(numberInputs[0].value) || 0 : 0;

                // Получаем оборот
                let oborot = numberInputs.length > 1 ? parseInt(numberInputs[1].value) || 0 : 0;

                let basePrice = 500000;

                // Коэффициент формы собственности
                let formaCoef = 1;
                switch (formaSobst) {
                    @foreach($settings['home.service__options_property'] as $item)
                        case "{{ $item['option'] }}":
                            formaCoef = {{ $item['cof'] }};
                            break;
                    @endforeach
                }

                // Коэффициент организационной формы
                let orgCoef = 1;
                switch (orgForma) {
                    @foreach($settings['home.service__options_from'] as $item)
                    case "{{ $item['option'] }}":
                        orgCoef = {{ $item['cof'] }};
                        break;
                    @endforeach
                }

                // Коэффициент вида деятельности
                let vidCoef = 1;
                switch (vidDeyat) {
                    @foreach($settings['home.service__options_main'] as $item)
                    case "{{ $item['option'] }}":
                        vidCoef = {{ $item['cof'] }};
                        break;
                    @endforeach
                }

                // Расчет цены за месяц
                let pricePerMonth = basePrice + kolSotrudnikov * 10000 + oborot * 0.05;
                pricePerMonth = pricePerMonth * formaCoef * orgCoef * vidCoef;

                // Общая цена
                let totalPrice = pricePerMonth * selectedMonths;

                // Форматирование цен
                let priceFormatted = pricePerMonth
                    .toFixed(0)
                    .replace(/\B(?=(\d{3})+(?!\d))/g, " ");
                let totalFormatted = totalPrice
                    .toFixed(0)
                    .replace(/\B(?=(\d{3})+(?!\d))/g, " ");

                // Обновление DOM элементов
                let priceSpan = document.querySelector(".calc__content_content-price span");
                if (priceSpan) {
                    priceSpan.textContent = priceFormatted + " {{$settings['home.text__content_currency']}}";
                }

                let priceP = document.querySelector(".calc__content_content-price p");
                if (priceP) {
                    priceP.textContent = "{{$settings['home.text__content']}}";
                }

                let priceDiv = document.querySelector(".calc__content_content-price div");
                if (priceDiv) {
                    priceDiv.textContent = totalFormatted + " {{$settings['home.text__content_sum']}} " +
                        (selectedMonths === 12 ? "год" : selectedMonths + " {{$settings['home.text__content_month']}}");
                }
            }

            function changeTheme() {
                fetch('{{ route('change-theme') }}')
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                    });
            }
        </script>

    </body>
</html>
