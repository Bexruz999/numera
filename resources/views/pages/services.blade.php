@extends('layouts.app')

@section('title', 'Главная страница - Название компании')
@section('description', 'Описание главной страницы для SEO')
@section('keywords', 'ключевые слова, главная, услуги')

@push('styles')
    <!-- Специфичные стили только для главной страницы -->
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endpush


@section('content')
    <section class="feed">
        <div class="feed__container">
            <div class="feed__top">
                <div class="feed__top_rate">
                    <div class="feed__top_rate-stars">
                        <img src="../img/svg/star.svg" alt="#" />
                        <img src="../img/svg/star.svg" alt="#" />
                        <img src="../img/svg/star.svg" alt="#" />
                        <img src="../img/svg/star.svg" alt="#" />
                        <img src="../img/svg/half-star.svg" alt="#" />
                    </div>
                    <div class="feed__top_rate-num">{{ $settings['services.feed_number']}}</div>
                    <div class="feed__top_rate-title">{{ $settings['services.feed_title']}}</div>
                    <div class="feed__top_rate-text">{{ $settings['services.feed_text']}}</div>
                    <div class="feed__top_rate-btn">
                        <svg
                            width="60"
                            height="60"
                            viewBox="0 0 60 60"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <circle
                                cx="30"
                                cy="30"
                                r="29.5"
                                stroke="white"
                            />
                            <path
                                d="M26.5695 22.487L37.2999 22.487L37.2999 33.2173"
                                stroke="white"
                                stroke-width="1.5"
                                stroke-miterlimit="10"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                            <path
                                d="M22.2746 37.513L37.1504 22.6373"
                                stroke="white"
                                stroke-width="1.5"
                                stroke-miterlimit="10"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                        </svg>
                    </div>
                </div>
                <div class="feed__top_content">
                    <div class="feed__top_content-numera numera">
                        #services
                    </div>
                    <div class="feed__top_content-title title">
                        {{ $settings['services.title']}}
                    </div>
                    <div class="feed__top_content-text text">
                        {{ $settings['services.text']}}
                    </div>
                    <div class="feed__top_content-buttons">
                        @foreach($settings['services.feed_btns'] as $button)
                            <a
                                href="{{ $button['link'] }}"
                                class="{{ $button['class'] }}"
                            >
                                {{ $button['text'] }}
                            </a>
                        @endforeach
                  {{--      <a
                            href="index.html#support-form"
                            class="feed__top_content-yellow-btn yellow-button"
                            >{{ $settings['services.buh__button'] }}</a
                        >
                        <a
                            href="/contact.html"
                            class="feed__top_content-contact-btn button-transparent"
                            >Контакты</a
                        >--}}
                    </div>
                </div>
            </div>
            <div class="feed__bottom">
                <div class="feed__bottom_together">
                    <div class="feed__bottom_together-title">
                        {{ $settings['services.feed_together_title']}}
                    </div>
                    <a href="{{ $settings['services.feed_together_btn_link']}}" class="feed__bottom_together-button"
                        >{{ $settings['services.feed_together_btn_text']}}</a
                    >
                    <img
                        class="desktop-only"
                        src="{{ $settings['services.feed_together_image']}}"
                        alt="#"
                    />
                    <img
                        class="mobile-only"
                        src="{{ $settings['services.feed_together_image_mb']}}"
                        alt=""
                    />
                    <svg
                        width="22"
                        height="22"
                        viewBox="0 0 22 22"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <g clip-path="url(#clip0_2007_5922)">
                            <path
                                d="M7.32862 2.3797L20.0464 2.3797L20.0464 15.0975"
                                stroke="white"
                                stroke-width="1.5"
                                stroke-miterlimit="10"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                            <path
                                d="M2.23719 20.1888L19.8682 2.5578"
                                stroke="white"
                                stroke-width="1.5"
                                stroke-miterlimit="10"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                        </g>
                        <defs>
                            <clipPath id="clip0_2007_5922">
                                <rect
                                    width="22"
                                    height="22"
                                    fill="white"
                                />
                            </clipPath>
                        </defs>
                    </svg>
                </div>
                <div class="feed__bottom_video">
                    <img src="{{ $settings['services.feed_video']}}" alt="#" />
                </div>
            </div>
        </div>
    </section>
    <section class="advan">
        <div class="advan__container">
            <div class="advan__grid_swiper swiper-container">
                <div class="advan__grid swiper-wrapper">
                    @for($i = 0; $i < count($frames); $i = $i+2)
                        <div class="advan__grid_slide swiper-slide">
                            <div class="advan__grid_card">
                                <div class="advan__grid_icon">
                                    <img src="{{ asset($frames[$i]->img) }}" alt="#"/>
                                </div>
                                <div class="advan__grid_title title">
                                    {{ $frames[$i]->translate($locale)?->name }}
                                </div>
                                <div class="advan__grid_subtitle">
                                    {{ $frames[$i]->translate($locale)?->title }}
                                </div>
                                <div class="advan__grid_text text">
                                    {{ $frames[$i]->translate($locale)?->text }}
                                </div>
                            </div>
                            @if(array_key_exists($i + 1, $frames->keys()->all()))
                                <div class="advan__grid_card">
                                    <div class="advan__grid_icon">
                                        <img src="{{ asset($frames[$i+1]->img) }}" alt="#"/>
                                    </div>
                                    <div class="advan__grid_title title">
                                        {{ $frames[$i + 1]->translate($locale)?->name }}
                                    </div>
                                    <div class="advan__grid_subtitle">
                                        {{ $frames[$i + 1]->translate($locale)?->title }}
                                    </div>
                                    <div class="advan__grid_text text">
                                        {{ $frames[$i + 1]->translate($locale)?->text }}
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endfor
                    {{--<div class="advan__grid_slide swiper-slide">
                        <div class="advan__grid_card">
                            <div class="advan__grid_icon">
                                <img
                                    src="../img/svg/card.svg"
                                    alt="#"
                                />
                            </div>
                            <div class="advan__grid_title title">
                                Ведение бухгалтерии
                            </div>
                            <div class="advan__grid_subtitle">
                                Полное ведение бухгалтерии
                            </div>
                            <div class="advan__grid_text text">
                                Мы берём на себя всё: от ввода первичных
                                документов до составления бухгалтерской
                                и налоговой отчётности. Независимо от
                                системы налогообложения и масштаба
                                бизнеса — мы обеспечим порядок в ваших
                                цифрах.
                            </div>
                        </div>
                        <div class="advan__grid_card">
                            <div class="advan__grid_icon">
                                <img
                                    src="../img/png/user-tick.png"
                                    alt="#"
                                />
                            </div>
                            <div class="advan__grid_title title">
                                Консультации
                            </div>
                            <div class="advan__grid_subtitle">
                                Полное ведение бухгалтерии
                            </div>
                            <div class="advan__grid_text text">
                                Нужна помощь в расчётах, оформлении
                                документов или переходе на другую
                                систему налогообложения? Мы
                                проконсультируем вас по всем вопросам
                                бухгалтерии и налогов.
                            </div>
                        </div>
                    </div>
                    <div class="advan__grid_slide swiper-slide">
                        <div class="advan__grid_card">
                            <div class="advan__grid_icon">
                                <img
                                    src="../img/svg/search.png"
                                    alt="#"
                                />
                            </div>
                            <div class="advan__grid_title title">
                                Сдача отчётности
                            </div>
                            <div class="advan__grid_subtitle">
                                Подготовка и сдача отчётности
                            </div>
                            <div class="advan__grid_text text">
                                Забудьте о сроках и штрафах — мы точно и
                                вовремя сдадим всю необходимую
                                налоговую, статистическую и внебюджетную
                                отчётность за вас.
                            </div>
                        </div>
                        <div class="advan__grid_card">
                            <div class="advan__grid_icon">
                                <svg
                                    width="61"
                                    height="60"
                                    viewBox="0 0 61 60"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M20.4502 30L26.4752 36.05L38.5502 23.95"
                                        stroke="#FFC357"
                                        stroke-width="3"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M26.3752 6.12505C28.1002 4.65005 30.9252 4.65005 32.6752 6.12505L36.6252 9.52505C37.3752 10.175 38.7752 10.7 39.7752 10.7H44.0252C46.6752 10.7 48.8502 12.875 48.8502 15.525V19.775C48.8502 20.75 49.3752 22.175 50.0252 22.925L53.4252 26.875C54.9002 28.6 54.9002 31.4251 53.4252 33.1751L50.0252 37.1251C49.3752 37.8751 48.8502 39.2751 48.8502 40.2751V44.525C48.8502 47.175 46.6752 49.35 44.0252 49.35H39.7752C38.8002 49.35 37.3752 49.875 36.6252 50.525L32.6752 53.925C30.9502 55.4 28.1252 55.4 26.3752 53.925L22.4252 50.525C21.6752 49.875 20.2752 49.35 19.2752 49.35H14.9502C12.3002 49.35 10.1252 47.175 10.1252 44.525V40.2501C10.1252 39.2751 9.60019 37.8751 8.97519 37.1251L5.6002 33.1501C4.1502 31.4251 4.1502 28.6251 5.6002 26.9001L8.97519 22.925C9.60019 22.175 10.1252 20.775 10.1252 19.8V15.5C10.1252 12.85 12.3002 10.675 14.9502 10.675H19.2752C20.2502 10.675 21.6752 10.15 22.4252 9.50005L26.3752 6.12505Z"
                                        stroke="#FFC357"
                                        stroke-width="3"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                </svg>
                            </div>
                            <div class="advan__grid_title title">
                                Аутсорсинг «под ключ»
                            </div>
                            <div class="advan__grid_subtitle">
                                Полное ведение бухгалтерии
                            </div>
                            <div class="advan__grid_text text">
                                Передайте бухгалтерию под наш полный
                                контроль. Мы станем вашим удалённым
                                финансовым отделом, полностью
                                сопровождая бизнес от начала до конца.
                            </div>
                        </div>
                    </div>
                    <div class="advan__grid_slide swiper-slide">
                        <div class="advan__grid_card">
                            <div class="advan__grid_icon">
                                <img
                                    src="../img/svg/card.svg"
                                    alt="#"
                                />
                            </div>
                            <div class="advan__grid_title title">
                                Восстановление бухгалтерии
                            </div>
                            <div class="advan__grid_subtitle">
                                Когда учёт запущен — мы всё вернём в
                                норму
                            </div>
                            <div class="advan__grid_text text">
                                Вернём в порядок все документы и отчёты
                                — даже если учёт не вёлся годами. Без
                                паники, без штрафов, с результатом
                            </div>
                        </div>
                        <div class="advan__grid_card">
                            <div class="advan__grid_icon">
                                <img
                                    src="../img/png/user-tick.png"
                                    alt="#"
                                />
                            </div>
                            <div class="advan__grid_title title">
                                Экспресс аудит бухгалтерии
                            </div>
                            <div class="advan__grid_subtitle">
                                Быстрая проверка — максимум пользы
                            </div>
                            <div class="advan__grid_text text">
                                Быстрая и точная проверка: найдём слабые
                                места, предотвратим ошибки и
                                оптимизируем учёт
                            </div>
                        </div>
                    </div>
                    <div class="advan__grid_slide swiper-slide">
                        <div class="advan__grid_card">
                            <div class="advan__grid_icon">
                                <img
                                    src="../img/svg/search.png"
                                    alt="#"
                                />
                            </div>
                            <div class="advan__grid_title title">
                                Корректировка и пересдача отчетности
                            </div>
                            <div class="advan__grid_subtitle">
                                Исправим старые ошибки без новых проблем
                            </div>
                            <div class="advan__grid_text text">
                                Нашли ошибки в старых отчётах? Исправим
                                и пересдадим по всем правилам — в срок и
                                без последствий
                            </div>
                        </div>
                        <div class="advan__grid_card">
                            <div class="advan__grid_icon">
                                <svg
                                    width="61"
                                    height="60"
                                    viewBox="0 0 61 60"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M20.4502 30L26.4752 36.05L38.5502 23.95"
                                        stroke="#FFC357"
                                        stroke-width="3"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M26.3752 6.12505C28.1002 4.65005 30.9252 4.65005 32.6752 6.12505L36.6252 9.52505C37.3752 10.175 38.7752 10.7 39.7752 10.7H44.0252C46.6752 10.7 48.8502 12.875 48.8502 15.525V19.775C48.8502 20.75 49.3752 22.175 50.0252 22.925L53.4252 26.875C54.9002 28.6 54.9002 31.4251 53.4252 33.1751L50.0252 37.1251C49.3752 37.8751 48.8502 39.2751 48.8502 40.2751V44.525C48.8502 47.175 46.6752 49.35 44.0252 49.35H39.7752C38.8002 49.35 37.3752 49.875 36.6252 50.525L32.6752 53.925C30.9502 55.4 28.1252 55.4 26.3752 53.925L22.4252 50.525C21.6752 49.875 20.2752 49.35 19.2752 49.35H14.9502C12.3002 49.35 10.1252 47.175 10.1252 44.525V40.2501C10.1252 39.2751 9.60019 37.8751 8.97519 37.1251L5.6002 33.1501C4.1502 31.4251 4.1502 28.6251 5.6002 26.9001L8.97519 22.925C9.60019 22.175 10.1252 20.775 10.1252 19.8V15.5C10.1252 12.85 12.3002 10.675 14.9502 10.675H19.2752C20.2502 10.675 21.6752 10.15 22.4252 9.50005L26.3752 6.12505Z"
                                        stroke="#FFC357"
                                        stroke-width="3"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                </svg>
                            </div>
                            <div class="advan__grid_title title">
                                Снижение текущих затрат на бухгалтерию
                            </div>
                            <div class="advan__grid_subtitle">
                                Больше эффективности — меньше расходов
                            </div>
                            <div class="advan__grid_text text">
                                Оптимизируем бухгалтерские процессы и
                                расходы. Вы платите только за нужное —
                                без лишнего
                            </div>
                        </div>
                    </div>
                    <div class="advan__grid_slide swiper-slide">
                        <div class="advan__grid_card">
                            <div class="advan__grid_icon">
                                <img
                                    src="../img/svg/card.svg"
                                    alt="#"
                                />
                            </div>
                            <div class="advan__grid_title title">
                                Разработка учетной политики
                            </div>
                            <div class="advan__grid_subtitle">
                                Основа вашего учёта — оформим грамотно
                            </div>
                            <div class="advan__grid_text text">
                                Создадим систему учёта под ваш бизнес.
                                Формализуем подходы и обеспечим
                                соответствие требованиям
                                законодательства
                            </div>
                        </div>
                        <div class="advan__grid_card">
                            <div class="advan__grid_icon">
                                <img
                                    src="../img/svg/search.png"
                                    alt="#"
                                />
                            </div>
                            <div class="advan__grid_title title">
                                Расчет зарплаты и кадровый учет
                            </div>
                            <div class="advan__grid_subtitle">
                                Всё по людям: ЗП, отчёты, приказы
                            </div>
                            <div class="advan__grid_text text">
                                Своевременные начисления, отчётность и
                                ведение кадров — от приёма до увольнения
                            </div>
                        </div>
                    </div>
                    <div class="advan__grid_slide swiper-slide">
                        <div class="advan__grid_card">
                            <div class="advan__grid_icon">
                                <img
                                    src="../img/svg/search.png"
                                    alt="#"
                                />
                            </div>
                            <div class="advan__grid_title title">
                                Инхаус бухгалтер
                            </div>
                            <div class="advan__grid_subtitle">
                                Постоянный специалист в вашей команде
                            </div>
                            <div class="advan__grid_text text">
                                Выделим бухгалтера под ваш бизнес.
                                Постоянная поддержка, быстрые ответы и
                                полное погружение в процессы
                            </div>
                        </div>
                        <div class="advan__grid_card">
                            <div class="advan__grid_icon">
                                <svg
                                    width="61"
                                    height="60"
                                    viewBox="0 0 61 60"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M20.4502 30L26.4752 36.05L38.5502 23.95"
                                        stroke="#FFC357"
                                        stroke-width="3"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M26.3752 6.12505C28.1002 4.65005 30.9252 4.65005 32.6752 6.12505L36.6252 9.52505C37.3752 10.175 38.7752 10.7 39.7752 10.7H44.0252C46.6752 10.7 48.8502 12.875 48.8502 15.525V19.775C48.8502 20.75 49.3752 22.175 50.0252 22.925L53.4252 26.875C54.9002 28.6 54.9002 31.4251 53.4252 33.1751L50.0252 37.1251C49.3752 37.8751 48.8502 39.2751 48.8502 40.2751V44.525C48.8502 47.175 46.6752 49.35 44.0252 49.35H39.7752C38.8002 49.35 37.3752 49.875 36.6252 50.525L32.6752 53.925C30.9502 55.4 28.1252 55.4 26.3752 53.925L22.4252 50.525C21.6752 49.875 20.2752 49.35 19.2752 49.35H14.9502C12.3002 49.35 10.1252 47.175 10.1252 44.525V40.2501C10.1252 39.2751 9.60019 37.8751 8.97519 37.1251L5.6002 33.1501C4.1502 31.4251 4.1502 28.6251 5.6002 26.9001L8.97519 22.925C9.60019 22.175 10.1252 20.775 10.1252 19.8V15.5C10.1252 12.85 12.3002 10.675 14.9502 10.675H19.2752C20.2502 10.675 21.6752 10.15 22.4252 9.50005L26.3752 6.12505Z"
                                        stroke="#FFC357"
                                        stroke-width="3"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                </svg>
                            </div>
                            <div class="advan__grid_title title">
                                Кадровый аудит
                            </div>
                            <div class="advan__grid_subtitle">
                                Проверим, насколько чист ваш
                                HR-документооборот
                            </div>
                            <div class="advan__grid_text text">
                                Анализ, структура, порядок: проверим
                                кадровые документы и устраним риски
                            </div>
                        </div>
                    </div>
                    <div class="advan__grid_slide swiper-slide">
                        <div class="advan__grid_card">
                            <div class="advan__grid_icon">
                                <img
                                    src="../img/svg/card.svg"
                                    alt="#"
                                />
                            </div>
                            <div class="advan__grid_title title">
                                Получение ПИНФЛ
                            </div>
                            <div class="advan__grid_subtitle">
                                Быстрый ПИНФЛ — без бумажной волокиты
                            </div>
                            <div class="advan__grid_text text">
                                Быстро оформим ПИНФЛ для сотрудников или
                                физических лиц — без очередей и
                                бюрократии
                            </div>
                        </div>
                        <div class="advan__grid_card">
                            <div class="advan__grid_icon">
                                <img
                                    src="../img/png/user-tick.png"
                                    alt="#"
                                />
                            </div>
                            <div class="advan__grid_title title">
                                Регистация ИП СП ЧП
                            </div>
                            <div class="advan__grid_subtitle">
                                Старт бизнеса — без лишних шагов
                            </div>
                            <div class="advan__grid_text text">
                                Подготовим и подадим все документы —
                                быстро, правильно и с учётом ваших задач
                            </div>
                        </div>
                    </div>
                    <div class="advan__grid_slide swiper-slide">
                        <div class="advan__grid_card">
                            <div class="advan__grid_icon">
                                <img
                                    src="../img/svg/search.png"
                                    alt="#"
                                />
                            </div>
                            <div class="advan__grid_title title">
                                Налоговая консультация
                            </div>
                            <div class="advan__grid_subtitle">
                                Понимание налогов начинается с вопроса
                            </div>
                            <div class="advan__grid_text text">
                                Ответим на вопросы по налогам,
                                отчётности, режимам. Профессионально,
                                понятно, по делу
                            </div>
                        </div>
                        <div class="advan__grid_card">
                            <div class="advan__grid_icon">
                                <svg
                                    width="61"
                                    height="60"
                                    viewBox="0 0 61 60"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M20.4502 30L26.4752 36.05L38.5502 23.95"
                                        stroke="#FFC357"
                                        stroke-width="3"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M26.3752 6.12505C28.1002 4.65005 30.9252 4.65005 32.6752 6.12505L36.6252 9.52505C37.3752 10.175 38.7752 10.7 39.7752 10.7H44.0252C46.6752 10.7 48.8502 12.875 48.8502 15.525V19.775C48.8502 20.75 49.3752 22.175 50.0252 22.925L53.4252 26.875C54.9002 28.6 54.9002 31.4251 53.4252 33.1751L50.0252 37.1251C49.3752 37.8751 48.8502 39.2751 48.8502 40.2751V44.525C48.8502 47.175 46.6752 49.35 44.0252 49.35H39.7752C38.8002 49.35 37.3752 49.875 36.6252 50.525L32.6752 53.925C30.9502 55.4 28.1252 55.4 26.3752 53.925L22.4252 50.525C21.6752 49.875 20.2752 49.35 19.2752 49.35H14.9502C12.3002 49.35 10.1252 47.175 10.1252 44.525V40.2501C10.1252 39.2751 9.60019 37.8751 8.97519 37.1251L5.6002 33.1501C4.1502 31.4251 4.1502 28.6251 5.6002 26.9001L8.97519 22.925C9.60019 22.175 10.1252 20.775 10.1252 19.8V15.5C10.1252 12.85 12.3002 10.675 14.9502 10.675H19.2752C20.2502 10.675 21.6752 10.15 22.4252 9.50005L26.3752 6.12505Z"
                                        stroke="#FFC357"
                                        stroke-width="3"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                </svg>
                            </div>
                            <div class="advan__grid_title title">
                                Ликвидация ИП СПЧП
                            </div>
                            <div class="advan__grid_subtitle">
                                Закрытие ИП — законно, точно, без
                                стресса
                            </div>
                            <div class="advan__grid_text text">
                                Закроем предпринимательскую деятельность
                                без штрафов и ошибок. Всё под контролем
                            </div>
                        </div>
                    </div>
                    <div class="advan__grid_slide swiper-slide">
                        <div class="advan__grid_card">
                            <div class="advan__grid_icon">
                                <img
                                    src="../img/svg/card.svg"
                                    alt="#"
                                />
                            </div>
                            <div class="advan__grid_title title">
                                Проверка контрагентов
                            </div>
                            <div class="advan__grid_subtitle">
                                Безопасность — до подписания договора
                            </div>
                            <div class="advan__grid_text text">
                                Проведём юридическую и финансовую
                                проверку ваших партнёров — до подписания
                                договора
                            </div>
                        </div>
                        <div class="advan__grid_card">
                            <div class="advan__grid_icon">
                                <img
                                    src="../img/png/user-tick.png"
                                    alt="#"
                                />
                            </div>
                            <div class="advan__grid_title title">
                                Услуга возврата НДС
                            </div>
                            <div class="advan__grid_subtitle">
                                Вернём то, что должно вернуться — НДС
                            </div>
                            <div class="advan__grid_text text">
                                Подготовим документы и сопроводим
                                процесс возврата НДС — с учётом всех
                                требований
                            </div>
                        </div>
                    </div>
                    <div class="advan__grid_slide swiper-slide">
                        <div class="advan__grid_card">
                            <div class="advan__grid_icon">
                                <img
                                    src="../img/svg/search.png"
                                    alt="#"
                                />
                            </div>
                            <div class="advan__grid_title title">
                                Получение ЭЦП
                            </div>
                            <div class="advan__grid_subtitle">
                                Цифровая подпись — за вас, под ключ
                            </div>
                            <div class="advan__grid_text text">
                                Получим для вас электронную подпись и
                                настроим работу с soliq.uz и другими
                                платформами
                            </div>
                        </div>
                    </div>--}}
                </div>
            </div>

            <div class="advan__work">
                <div class="advan__work_images">
                    <div class="advan__work_img">
                        <img src="{{ $settings['services.advan_img_1']}}" alt="#" />
                    </div>
                    <div class="advan__work_img">
                        <img src="{{ $settings['services.advan_img_2']}}" alt="#" />
                    </div>
                    <div class="advan__work_img">
                        <img src="{{ $settings['services.advan_img_3']}}" alt="#" />
                    </div>
                </div>
                <div class="advan__work_content">
                    <div class="advan__work_title title">
                        {{ $settings['services.advan_title']}}
                    </div>
                    <div class="advan__work_text text">
                        {{ $settings['services.advan_text']}}
                    </div>
                    <a
                        href="{{ $settings['services.advan_btn_link']}}"
                        class="advan__work_btn yellow-button"
                        >{{ $settings['services.advan_btn_text']}}</a
                    >
                </div>
            </div>
        </div>
    </section>
    <section class="consult">
        <div class="consult__box">
            <div class="consult__container">
                <div class="consult__cards_container swiper-container">
                    <div class="consult__cards swiper-wrapper">

                        @foreach($advices as $advise)
                            <div class="consult__card swiper-slide">
                                <div class="consult__card_image">
                                    <img
                                        src="{{ asset($advise->img) }}"
                                        alt="#"
                                    />
                                </div>
                                <div class="consult__card_title">
                                    {{ $advise->translate($locale)?->title}}
                                </div>
                                <div class="consult__card_subtitle">
                                    {{ $advise->translate($locale)?->subtitle}}
                                </div>
                                <div class="consult__card_text">
                                    {{ $advise->translate($locale)?->description}}
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
        <div class="consult__container">
            <div class="consult__info">

                @foreach($consultations as $consult)
                    @php
                        $btn = Arr::get(json_decode($consult->translate($locale)->button, true), '1', null);
                    @endphp
                    <div class="consult__info_item{{ $loop->last ? ' consult__info_item--last' : '' }}">
                        <div class="consult__info_item-img">
                            <img src="{{ asset($consult->img) }}" alt="#" />
                        </div>
                        <div class="consult__info_item-content">
                            @if($consult->link)
                                <div class="consult__info_item-numera numera">
                                    {{ $consult->link }}
                                </div>
                            @endif
                            <div class="consult__info_item-title title">
                                {{ $consult->translate($locale)?->title }}
                            </div>
                            <div class="consult__info_item-subtitle">
                                {{ $consult->translate($locale)?->subtitle }}
                            </div>
                            @if($consult->description)
                                <div class="consult__info_item-text text">
                                    {{ $consult->translate($locale)?->description }}
                                </div>
                            @endif
                            @if($btn)
                                <a
                                    href="{{ $btn['Link'] }}"
                                    class="consult__info_item-btn {{ $btn['Color'] }}"
                                >
                                    {{ $btn['Name'] }}
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
                {{--<div class="consult__info_item consult__info_item--last" >
                    <div class="consult__info_item-img">
                        <img src="../img/jpg/info06.jpg" alt="#" />
                    </div>
                    <div class="consult__info_item-content">
                        <div class="consult__info_item-numera numera">
                            #services
                        </div>
                        <div class="consult__info_item-title title">
                            {{ $settings['services.consult__info_title']}}
                        </div>
                        <div
                            class="consult__info_item-text text consult__info_item-text--last"
                        >
                            {{ $settings['services.consult__info_text']}}
                        </div>
                    </div>
                </div>--}}
            </div>
        </div>
    </section>
    <section class="start">
        <div class="start__container">
            <div class="start__numera numera">#services</div>
            <div class="start__title title-big">
                {{ $settings['services.start_title']}}
            </div>
            <div class="start__text text">
                {{ $settings['services.start_text']}}
            </div>
            <a
                href="{{ route('contact') }}"
                class="start__button yellow-button-big"
                >{{ $settings['services.start_btn_text']}}</a
            >
        </div>
    </section>
    <section class="latest">
        <div class="latest__container">
            <div class="latest__numera numera">#services</div>
            <div class="latest__title title">
                {{ $settings['services.latest_title']}}
            </div>
            <div class="latest__swiper swiper-container">
                <div class="latest__wrapper swiper-wrapper">
                    @foreach($articles as $article)
                        <div class="latest__card swiper-slide"
                             data-category="{{ mb_lcfirst($article->translate($locale)->type)}}">
                            <div class="latest__card_img">
                                <img src="{{ asset($article->img) }}" alt="#"/>
                            </div>
                            <div class="latest__card_title">{{ $article->translate($locale)->title }}</div>
                            <div class="latest__card_text">{{ $article->translate($locale)->description }}</div>
                            <div class="latest__card_info">
                                <div>
                                    <svg
                                        width="20"
                                        height="20"
                                        viewBox="0 0 20 20"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            d="M6.875 11.666C6.875 11.3208 7.15482 11.041 7.5 11.041H12.5C12.8452 11.041 13.125 11.3208 13.125 11.666C13.125 12.0112 12.8452 12.291 12.5 12.291H7.5C7.15482 12.291 6.875 12.0112 6.875 11.666Z"
                                            fill="#FFB927"
                                        />
                                        <path
                                            fill-rule="evenodd"
                                            clip-rule="evenodd"
                                            d="M7.5 1.04102C7.84518 1.04102 8.125 1.32084 8.125 1.66602V2.71652C8.6827 2.70768 9.30236 2.70768 9.99079 2.70768H10.0092C10.6976 2.70768 11.3173 2.70768 11.875 2.71652V1.66602C11.875 1.32084 12.1548 1.04102 12.5 1.04102C12.8452 1.04102 13.125 1.32084 13.125 1.66602V2.76067C14.3849 2.83965 15.3529 3.0438 16.1498 3.62281C16.5566 3.91836 16.9143 4.27609 17.2099 4.68288C17.8781 5.6026 18.047 6.75008 18.1005 8.31128C18.125 9.02563 18.125 9.85678 18.125 10.8235V10.8419C18.125 11.8086 18.125 12.6397 18.1005 13.3541C18.047 14.9153 17.8781 16.0628 17.2099 16.9825C16.9143 17.3893 16.5566 17.747 16.1498 18.0426C15.2301 18.7108 14.0826 18.8797 12.5214 18.9332C11.807 18.9577 10.9758 18.9577 10.009 18.9577H9.96227C8.43184 18.9577 7.23217 18.9577 6.2804 18.8546C5.30912 18.7493 4.52213 18.5307 3.8502 18.0426C3.44341 17.747 3.08568 17.3893 2.79013 16.9825C2.30194 16.3106 2.08334 15.5236 1.97811 14.5523C1.87499 13.6005 1.87499 12.4008 1.875 10.8704L1.875 10.8235C1.875 9.85675 1.875 9.02562 1.89947 8.31128C1.95296 6.75008 2.12191 5.60259 2.79013 4.68288C3.08568 4.27609 3.44341 3.91836 3.8502 3.62281C4.64713 3.0438 5.61507 2.83965 6.875 2.76067V1.66602C6.875 1.32084 7.15482 1.04102 7.5 1.04102ZM6.875 4.01372C5.73996 4.09178 5.08481 4.27089 4.58493 4.63408C4.28426 4.85253 4.01985 5.11694 3.8014 5.41761C3.43821 5.91749 3.2591 6.57264 3.18104 7.70768H16.819C16.7409 6.57264 16.5618 5.91749 16.1986 5.41761C15.9802 5.11694 15.7157 4.85253 15.4151 4.63408C14.9152 4.27089 14.26 4.09178 13.125 4.01372V4.16602C13.125 4.51119 12.8452 4.79102 12.5 4.79102C12.1548 4.79102 11.875 4.51119 11.875 4.16602V3.96667C11.3253 3.95772 10.7063 3.95768 10 3.95768C9.29369 3.95768 8.67466 3.95772 8.125 3.96667V4.16602C8.125 4.51119 7.84518 4.79102 7.5 4.79102C7.15482 4.79102 6.875 4.51119 6.875 4.16602V4.01372ZM16.866 8.95768H3.13399C3.12504 9.50734 3.125 10.1264 3.125 10.8327C3.125 12.409 3.12586 13.541 3.22083 14.4176C3.31454 15.2826 3.49383 15.8244 3.8014 16.2478C4.01985 16.5484 4.28426 16.8128 4.58493 17.0313C5.00826 17.3389 5.55011 17.5181 6.41504 17.6118C7.29166 17.7068 8.42369 17.7077 10 17.7077C10.707 17.7077 11.3265 17.7076 11.8765 17.6987C11.8802 17.3031 11.8925 17.0119 11.934 16.7498C12.2587 14.6994 13.8668 13.0914 15.9171 12.7667C16.1793 12.7252 16.4704 12.7128 16.866 12.7092C16.875 12.1592 16.875 11.5396 16.875 10.8327C16.875 10.1264 16.875 9.50734 16.866 8.95768ZM16.8188 13.96C16.4813 13.9639 16.2835 13.9742 16.1126 14.0013C14.5972 14.2413 13.4086 15.4299 13.1686 16.9453C13.1415 17.1162 13.1312 17.314 13.1273 17.6515C14.2609 17.5733 14.9155 17.3942 15.4151 17.0313C15.7157 16.8128 15.9802 16.5484 16.1986 16.2478C16.5615 15.7482 16.7407 15.0936 16.8188 13.96Z"
                                            fill="#FFB927"
                                        />
                                    </svg>
                                    <span>{{ $article->created_at->format('d.m.Y') }}</span>
                                </div>
                                <div>
                                    <svg
                                        width="20"
                                        height="20"
                                        viewBox="0 0 20 20"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            d="M4.97312 1.52908C5.24266 1.31345 5.28636 0.920143 5.07073 0.650604C4.85509 0.381066 4.46179 0.337365 4.19225 0.552996L2.10891 2.21966C1.83938 2.43529 1.79567 2.8286 2.01131 3.09814C2.22694 3.36768 2.62024 3.41138 2.88978 3.19575L4.97312 1.52908Z"
                                            fill="#FFB927"
                                        />
                                        <path
                                            d="M15.8064 0.552996C15.5369 0.337365 15.1436 0.381066 14.928 0.650604C14.7123 0.920143 14.756 1.31345 15.0256 1.52908L17.1089 3.19575C17.3785 3.41138 17.7718 3.36768 17.9874 3.09814C18.203 2.8286 18.1593 2.43529 17.8898 2.21966L15.8064 0.552996Z"
                                            fill="#FFB927"
                                        />
                                        <path
                                            d="M10.6244 6.87437C10.6244 6.52919 10.3445 6.24937 9.99935 6.24937C9.65417 6.24937 9.37435 6.52919 9.37435 6.87437V10.3792C9.37435 10.6449 9.27285 10.9005 9.09061 11.0938L7.87793 12.3801C7.64114 12.6312 7.65278 13.0268 7.90394 13.2636C8.15509 13.5004 8.55065 13.4887 8.78744 13.2376L10.0001 11.9513C10.401 11.5261 10.6244 10.9637 10.6244 10.3792V6.87437Z"
                                            fill="#FFB927"
                                        />
                                        <path
                                            fill-rule="evenodd"
                                            clip-rule="evenodd"
                                            d="M9.99935 1.24937C5.0518 1.24937 1.04102 5.26015 1.04102 10.2077C1.04102 15.1553 5.0518 19.166 9.99935 19.166C14.9469 19.166 18.9577 15.1553 18.9577 10.2077C18.9577 5.26015 14.9469 1.24937 9.99935 1.24937ZM2.29102 10.2077C2.29102 5.95051 5.74215 2.49937 9.99935 2.49937C14.2565 2.49937 17.7077 5.95051 17.7077 10.2077C17.7077 14.4649 14.2565 17.916 9.99935 17.916C5.74215 17.916 2.29102 14.4649 2.29102 10.2077Z"
                                            fill="#FFB927"
                                        />
                                    </svg>
                                    <span>{{ $article->created_at->format('h:i') }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
{{--                    <div--}}
{{--                        class="latest__card swiper-slide"--}}
{{--                        data-filter="report"--}}
{{--                    >--}}
{{--                        <div class="latest__card_img">--}}
{{--                            <img src="../img/jpg/news01.jpg" alt="#" />--}}
{{--                        </div>--}}
{{--                        <div class="latest__card_title">--}}
{{--                            Что изменится в налогах с июля 2025 года?--}}
{{--                        </div>--}}
{{--                        <div class="latest__card_text">--}}
{{--                            Кратко о ключевых изменениях в--}}
{{--                            законодательстве, которые коснутся всех--}}
{{--                            предпринимателей. Что важно учесть заранее?--}}
{{--                        </div>--}}
{{--                        <div class="latest__card_info">--}}
{{--                            <div>--}}
{{--                                <svg--}}
{{--                                    width="20"--}}
{{--                                    height="20"--}}
{{--                                    viewBox="0 0 20 20"--}}
{{--                                    fill="none"--}}
{{--                                    xmlns="http://www.w3.org/2000/svg"--}}
{{--                                >--}}
{{--                                    <path--}}
{{--                                        d="M6.875 11.666C6.875 11.3208 7.15482 11.041 7.5 11.041H12.5C12.8452 11.041 13.125 11.3208 13.125 11.666C13.125 12.0112 12.8452 12.291 12.5 12.291H7.5C7.15482 12.291 6.875 12.0112 6.875 11.666Z"--}}
{{--                                        fill="#FFB927"--}}
{{--                                    />--}}
{{--                                    <path--}}
{{--                                        fill-rule="evenodd"--}}
{{--                                        clip-rule="evenodd"--}}
{{--                                        d="M7.5 1.04102C7.84518 1.04102 8.125 1.32084 8.125 1.66602V2.71652C8.6827 2.70768 9.30236 2.70768 9.99079 2.70768H10.0092C10.6976 2.70768 11.3173 2.70768 11.875 2.71652V1.66602C11.875 1.32084 12.1548 1.04102 12.5 1.04102C12.8452 1.04102 13.125 1.32084 13.125 1.66602V2.76067C14.3849 2.83965 15.3529 3.0438 16.1498 3.62281C16.5566 3.91836 16.9143 4.27609 17.2099 4.68288C17.8781 5.6026 18.047 6.75008 18.1005 8.31128C18.125 9.02563 18.125 9.85678 18.125 10.8235V10.8419C18.125 11.8086 18.125 12.6397 18.1005 13.3541C18.047 14.9153 17.8781 16.0628 17.2099 16.9825C16.9143 17.3893 16.5566 17.747 16.1498 18.0426C15.2301 18.7108 14.0826 18.8797 12.5214 18.9332C11.807 18.9577 10.9758 18.9577 10.009 18.9577H9.96227C8.43184 18.9577 7.23217 18.9577 6.2804 18.8546C5.30912 18.7493 4.52213 18.5307 3.8502 18.0426C3.44341 17.747 3.08568 17.3893 2.79013 16.9825C2.30194 16.3106 2.08334 15.5236 1.97811 14.5523C1.87499 13.6005 1.87499 12.4008 1.875 10.8704L1.875 10.8235C1.875 9.85675 1.875 9.02562 1.89947 8.31128C1.95296 6.75008 2.12191 5.60259 2.79013 4.68288C3.08568 4.27609 3.44341 3.91836 3.8502 3.62281C4.64713 3.0438 5.61507 2.83965 6.875 2.76067V1.66602C6.875 1.32084 7.15482 1.04102 7.5 1.04102ZM6.875 4.01372C5.73996 4.09178 5.08481 4.27089 4.58493 4.63408C4.28426 4.85253 4.01985 5.11694 3.8014 5.41761C3.43821 5.91749 3.2591 6.57264 3.18104 7.70768H16.819C16.7409 6.57264 16.5618 5.91749 16.1986 5.41761C15.9802 5.11694 15.7157 4.85253 15.4151 4.63408C14.9152 4.27089 14.26 4.09178 13.125 4.01372V4.16602C13.125 4.51119 12.8452 4.79102 12.5 4.79102C12.1548 4.79102 11.875 4.51119 11.875 4.16602V3.96667C11.3253 3.95772 10.7063 3.95768 10 3.95768C9.29369 3.95768 8.67466 3.95772 8.125 3.96667V4.16602C8.125 4.51119 7.84518 4.79102 7.5 4.79102C7.15482 4.79102 6.875 4.51119 6.875 4.16602V4.01372ZM16.866 8.95768H3.13399C3.12504 9.50734 3.125 10.1264 3.125 10.8327C3.125 12.409 3.12586 13.541 3.22083 14.4176C3.31454 15.2826 3.49383 15.8244 3.8014 16.2478C4.01985 16.5484 4.28426 16.8128 4.58493 17.0313C5.00826 17.3389 5.55011 17.5181 6.41504 17.6118C7.29166 17.7068 8.42369 17.7077 10 17.7077C10.707 17.7077 11.3265 17.7076 11.8765 17.6987C11.8802 17.3031 11.8925 17.0119 11.934 16.7498C12.2587 14.6994 13.8668 13.0914 15.9171 12.7667C16.1793 12.7252 16.4704 12.7128 16.866 12.7092C16.875 12.1592 16.875 11.5396 16.875 10.8327C16.875 10.1264 16.875 9.50734 16.866 8.95768ZM16.8188 13.96C16.4813 13.9639 16.2835 13.9742 16.1126 14.0013C14.5972 14.2413 13.4086 15.4299 13.1686 16.9453C13.1415 17.1162 13.1312 17.314 13.1273 17.6515C14.2609 17.5733 14.9155 17.3942 15.4151 17.0313C15.7157 16.8128 15.9802 16.5484 16.1986 16.2478C16.5615 15.7482 16.7407 15.0936 16.8188 13.96Z"--}}
{{--                                        fill="#FFB927"--}}
{{--                                    />--}}
{{--                                </svg>--}}
{{--                                <span>24.05.2025</span>--}}
{{--                            </div>--}}
{{--                            <div>--}}
{{--                                <svg--}}
{{--                                    width="20"--}}
{{--                                    height="20"--}}
{{--                                    viewBox="0 0 20 20"--}}
{{--                                    fill="none"--}}
{{--                                    xmlns="http://www.w3.org/2000/svg"--}}
{{--                                >--}}
{{--                                    <path--}}
{{--                                        d="M4.97312 1.52908C5.24266 1.31345 5.28636 0.920143 5.07073 0.650604C4.85509 0.381066 4.46179 0.337365 4.19225 0.552996L2.10891 2.21966C1.83938 2.43529 1.79567 2.8286 2.01131 3.09814C2.22694 3.36768 2.62024 3.41138 2.88978 3.19575L4.97312 1.52908Z"--}}
{{--                                        fill="#FFB927"--}}
{{--                                    />--}}
{{--                                    <path--}}
{{--                                        d="M15.8064 0.552996C15.5369 0.337365 15.1436 0.381066 14.928 0.650604C14.7123 0.920143 14.756 1.31345 15.0256 1.52908L17.1089 3.19575C17.3785 3.41138 17.7718 3.36768 17.9874 3.09814C18.203 2.8286 18.1593 2.43529 17.8898 2.21966L15.8064 0.552996Z"--}}
{{--                                        fill="#FFB927"--}}
{{--                                    />--}}
{{--                                    <path--}}
{{--                                        d="M10.6244 6.87437C10.6244 6.52919 10.3445 6.24937 9.99935 6.24937C9.65417 6.24937 9.37435 6.52919 9.37435 6.87437V10.3792C9.37435 10.6449 9.27285 10.9005 9.09061 11.0938L7.87793 12.3801C7.64114 12.6312 7.65278 13.0268 7.90394 13.2636C8.15509 13.5004 8.55065 13.4887 8.78744 13.2376L10.0001 11.9513C10.401 11.5261 10.6244 10.9637 10.6244 10.3792V6.87437Z"--}}
{{--                                        fill="#FFB927"--}}
{{--                                    />--}}
{{--                                    <path--}}
{{--                                        fill-rule="evenodd"--}}
{{--                                        clip-rule="evenodd"--}}
{{--                                        d="M9.99935 1.24937C5.0518 1.24937 1.04102 5.26015 1.04102 10.2077C1.04102 15.1553 5.0518 19.166 9.99935 19.166C14.9469 19.166 18.9577 15.1553 18.9577 10.2077C18.9577 5.26015 14.9469 1.24937 9.99935 1.24937ZM2.29102 10.2077C2.29102 5.95051 5.74215 2.49937 9.99935 2.49937C14.2565 2.49937 17.7077 5.95051 17.7077 10.2077C17.7077 14.4649 14.2565 17.916 9.99935 17.916C5.74215 17.916 2.29102 14.4649 2.29102 10.2077Z"--}}
{{--                                        fill="#FFB927"--}}
{{--                                    />--}}
{{--                                </svg>--}}
{{--                                <span>09:25</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div--}}
{{--                        class="latest__card swiper-slide"--}}
{{--                        data-filter="tax"--}}
{{--                    >--}}
{{--                        <div class="latest__card_img">--}}
{{--                            <img src="../img/jpg/news02.jpg" alt="#" />--}}
{{--                        </div>--}}
{{--                        <div class="latest__card_title">--}}
{{--                            Что изменится в налогах с июля 2025 года?--}}
{{--                        </div>--}}
{{--                        <div class="latest__card_text">--}}
{{--                            Кратко о ключевых изменениях в--}}
{{--                            законодательстве, которые коснутся всех--}}
{{--                            предпринимателей. Что важно учесть заранее?--}}
{{--                        </div>--}}
{{--                        <div class="latest__card_info">--}}
{{--                            <div>--}}
{{--                                <svg--}}
{{--                                    width="20"--}}
{{--                                    height="20"--}}
{{--                                    viewBox="0 0 20 20"--}}
{{--                                    fill="none"--}}
{{--                                    xmlns="http://www.w3.org/2000/svg"--}}
{{--                                >--}}
{{--                                    <path--}}
{{--                                        d="M6.875 11.666C6.875 11.3208 7.15482 11.041 7.5 11.041H12.5C12.8452 11.041 13.125 11.3208 13.125 11.666C13.125 12.0112 12.8452 12.291 12.5 12.291H7.5C7.15482 12.291 6.875 12.0112 6.875 11.666Z"--}}
{{--                                        fill="#FFB927"--}}
{{--                                    />--}}
{{--                                    <path--}}
{{--                                        fill-rule="evenodd"--}}
{{--                                        clip-rule="evenodd"--}}
{{--                                        d="M7.5 1.04102C7.84518 1.04102 8.125 1.32084 8.125 1.66602V2.71652C8.6827 2.70768 9.30236 2.70768 9.99079 2.70768H10.0092C10.6976 2.70768 11.3173 2.70768 11.875 2.71652V1.66602C11.875 1.32084 12.1548 1.04102 12.5 1.04102C12.8452 1.04102 13.125 1.32084 13.125 1.66602V2.76067C14.3849 2.83965 15.3529 3.0438 16.1498 3.62281C16.5566 3.91836 16.9143 4.27609 17.2099 4.68288C17.8781 5.6026 18.047 6.75008 18.1005 8.31128C18.125 9.02563 18.125 9.85678 18.125 10.8235V10.8419C18.125 11.8086 18.125 12.6397 18.1005 13.3541C18.047 14.9153 17.8781 16.0628 17.2099 16.9825C16.9143 17.3893 16.5566 17.747 16.1498 18.0426C15.2301 18.7108 14.0826 18.8797 12.5214 18.9332C11.807 18.9577 10.9758 18.9577 10.009 18.9577H9.96227C8.43184 18.9577 7.23217 18.9577 6.2804 18.8546C5.30912 18.7493 4.52213 18.5307 3.8502 18.0426C3.44341 17.747 3.08568 17.3893 2.79013 16.9825C2.30194 16.3106 2.08334 15.5236 1.97811 14.5523C1.87499 13.6005 1.87499 12.4008 1.875 10.8704L1.875 10.8235C1.875 9.85675 1.875 9.02562 1.89947 8.31128C1.95296 6.75008 2.12191 5.60259 2.79013 4.68288C3.08568 4.27609 3.44341 3.91836 3.8502 3.62281C4.64713 3.0438 5.61507 2.83965 6.875 2.76067V1.66602C6.875 1.32084 7.15482 1.04102 7.5 1.04102ZM6.875 4.01372C5.73996 4.09178 5.08481 4.27089 4.58493 4.63408C4.28426 4.85253 4.01985 5.11694 3.8014 5.41761C3.43821 5.91749 3.2591 6.57264 3.18104 7.70768H16.819C16.7409 6.57264 16.5618 5.91749 16.1986 5.41761C15.9802 5.11694 15.7157 4.85253 15.4151 4.63408C14.9152 4.27089 14.26 4.09178 13.125 4.01372V4.16602C13.125 4.51119 12.8452 4.79102 12.5 4.79102C12.1548 4.79102 11.875 4.51119 11.875 4.16602V3.96667C11.3253 3.95772 10.7063 3.95768 10 3.95768C9.29369 3.95768 8.67466 3.95772 8.125 3.96667V4.16602C8.125 4.51119 7.84518 4.79102 7.5 4.79102C7.15482 4.79102 6.875 4.51119 6.875 4.16602V4.01372ZM16.866 8.95768H3.13399C3.12504 9.50734 3.125 10.1264 3.125 10.8327C3.125 12.409 3.12586 13.541 3.22083 14.4176C3.31454 15.2826 3.49383 15.8244 3.8014 16.2478C4.01985 16.5484 4.28426 16.8128 4.58493 17.0313C5.00826 17.3389 5.55011 17.5181 6.41504 17.6118C7.29166 17.7068 8.42369 17.7077 10 17.7077C10.707 17.7077 11.3265 17.7076 11.8765 17.6987C11.8802 17.3031 11.8925 17.0119 11.934 16.7498C12.2587 14.6994 13.8668 13.0914 15.9171 12.7667C16.1793 12.7252 16.4704 12.7128 16.866 12.7092C16.875 12.1592 16.875 11.5396 16.875 10.8327C16.875 10.1264 16.875 9.50734 16.866 8.95768ZM16.8188 13.96C16.4813 13.9639 16.2835 13.9742 16.1126 14.0013C14.5972 14.2413 13.4086 15.4299 13.1686 16.9453C13.1415 17.1162 13.1312 17.314 13.1273 17.6515C14.2609 17.5733 14.9155 17.3942 15.4151 17.0313C15.7157 16.8128 15.9802 16.5484 16.1986 16.2478C16.5615 15.7482 16.7407 15.0936 16.8188 13.96Z"--}}
{{--                                        fill="#FFB927"--}}
{{--                                    />--}}
{{--                                </svg>--}}
{{--                                <span>24.05.2025</span>--}}
{{--                            </div>--}}
{{--                            <div>--}}
{{--                                <svg--}}
{{--                                    width="20"--}}
{{--                                    height="20"--}}
{{--                                    viewBox="0 0 20 20"--}}
{{--                                    fill="none"--}}
{{--                                    xmlns="http://www.w3.org/2000/svg"--}}
{{--                                >--}}
{{--                                    <path--}}
{{--                                        d="M4.97312 1.52908C5.24266 1.31345 5.28636 0.920143 5.07073 0.650604C4.85509 0.381066 4.46179 0.337365 4.19225 0.552996L2.10891 2.21966C1.83938 2.43529 1.79567 2.8286 2.01131 3.09814C2.22694 3.36768 2.62024 3.41138 2.88978 3.19575L4.97312 1.52908Z"--}}
{{--                                        fill="#FFB927"--}}
{{--                                    />--}}
{{--                                    <path--}}
{{--                                        d="M15.8064 0.552996C15.5369 0.337365 15.1436 0.381066 14.928 0.650604C14.7123 0.920143 14.756 1.31345 15.0256 1.52908L17.1089 3.19575C17.3785 3.41138 17.7718 3.36768 17.9874 3.09814C18.203 2.8286 18.1593 2.43529 17.8898 2.21966L15.8064 0.552996Z"--}}
{{--                                        fill="#FFB927"--}}
{{--                                    />--}}
{{--                                    <path--}}
{{--                                        d="M10.6244 6.87437C10.6244 6.52919 10.3445 6.24937 9.99935 6.24937C9.65417 6.24937 9.37435 6.52919 9.37435 6.87437V10.3792C9.37435 10.6449 9.27285 10.9005 9.09061 11.0938L7.87793 12.3801C7.64114 12.6312 7.65278 13.0268 7.90394 13.2636C8.15509 13.5004 8.55065 13.4887 8.78744 13.2376L10.0001 11.9513C10.401 11.5261 10.6244 10.9637 10.6244 10.3792V6.87437Z"--}}
{{--                                        fill="#FFB927"--}}
{{--                                    />--}}
{{--                                    <path--}}
{{--                                        fill-rule="evenodd"--}}
{{--                                        clip-rule="evenodd"--}}
{{--                                        d="M9.99935 1.24937C5.0518 1.24937 1.04102 5.26015 1.04102 10.2077C1.04102 15.1553 5.0518 19.166 9.99935 19.166C14.9469 19.166 18.9577 15.1553 18.9577 10.2077C18.9577 5.26015 14.9469 1.24937 9.99935 1.24937ZM2.29102 10.2077C2.29102 5.95051 5.74215 2.49937 9.99935 2.49937C14.2565 2.49937 17.7077 5.95051 17.7077 10.2077C17.7077 14.4649 14.2565 17.916 9.99935 17.916C5.74215 17.916 2.29102 14.4649 2.29102 10.2077Z"--}}
{{--                                        fill="#FFB927"--}}
{{--                                    />--}}
{{--                                </svg>--}}
{{--                                <span>09:25</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div--}}
{{--                        class="latest__card swiper-slide"--}}
{{--                        data-filter="consult"--}}
{{--                    >--}}
{{--                        <div class="latest__card_img">--}}
{{--                            <img src="../img/jpg/news03.jpg" alt="#" />--}}
{{--                        </div>--}}
{{--                        <div class="latest__card_title">--}}
{{--                            Что изменится в налогах с июля 2025 года?--}}
{{--                        </div>--}}
{{--                        <div class="latest__card_text">--}}
{{--                            Кратко о ключевых изменениях в--}}
{{--                            законодательстве, которые коснутся всех--}}
{{--                            предпринимателей. Что важно учесть заранее?--}}
{{--                        </div>--}}
{{--                        <div class="latest__card_info">--}}
{{--                            <div>--}}
{{--                                <svg--}}
{{--                                    width="20"--}}
{{--                                    height="20"--}}
{{--                                    viewBox="0 0 20 20"--}}
{{--                                    fill="none"--}}
{{--                                    xmlns="http://www.w3.org/2000/svg"--}}
{{--                                >--}}
{{--                                    <path--}}
{{--                                        d="M6.875 11.666C6.875 11.3208 7.15482 11.041 7.5 11.041H12.5C12.8452 11.041 13.125 11.3208 13.125 11.666C13.125 12.0112 12.8452 12.291 12.5 12.291H7.5C7.15482 12.291 6.875 12.0112 6.875 11.666Z"--}}
{{--                                        fill="#FFB927"--}}
{{--                                    />--}}
{{--                                    <path--}}
{{--                                        fill-rule="evenodd"--}}
{{--                                        clip-rule="evenodd"--}}
{{--                                        d="M7.5 1.04102C7.84518 1.04102 8.125 1.32084 8.125 1.66602V2.71652C8.6827 2.70768 9.30236 2.70768 9.99079 2.70768H10.0092C10.6976 2.70768 11.3173 2.70768 11.875 2.71652V1.66602C11.875 1.32084 12.1548 1.04102 12.5 1.04102C12.8452 1.04102 13.125 1.32084 13.125 1.66602V2.76067C14.3849 2.83965 15.3529 3.0438 16.1498 3.62281C16.5566 3.91836 16.9143 4.27609 17.2099 4.68288C17.8781 5.6026 18.047 6.75008 18.1005 8.31128C18.125 9.02563 18.125 9.85678 18.125 10.8235V10.8419C18.125 11.8086 18.125 12.6397 18.1005 13.3541C18.047 14.9153 17.8781 16.0628 17.2099 16.9825C16.9143 17.3893 16.5566 17.747 16.1498 18.0426C15.2301 18.7108 14.0826 18.8797 12.5214 18.9332C11.807 18.9577 10.9758 18.9577 10.009 18.9577H9.96227C8.43184 18.9577 7.23217 18.9577 6.2804 18.8546C5.30912 18.7493 4.52213 18.5307 3.8502 18.0426C3.44341 17.747 3.08568 17.3893 2.79013 16.9825C2.30194 16.3106 2.08334 15.5236 1.97811 14.5523C1.87499 13.6005 1.87499 12.4008 1.875 10.8704L1.875 10.8235C1.875 9.85675 1.875 9.02562 1.89947 8.31128C1.95296 6.75008 2.12191 5.60259 2.79013 4.68288C3.08568 4.27609 3.44341 3.91836 3.8502 3.62281C4.64713 3.0438 5.61507 2.83965 6.875 2.76067V1.66602C6.875 1.32084 7.15482 1.04102 7.5 1.04102ZM6.875 4.01372C5.73996 4.09178 5.08481 4.27089 4.58493 4.63408C4.28426 4.85253 4.01985 5.11694 3.8014 5.41761C3.43821 5.91749 3.2591 6.57264 3.18104 7.70768H16.819C16.7409 6.57264 16.5618 5.91749 16.1986 5.41761C15.9802 5.11694 15.7157 4.85253 15.4151 4.63408C14.9152 4.27089 14.26 4.09178 13.125 4.01372V4.16602C13.125 4.51119 12.8452 4.79102 12.5 4.79102C12.1548 4.79102 11.875 4.51119 11.875 4.16602V3.96667C11.3253 3.95772 10.7063 3.95768 10 3.95768C9.29369 3.95768 8.67466 3.95772 8.125 3.96667V4.16602C8.125 4.51119 7.84518 4.79102 7.5 4.79102C7.15482 4.79102 6.875 4.51119 6.875 4.16602V4.01372ZM16.866 8.95768H3.13399C3.12504 9.50734 3.125 10.1264 3.125 10.8327C3.125 12.409 3.12586 13.541 3.22083 14.4176C3.31454 15.2826 3.49383 15.8244 3.8014 16.2478C4.01985 16.5484 4.28426 16.8128 4.58493 17.0313C5.00826 17.3389 5.55011 17.5181 6.41504 17.6118C7.29166 17.7068 8.42369 17.7077 10 17.7077C10.707 17.7077 11.3265 17.7076 11.8765 17.6987C11.8802 17.3031 11.8925 17.0119 11.934 16.7498C12.2587 14.6994 13.8668 13.0914 15.9171 12.7667C16.1793 12.7252 16.4704 12.7128 16.866 12.7092C16.875 12.1592 16.875 11.5396 16.875 10.8327C16.875 10.1264 16.875 9.50734 16.866 8.95768ZM16.8188 13.96C16.4813 13.9639 16.2835 13.9742 16.1126 14.0013C14.5972 14.2413 13.4086 15.4299 13.1686 16.9453C13.1415 17.1162 13.1312 17.314 13.1273 17.6515C14.2609 17.5733 14.9155 17.3942 15.4151 17.0313C15.7157 16.8128 15.9802 16.5484 16.1986 16.2478C16.5615 15.7482 16.7407 15.0936 16.8188 13.96Z"--}}
{{--                                        fill="#FFB927"--}}
{{--                                    />--}}
{{--                                </svg>--}}
{{--                                <span>24.05.2025</span>--}}
{{--                            </div>--}}
{{--                            <div>--}}
{{--                                <svg--}}
{{--                                    width="20"--}}
{{--                                    height="20"--}}
{{--                                    viewBox="0 0 20 20"--}}
{{--                                    fill="none"--}}
{{--                                    xmlns="http://www.w3.org/2000/svg"--}}
{{--                                >--}}
{{--                                    <path--}}
{{--                                        d="M4.97312 1.52908C5.24266 1.31345 5.28636 0.920143 5.07073 0.650604C4.85509 0.381066 4.46179 0.337365 4.19225 0.552996L2.10891 2.21966C1.83938 2.43529 1.79567 2.8286 2.01131 3.09814C2.22694 3.36768 2.62024 3.41138 2.88978 3.19575L4.97312 1.52908Z"--}}
{{--                                        fill="#FFB927"--}}
{{--                                    />--}}
{{--                                    <path--}}
{{--                                        d="M15.8064 0.552996C15.5369 0.337365 15.1436 0.381066 14.928 0.650604C14.7123 0.920143 14.756 1.31345 15.0256 1.52908L17.1089 3.19575C17.3785 3.41138 17.7718 3.36768 17.9874 3.09814C18.203 2.8286 18.1593 2.43529 17.8898 2.21966L15.8064 0.552996Z"--}}
{{--                                        fill="#FFB927"--}}
{{--                                    />--}}
{{--                                    <path--}}
{{--                                        d="M10.6244 6.87437C10.6244 6.52919 10.3445 6.24937 9.99935 6.24937C9.65417 6.24937 9.37435 6.52919 9.37435 6.87437V10.3792C9.37435 10.6449 9.27285 10.9005 9.09061 11.0938L7.87793 12.3801C7.64114 12.6312 7.65278 13.0268 7.90394 13.2636C8.15509 13.5004 8.55065 13.4887 8.78744 13.2376L10.0001 11.9513C10.401 11.5261 10.6244 10.9637 10.6244 10.3792V6.87437Z"--}}
{{--                                        fill="#FFB927"--}}
{{--                                    />--}}
{{--                                    <path--}}
{{--                                        fill-rule="evenodd"--}}
{{--                                        clip-rule="evenodd"--}}
{{--                                        d="M9.99935 1.24937C5.0518 1.24937 1.04102 5.26015 1.04102 10.2077C1.04102 15.1553 5.0518 19.166 9.99935 19.166C14.9469 19.166 18.9577 15.1553 18.9577 10.2077C18.9577 5.26015 14.9469 1.24937 9.99935 1.24937ZM2.29102 10.2077C2.29102 5.95051 5.74215 2.49937 9.99935 2.49937C14.2565 2.49937 17.7077 5.95051 17.7077 10.2077C17.7077 14.4649 14.2565 17.916 9.99935 17.916C5.74215 17.916 2.29102 14.4649 2.29102 10.2077Z"--}}
{{--                                        fill="#FFB927"--}}
{{--                                    />--}}
{{--                                </svg>--}}
{{--                                <span>09:25</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div--}}
{{--                        class="latest__card swiper-slide"--}}
{{--                        data-filter="case"--}}
{{--                    >--}}
{{--                        <div class="latest__card_img">--}}
{{--                            <img src="../img/jpg/news04.jpg" alt="#" />--}}
{{--                        </div>--}}
{{--                        <div class="latest__card_title">--}}
{{--                            Что изменится в налогах с июля 2025 года?--}}
{{--                        </div>--}}
{{--                        <div class="latest__card_text">--}}
{{--                            Кратко о ключевых изменениях в--}}
{{--                            законодательстве, которые коснутся всех--}}
{{--                            предпринимателей. Что важно учесть заранее?--}}
{{--                        </div>--}}
{{--                        <div class="latest__card_info">--}}
{{--                            <div>--}}
{{--                                <svg--}}
{{--                                    width="20"--}}
{{--                                    height="20"--}}
{{--                                    viewBox="0 0 20 20"--}}
{{--                                    fill="none"--}}
{{--                                    xmlns="http://www.w3.org/2000/svg"--}}
{{--                                >--}}
{{--                                    <path--}}
{{--                                        d="M6.875 11.666C6.875 11.3208 7.15482 11.041 7.5 11.041H12.5C12.8452 11.041 13.125 11.3208 13.125 11.666C13.125 12.0112 12.8452 12.291 12.5 12.291H7.5C7.15482 12.291 6.875 12.0112 6.875 11.666Z"--}}
{{--                                        fill="#FFB927"--}}
{{--                                    />--}}
{{--                                    <path--}}
{{--                                        fill-rule="evenodd"--}}
{{--                                        clip-rule="evenodd"--}}
{{--                                        d="M7.5 1.04102C7.84518 1.04102 8.125 1.32084 8.125 1.66602V2.71652C8.6827 2.70768 9.30236 2.70768 9.99079 2.70768H10.0092C10.6976 2.70768 11.3173 2.70768 11.875 2.71652V1.66602C11.875 1.32084 12.1548 1.04102 12.5 1.04102C12.8452 1.04102 13.125 1.32084 13.125 1.66602V2.76067C14.3849 2.83965 15.3529 3.0438 16.1498 3.62281C16.5566 3.91836 16.9143 4.27609 17.2099 4.68288C17.8781 5.6026 18.047 6.75008 18.1005 8.31128C18.125 9.02563 18.125 9.85678 18.125 10.8235V10.8419C18.125 11.8086 18.125 12.6397 18.1005 13.3541C18.047 14.9153 17.8781 16.0628 17.2099 16.9825C16.9143 17.3893 16.5566 17.747 16.1498 18.0426C15.2301 18.7108 14.0826 18.8797 12.5214 18.9332C11.807 18.9577 10.9758 18.9577 10.009 18.9577H9.96227C8.43184 18.9577 7.23217 18.9577 6.2804 18.8546C5.30912 18.7493 4.52213 18.5307 3.8502 18.0426C3.44341 17.747 3.08568 17.3893 2.79013 16.9825C2.30194 16.3106 2.08334 15.5236 1.97811 14.5523C1.87499 13.6005 1.87499 12.4008 1.875 10.8704L1.875 10.8235C1.875 9.85675 1.875 9.02562 1.89947 8.31128C1.95296 6.75008 2.12191 5.60259 2.79013 4.68288C3.08568 4.27609 3.44341 3.91836 3.8502 3.62281C4.64713 3.0438 5.61507 2.83965 6.875 2.76067V1.66602C6.875 1.32084 7.15482 1.04102 7.5 1.04102ZM6.875 4.01372C5.73996 4.09178 5.08481 4.27089 4.58493 4.63408C4.28426 4.85253 4.01985 5.11694 3.8014 5.41761C3.43821 5.91749 3.2591 6.57264 3.18104 7.70768H16.819C16.7409 6.57264 16.5618 5.91749 16.1986 5.41761C15.9802 5.11694 15.7157 4.85253 15.4151 4.63408C14.9152 4.27089 14.26 4.09178 13.125 4.01372V4.16602C13.125 4.51119 12.8452 4.79102 12.5 4.79102C12.1548 4.79102 11.875 4.51119 11.875 4.16602V3.96667C11.3253 3.95772 10.7063 3.95768 10 3.95768C9.29369 3.95768 8.67466 3.95772 8.125 3.96667V4.16602C8.125 4.51119 7.84518 4.79102 7.5 4.79102C7.15482 4.79102 6.875 4.51119 6.875 4.16602V4.01372ZM16.866 8.95768H3.13399C3.12504 9.50734 3.125 10.1264 3.125 10.8327C3.125 12.409 3.12586 13.541 3.22083 14.4176C3.31454 15.2826 3.49383 15.8244 3.8014 16.2478C4.01985 16.5484 4.28426 16.8128 4.58493 17.0313C5.00826 17.3389 5.55011 17.5181 6.41504 17.6118C7.29166 17.7068 8.42369 17.7077 10 17.7077C10.707 17.7077 11.3265 17.7076 11.8765 17.6987C11.8802 17.3031 11.8925 17.0119 11.934 16.7498C12.2587 14.6994 13.8668 13.0914 15.9171 12.7667C16.1793 12.7252 16.4704 12.7128 16.866 12.7092C16.875 12.1592 16.875 11.5396 16.875 10.8327C16.875 10.1264 16.875 9.50734 16.866 8.95768ZM16.8188 13.96C16.4813 13.9639 16.2835 13.9742 16.1126 14.0013C14.5972 14.2413 13.4086 15.4299 13.1686 16.9453C13.1415 17.1162 13.1312 17.314 13.1273 17.6515C14.2609 17.5733 14.9155 17.3942 15.4151 17.0313C15.7157 16.8128 15.9802 16.5484 16.1986 16.2478C16.5615 15.7482 16.7407 15.0936 16.8188 13.96Z"--}}
{{--                                        fill="#FFB927"--}}
{{--                                    />--}}
{{--                                </svg>--}}
{{--                                <span>24.05.2025</span>--}}
{{--                            </div>--}}
{{--                            <div>--}}
{{--                                <svg--}}
{{--                                    width="20"--}}
{{--                                    height="20"--}}
{{--                                    viewBox="0 0 20 20"--}}
{{--                                    fill="none"--}}
{{--                                    xmlns="http://www.w3.org/2000/svg"--}}
{{--                                >--}}
{{--                                    <path--}}
{{--                                        d="M4.97312 1.52908C5.24266 1.31345 5.28636 0.920143 5.07073 0.650604C4.85509 0.381066 4.46179 0.337365 4.19225 0.552996L2.10891 2.21966C1.83938 2.43529 1.79567 2.8286 2.01131 3.09814C2.22694 3.36768 2.62024 3.41138 2.88978 3.19575L4.97312 1.52908Z"--}}
{{--                                        fill="#FFB927"--}}
{{--                                    />--}}
{{--                                    <path--}}
{{--                                        d="M15.8064 0.552996C15.5369 0.337365 15.1436 0.381066 14.928 0.650604C14.7123 0.920143 14.756 1.31345 15.0256 1.52908L17.1089 3.19575C17.3785 3.41138 17.7718 3.36768 17.9874 3.09814C18.203 2.8286 18.1593 2.43529 17.8898 2.21966L15.8064 0.552996Z"--}}
{{--                                        fill="#FFB927"--}}
{{--                                    />--}}
{{--                                    <path--}}
{{--                                        d="M10.6244 6.87437C10.6244 6.52919 10.3445 6.24937 9.99935 6.24937C9.65417 6.24937 9.37435 6.52919 9.37435 6.87437V10.3792C9.37435 10.6449 9.27285 10.9005 9.09061 11.0938L7.87793 12.3801C7.64114 12.6312 7.65278 13.0268 7.90394 13.2636C8.15509 13.5004 8.55065 13.4887 8.78744 13.2376L10.0001 11.9513C10.401 11.5261 10.6244 10.9637 10.6244 10.3792V6.87437Z"--}}
{{--                                        fill="#FFB927"--}}
{{--                                    />--}}
{{--                                    <path--}}
{{--                                        fill-rule="evenodd"--}}
{{--                                        clip-rule="evenodd"--}}
{{--                                        d="M9.99935 1.24937C5.0518 1.24937 1.04102 5.26015 1.04102 10.2077C1.04102 15.1553 5.0518 19.166 9.99935 19.166C14.9469 19.166 18.9577 15.1553 18.9577 10.2077C18.9577 5.26015 14.9469 1.24937 9.99935 1.24937ZM2.29102 10.2077C2.29102 5.95051 5.74215 2.49937 9.99935 2.49937C14.2565 2.49937 17.7077 5.95051 17.7077 10.2077C17.7077 14.4649 14.2565 17.916 9.99935 17.916C5.74215 17.916 2.29102 14.4649 2.29102 10.2077Z"--}}
{{--                                        fill="#FFB927"--}}
{{--                                    />--}}
{{--                                </svg>--}}
{{--                                <span>09:25</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </section>
    <section class="three" id="three">
        <div class="three__container">
            <div class="three__content">
                <div class="three__content_title title">
                    {{$settings['services.three__title']}}
                </div>
                <img src="../img/png/three01.png" alt="#" />
            </div>
            <div class="three__form">
                <div class="three__steps">
                    <div class="three__steps_step">
                        <span class="title">01</span>
                        <p>{{$settings['services.three__step_one']}}</p>
                    </div>
                    <div class="three__steps_step">
                        <span class="title">02</span>
                        <p>{{$settings['services.three__step_two']}}</p>
                    </div>
                    <div class="three__steps_step">
                        <span class="title">03</span>
                        <p>{{$settings['services.three__step_three']}}</p>
                    </div>
                </div>
                <div class="three__inputs">
                    <input type="text" placeholder="{{$settings['home.input_name']}}" />
                    <input type="text" placeholder="{{$settings['home.input__family']}}" />
                </div>
                <input type="tel" placeholder="{{ $settings['home.input__phone'] }}" />
                <div class="dropdown-simple">
                    <a href="##">
                        <span>{{ $settings['home.service__dropdown_choose'] }}</span>
                        <img src="../img/svg/vector-down.svg" alt="#" />
                    </a>
                    <ul class="dropdown-simple_list">
                        @foreach($settings['services.three__step_dropdown'] as $item)
                            <li>
                                <a href="##"
                                >{{ $item['option'] }}</a
                                >
                            </li>
                        @endforeach
                    </ul>
                </div>
                <input
                    type="email"
                    placeholder="{{ $settings['home.input_email'] }}"
                />
                <a class="three__submit" href="##">
                    {{ $settings['home.input__send'] }}
                    <img src="../img/svg/form.svg" alt="#" />
                </a>
            </div>
        </div>
    </section>
    <section class="faq">
        <div class="faq__container">
            <div class="faq__title title">{{ $settings['home.faq__title'] }}</div>
            <div class="faq__tag tag">{{ $settings['home.tag__question'] }}</div>
            <div class="faq__columns">
                <div class="faq__questions">
                    @foreach($questions as $question)
                        @if ($loop->odd)
                            <div class="faq-item faq__item">
                                <div class="question">
                                    <span>{{ $question->translate($locale)->question }}</span>
                                    <svg
                                        width="26"
                                        height="26"
                                        viewBox="0 0 26 26"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            d="M6.93335 13.4331H19.9333M13.4333 19.9331V13.4331L13.4333 6.93311"
                                            stroke="#FFC357"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                        />
                                    </svg>
                                </div>
                                <div class="answer">
                                    Да, бухгалтер на аутсорсинге может полностью
                                    заменить штатного специалиста. Мы берем на
                                    себя все обязанности по ведению
                                    бухгалтерского учета, сдаче отчетности и
                                    взаимодействию с контролирующими органами.
                                    При этом вы получаете гарантированное
                                    качество услуг и экономию на содержании
                                    штатного сотрудника.
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="faq__questions">
                    @foreach($questions as $question)
                        @if ($loop->even)
                            <div class="faq-item faq__item">
                                <div class="question">
                                    <span>{{ $question->translate($locale)->question }}</span>
                                    <svg
                                        width="26"
                                        height="26"
                                        viewBox="0 0 26 26"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            d="M6.93335 13.4331H19.9333M13.4333 19.9331V13.4331L13.4333 6.93311"
                                            stroke="#FFC357"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                        />
                                    </svg>
                                </div>
                                <div class="answer">
                                    Да, бухгалтер на аутсорсинге может полностью
                                    заменить штатного специалиста. Мы берем на
                                    себя все обязанности по ведению
                                    бухгалтерского учета, сдаче отчетности и
                                    взаимодействию с контролирующими органами.
                                    При этом вы получаете гарантированное
                                    качество услуг и экономию на содержании
                                    штатного сотрудника.
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <!-- Специфичные скрипты только для главной страницы -->
@endpush
