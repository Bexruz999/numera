@extends('layouts.app')

@section('title', 'Главная страница - Название компании')
@section('description', 'Описание главной страницы для SEO')
@section('keywords', 'ключевые слова, главная, услуги')

@push('styles')
    <!-- Специфичные стили только для главной страницы -->
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endpush

@section('content')
    <section class="contact">
        <div class="contact__container">
            <div class="contact__title title">{{$settings['contact.title']}}</div>
            <div class="contact__text text">
                {{$settings['contact.text']}}
            </div>
            <a href="#contact" class="contact__button yellow-button"
                >{{$settings['contact.btn_text']}}</a
            >
            <img
                src="{{$settings['contact.image']}}"
                alt="#"
                class="contact__bg01"
            />
            <img
                src="../img/png/contact-bg02.png"
                alt="#"
                class="contact__bg02"
            />
            <img
                src="../img/png/contact-bg03.png"
                alt="#"
                class="contact__bg03"
            />
        </div>
    </section>
    <section class="operator">
        <div class="operator__container">
            <div class="operator__form">
                <div id="contact" class="form__form form--form">
                    <div class="form__form_title title">
                        {{$settings['contact.operator__title']}}
                    </div>
                    <div class="form__form-text text">
                        {{$settings['contact.operator__subtitle']}}
                    </div>
                    <div class="form__form-box">
                        <input type="text" placeholder="{{$settings['home.input_name']}}" />
                        <input type="text" placeholder="{{$settings['home.input__family']}}" />
                    </div>
                    <input type="tel" placeholder="Номер телефона*" />
                    <a class="form__form_submit yellow-button" href="##"
                        >{{$settings['blog.form__ask']}}</a
                    >
                </div>
                <div class="operator__contacts">
                    <div class="operator__contacts_item">
                        <div class="operator__contact_socials">
                            <svg
                                width="40"
                                height="40"
                                viewBox="0 0 40 40"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M18.334 11.668L13.334 28.3346"
                                    stroke="white"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M26.666 11.668L21.666 28.3346"
                                    stroke="white"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M29.9993 16.668H11.666"
                                    stroke="white"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M28.3333 23.332H10"
                                    stroke="white"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M3.33398 19.9987C3.33398 12.142 3.33398 8.21358 5.77476 5.77281C8.21554 3.33203 12.1439 3.33203 20.0007 3.33203C27.8574 3.33203 31.7858 3.33203 34.2265 5.77281C36.6673 8.21358 36.6673 12.142 36.6673 19.9987C36.6673 27.8554 36.6673 31.7838 34.2265 34.2246C31.7858 36.6654 27.8574 36.6654 20.0007 36.6654C12.1439 36.6654 8.21554 36.6654 5.77476 34.2246C3.33398 31.7838 3.33398 27.8554 3.33398 19.9987Z"
                                    stroke="white"
                                    stroke-width="1.5"
                                />
                            </svg>
                            <span>{{__('tr.Social networks')}}</span>
                        </div>
                        <ul class="operator__contact_item-list">
                            @foreach($settings['footer.social_networks'] as $setting)
                                <li>
                                    <a href="{{ $setting['link'] }}">
                                        <img
                                            src="{{ $setting['icon'] }}"
                                            alt="#"
                                        />
                                        <span>{{ $setting['title'] }}</span>
                                    </a>
                                </li>
                            @endforeach
                         {{--   <a href="##">Telegram</a>
                            <a href="##">Instagram</a>
                            <a href="##">Facebook</a>--}}
                        </ul>
                    </div>
                    <div class="operator__contacts_item">
                        <div class="operator__contact_socials">
                            <svg
                                id="calling"
                                width="41"
                                height="40"
                                viewBox="0 0 41 40"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M23 3.3335C23 3.3335 26.8891 3.68705 31.8388 8.6368C36.7886 13.5865 37.1421 17.4756 37.1421 17.4756"
                                    stroke="white"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                />
                                <path
                                    d="M24.1777 9.22607C24.1777 9.22607 25.8277 9.69748 28.3025 12.1724C30.7774 14.6472 31.2488 16.2971 31.2488 16.2971"
                                    stroke="white"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                />
                                <path
                                    d="M25.6679 25.0453L25.1241 24.5288L25.1241 24.5288L25.6679 25.0453ZM26.4269 24.2462L26.9707 24.7627L26.9707 24.7627L26.4269 24.2462ZM30.4547 23.6872L30.0806 24.3372L30.0806 24.3372L30.4547 23.6872ZM33.6389 25.52L33.2647 26.17L33.6389 25.52ZM34.5361 31.2641L35.0799 31.7806L35.0799 31.7806L34.5361 31.2641ZM32.1685 33.7567L31.6247 33.2402L31.6247 33.2402L32.1685 33.7567ZM29.9605 34.9385L30.0341 35.6849L30.0341 35.6849L29.9605 34.9385ZM13.5256 27.4586L14.0694 26.9421L13.5256 27.4586ZM5.50481 11.6099L4.75589 11.6501L4.75589 11.6501L5.50481 11.6099ZM16.2959 14.1719L16.8397 14.6884L16.8397 14.6884L16.2959 14.1719ZM16.5571 9.4885L17.1695 9.05552L17.1695 9.05552L16.5571 9.4885ZM14.4554 6.51602L13.843 6.94901L13.843 6.94901L14.4554 6.51602ZM9.26908 6.0144L9.81288 6.53092L9.81288 6.53092L9.26908 6.0144ZM6.65308 8.76856L6.10929 8.25204L6.10929 8.25204L6.65308 8.76856ZM18.9385 21.7598L19.4823 21.2433L18.9385 21.7598ZM25.6679 25.0453L26.2117 25.5619L26.9707 24.7627L26.4269 24.2462L25.8831 23.7297L25.1241 24.5288L25.6679 25.0453ZM30.4547 23.6872L30.0806 24.3372L33.2647 26.17L33.6389 25.52L34.013 24.87L30.8288 23.0372L30.4547 23.6872ZM34.5361 31.2641L33.9923 30.7475L31.6247 33.2402L32.1685 33.7567L32.7123 34.2732L35.0799 31.7806L34.5361 31.2641ZM29.9605 34.9385L29.8868 34.1921C27.3655 34.441 20.9648 34.2016 14.0694 26.9421L13.5256 27.4586L12.9818 27.9752C20.2424 35.6192 27.124 35.9721 30.0341 35.6849L29.9605 34.9385ZM13.5256 27.4586L14.0694 26.9421C7.52351 20.0505 6.39487 14.1992 6.25373 11.5697L5.50481 11.6099L4.75589 11.6501C4.91525 14.619 6.17888 20.813 12.9818 27.9752L13.5256 27.4586ZM15.8178 14.6751L16.3616 15.1916L16.8397 14.6884L16.2959 14.1719L15.7521 13.6553L15.274 14.1586L15.8178 14.6751ZM16.5571 9.4885L17.1695 9.05552L15.0678 6.08304L14.4554 6.51602L13.843 6.94901L15.9447 9.92148L16.5571 9.4885ZM9.26908 6.0144L8.72529 5.49789L6.10929 8.25204L6.65308 8.76856L7.19688 9.28508L9.81288 6.53092L9.26908 6.0144ZM15.8178 14.6751C15.274 14.1586 15.2734 14.1593 15.2726 14.1601C15.2724 14.1603 15.2717 14.1611 15.2712 14.1616C15.2702 14.1626 15.2692 14.1637 15.2682 14.1648C15.2662 14.167 15.264 14.1694 15.2617 14.1719C15.2572 14.1769 15.2522 14.1824 15.2469 14.1885C15.2362 14.2008 15.2241 14.2154 15.2107 14.2323C15.1839 14.2661 15.1522 14.3095 15.1182 14.3626C15.05 14.4692 14.9728 14.6147 14.9063 14.8015C14.7717 15.1797 14.6898 15.7031 14.7892 16.3818C14.9858 17.7231 15.8824 19.6313 18.3947 22.2763L18.9385 21.7598L19.4823 21.2433C17.0697 18.7032 16.406 17.0691 16.2734 16.1643C16.2083 15.72 16.2696 15.4444 16.3195 15.3044C16.3452 15.2321 16.3704 15.1887 16.3817 15.1711C16.3874 15.1622 16.3896 15.1597 16.3869 15.1632C16.3855 15.1649 16.3829 15.1682 16.3787 15.1729C16.3767 15.1753 16.3742 15.178 16.3714 15.1812C16.37 15.1827 16.3684 15.1844 16.3668 15.1861C16.366 15.187 16.3652 15.1879 16.3643 15.1888C16.3639 15.1893 16.3632 15.19 16.363 15.1902C16.3623 15.1909 16.3616 15.1916 15.8178 14.6751ZM18.9385 21.7598L18.3947 22.2763C20.9026 24.9167 22.7257 25.8755 24.0298 26.0873C24.6935 26.1951 25.2097 26.1065 25.5842 25.9588C25.7683 25.8862 25.9109 25.8021 26.0146 25.7286C26.0664 25.6919 26.1083 25.6578 26.141 25.6292C26.1573 25.6149 26.1713 25.6019 26.1831 25.5906C26.1889 25.5849 26.1943 25.5797 26.199 25.5749C26.2014 25.5725 26.2036 25.5702 26.2057 25.568C26.2068 25.5669 26.2078 25.5659 26.2088 25.5648C26.2093 25.5643 26.21 25.5636 26.2103 25.5633C26.211 25.5626 26.2117 25.5619 25.6679 25.0453C25.1241 24.5288 25.1247 24.5281 25.1254 24.5274C25.1256 24.5272 25.1263 24.5265 25.1268 24.526C25.1276 24.5251 25.1285 24.5242 25.1293 24.5234C25.131 24.5216 25.1326 24.52 25.1341 24.5185C25.137 24.5155 25.1397 24.5129 25.142 24.5107C25.1466 24.5062 25.1499 24.5033 25.1518 24.5016C25.1556 24.4983 25.154 24.5 25.1468 24.5051C25.1326 24.5152 25.0958 24.539 25.0338 24.5634C24.916 24.6099 24.6734 24.6722 24.2703 24.6067C23.4411 24.472 21.8995 23.7881 19.4823 21.2433L18.9385 21.7598ZM14.4554 6.51602L15.0678 6.08304C13.5456 3.93005 10.5345 3.59315 8.72529 5.49789L9.26908 6.0144L9.81288 6.53092C10.9187 5.36668 12.822 5.50495 13.843 6.94901L14.4554 6.51602ZM5.50481 11.6099L6.25373 11.5697C6.20881 10.7327 6.57641 9.93832 7.19688 9.28508L6.65308 8.76856L6.10929 8.25204C5.28436 9.12054 4.68336 10.2988 4.75589 11.6501L5.50481 11.6099ZM32.1685 33.7567L31.6247 33.2402C31.1049 33.7875 30.5141 34.1302 29.8868 34.1921L29.9605 34.9385L30.0341 35.6849C31.1248 35.5772 32.0282 34.9935 32.7123 34.2732L32.1685 33.7567ZM16.2959 14.1719L16.8397 14.6884C18.2783 13.1738 18.3912 10.7834 17.1695 9.05552L16.5571 9.4885L15.9447 9.92148C16.7778 11.0998 16.6686 12.6904 15.7521 13.6553L16.2959 14.1719ZM33.6389 25.52L33.2647 26.17C34.9035 27.1132 35.2444 29.4294 33.9923 30.7475L34.5361 31.2641L35.0799 31.7806C37.0242 29.7337 36.4639 26.2806 34.013 24.87L33.6389 25.52ZM26.4269 24.2462L26.9707 24.7627C27.7759 23.915 29.0308 23.733 30.0806 24.3372L30.4547 23.6872L30.8288 23.0372C29.1933 22.0958 27.1767 22.3678 25.8831 23.7297L26.4269 24.2462Z"
                                    fill="white"
                                />
                            </svg>
                            <span>{{__('tr.Phones')}}</span>
                        </div>
                        <ul class="operator__contact_item-list">
                            @foreach($settings['footer.phones'] as $phone)
                                <li>
                                    <a href="{{ $phone['link'] }}">
                                        <span>{{ $phone['title'] }}</span>
                                    </a>
                                </li>
                            @endforeach
                            {{--<a href="##">+998 90 933 24 20</a>
                            <a href="##">+998 71 294 60 62</a>--}}
                        </ul>
                    </div>
                    <div class="operator__contacts_item">
                        <div class="operator__contact_socials">
                            <svg
                                width="40"
                                height="40"
                                viewBox="0 0 40 40"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M38.3333 16.666C38.3641 17.8778 38.3333 18.4231 38.3333 19.9993C38.3333 26.2847 38.3333 29.4274 36.3807 31.3801C34.4281 33.3327 31.2854 33.3327 25 33.3327H18.3333C12.0479 33.3327 8.90524 33.3327 6.95262 31.3801C5 29.4274 5 26.2847 5 19.9993C5 13.714 5 10.5713 6.95262 8.61864C8.90524 6.66602 12.0479 6.66602 18.3333 6.66602H23.3333"
                                    stroke="white"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                />
                                <path
                                    d="M11.668 13.334L15.2661 16.3325C18.3272 18.8833 19.8577 20.1588 21.668 20.1588C23.4782 20.1588 25.0087 18.8833 28.0698 16.3324"
                                    stroke="white"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                />
                                <circle
                                    cx="33.332"
                                    cy="8.33398"
                                    r="5"
                                    stroke="white"
                                    stroke-width="1.5"
                                />
                            </svg>
                            <span>Email</span>
                        </div>
                        <ul class="operator__contact_item-list">
                            @foreach($settings['footer.email'] as $email)
                                <li>
                                    <a href="{{ $email['email'] }}">
                                        <span>{{ $email['email'] }}</span>
                                    </a>
                                </li>
                            @endforeach
                            {{--<a href="##">info@numera.uz</a>
                            <a href="##">khusankhonaliev@gmail.com</a>--}}
                        </ul>
                    </div>
                </div>
            </div>
            <div class="operator__bg">
                <img src="{{$settings['contact.form_image']}}" alt="#" />
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <!-- Специфичные скрипты только для главной страницы -->
@endpush
