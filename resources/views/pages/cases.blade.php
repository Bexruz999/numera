@extends('layouts.app')

@section('title', 'Главная страница - Название компании')
@section('description', 'Описание главной страницы для SEO')
@section('keywords', 'ключевые слова, главная, услуги')

@push('styles')
    <!-- Специфичные стили только для главной страницы -->
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endpush

@section('content')
    <section class="result">
        <div class="result__container">
            <div class="result__title title-big">
                Результаты, за которые не нужно краснеть — только
                гордиться
            </div>
            <div class="result__text text">
                Здесь мы делимся историями наших клиентов — от старта до
                системного роста. Настоящие кейсы и живые отзывы — о
                доверии, точности и спокойствии, которое даёт сервис
                Numera
            </div>
            <a
                href="/index.html#support-form"
                class="result__button yellow-button"
                >Получить консультацию</a
            >
            <img src="../img/png/case-bg01.png" alt="#" />
        </div>
    </section>
    <section class="partners">
        <div class="partners__container">
            <div class="partners__swiper swiper-container">
                <div class="partners__wrapper swiper-wrapper">
                    <div class="partners__slide swiper-slide">
                        <div class="partners__slide_about">
                            <img
                                src="../img/jpg/partners01.jpg"
                                alt="#"
                            />
                            <div class="partners__slide_about-content">
                                <span>Agro Kontinent</span>
                                <p>
                                    Одна из ведущих семенных и
                                    агрохимических компаний Узбекистана
                                </p>
                            </div>
                        </div>
                        <div class="partners__slide_list">
                            <div class="partners__slide_item">
                                <img src="../img/svg/bag.svg" alt="#" />
                                <div class="partners__slide_item-text">
                                    <span>Компания:</span> Agro
                                    Kontinent
                                </div>
                            </div>
                            <div class="partners__slide_item">
                                <img src="../img/svg/bag.svg" alt="#" />
                                <div class="partners__slide_item-text">
                                    <span>Задача:</span> Восстановление
                                    бухгалтерского учёта за 2 года
                                </div>
                            </div>
                            <div class="partners__slide_item">
                                <img src="../img/svg/bag.svg" alt="#" />
                                <div class="partners__slide_item-text">
                                    <span>Решение:</span> Подключили
                                    аудит, оптимизировали налоги, навели
                                    порядок
                                </div>
                            </div>
                            <div class="partners__slide_item">
                                <img src="../img/svg/bag.svg" alt="#" />
                                <div class="partners__slide_item-text">
                                    <span>Результат:</span> Компания
                                    избежала штрафов и сэкономила 34 млн
                                    сум
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="partners__slide swiper-slide">
                        <div class="partners__slide_about">
                            <img
                                src="../img/jpg/partners01.jpg"
                                alt="#"
                            />
                            <div class="partners__slide_about-content">
                                <span>Agro Kontinent</span>
                                <p>
                                    Одна из ведущих семенных и
                                    агрохимических компаний Узбекистана
                                </p>
                            </div>
                        </div>
                        <div class="partners__slide_list">
                            <div class="partners__slide_item">
                                <img src="../img/svg/bag.svg" alt="#" />
                                <div class="partners__slide_item-text">
                                    <span>Компания:</span> Agro
                                    Kontinent
                                </div>
                            </div>
                            <div class="partners__slide_item">
                                <img src="../img/svg/bag.svg" alt="#" />
                                <div class="partners__slide_item-text">
                                    <span>Задача:</span> Восстановление
                                    бухгалтерского учёта за 2 года
                                </div>
                            </div>
                            <div class="partners__slide_item">
                                <img src="../img/svg/bag.svg" alt="#" />
                                <div class="partners__slide_item-text">
                                    <span>Решение:</span> Подключили
                                    аудит, оптимизировали налоги, навели
                                    порядок
                                </div>
                            </div>
                            <div class="partners__slide_item">
                                <img src="../img/svg/bag.svg" alt="#" />
                                <div class="partners__slide_item-text">
                                    <span>Результат:</span> Компания
                                    избежала штрафов и сэкономила 34 млн
                                    сум
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="partners__slide swiper-slide">
                        <div class="partners__slide_about">
                            <img
                                src="../img/jpg/partners01.jpg"
                                alt="#"
                            />
                            <div class="partners__slide_about-content">
                                <span>Agro Kontinent</span>
                                <p>
                                    Одна из ведущих семенных и
                                    агрохимических компаний Узбекистана
                                </p>
                            </div>
                        </div>
                        <div class="partners__slide_list">
                            <div class="partners__slide_item">
                                <img src="../img/svg/bag.svg" alt="#" />
                                <div class="partners__slide_item-text">
                                    <span>Компания:</span> Agro
                                    Kontinent
                                </div>
                            </div>
                            <div class="partners__slide_item">
                                <img src="../img/svg/bag.svg" alt="#" />
                                <div class="partners__slide_item-text">
                                    <span>Задача:</span> Восстановление
                                    бухгалтерского учёта за 2 года
                                </div>
                            </div>
                            <div class="partners__slide_item">
                                <img src="../img/svg/bag.svg" alt="#" />
                                <div class="partners__slide_item-text">
                                    <span>Решение:</span> Подключили
                                    аудит, оптимизировали налоги, навели
                                    порядок
                                </div>
                            </div>
                            <div class="partners__slide_item">
                                <img src="../img/svg/bag.svg" alt="#" />
                                <div class="partners__slide_item-text">
                                    <span>Результат:</span> Компания
                                    избежала штрафов и сэкономила 34 млн
                                    сум
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="partners__swiper swiper-container">
                <div class="partners__wrapper swiper-wrapper">
                    <div class="partners__slide swiper-slide">
                        <div class="partners__slide_about">
                            <img
                                src="../img/jpg/partners01.jpg"
                                alt="#"
                            />
                            <div class="partners__slide_about-content">
                                <span>Agro Kontinent</span>
                                <p>
                                    Одна из ведущих семенных и
                                    агрохимических компаний Узбекистана
                                </p>
                            </div>
                        </div>
                        <div class="partners__slide_list">
                            <div class="partners__slide_item">
                                <img src="../img/svg/bag.svg" alt="#" />
                                <div class="partners__slide_item-text">
                                    <span>Компания:</span> Agro
                                    Kontinent
                                </div>
                            </div>
                            <div class="partners__slide_item">
                                <img src="../img/svg/bag.svg" alt="#" />
                                <div class="partners__slide_item-text">
                                    <span>Задача:</span> Восстановление
                                    бухгалтерского учёта за 2 года
                                </div>
                            </div>
                            <div class="partners__slide_item">
                                <img src="../img/svg/bag.svg" alt="#" />
                                <div class="partners__slide_item-text">
                                    <span>Решение:</span> Подключили
                                    аудит, оптимизировали налоги, навели
                                    порядок
                                </div>
                            </div>
                            <div class="partners__slide_item">
                                <img src="../img/svg/bag.svg" alt="#" />
                                <div class="partners__slide_item-text">
                                    <span>Результат:</span> Компания
                                    избежала штрафов и сэкономила 34 млн
                                    сум
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="partners__slide swiper-slide">
                        <div class="partners__slide_about">
                            <img
                                src="../img/jpg/partners01.jpg"
                                alt="#"
                            />
                            <div class="partners__slide_about-content">
                                <span>Agro Kontinent</span>
                                <p>
                                    Одна из ведущих семенных и
                                    агрохимических компаний Узбекистана
                                </p>
                            </div>
                        </div>
                        <div class="partners__slide_list">
                            <div class="partners__slide_item">
                                <img src="../img/svg/bag.svg" alt="#" />
                                <div class="partners__slide_item-text">
                                    <span>Компания:</span> Agro
                                    Kontinent
                                </div>
                            </div>
                            <div class="partners__slide_item">
                                <img src="../img/svg/bag.svg" alt="#" />
                                <div class="partners__slide_item-text">
                                    <span>Задача:</span> Восстановление
                                    бухгалтерского учёта за 2 года
                                </div>
                            </div>
                            <div class="partners__slide_item">
                                <img src="../img/svg/bag.svg" alt="#" />
                                <div class="partners__slide_item-text">
                                    <span>Решение:</span> Подключили
                                    аудит, оптимизировали налоги, навели
                                    порядок
                                </div>
                            </div>
                            <div class="partners__slide_item">
                                <img src="../img/svg/bag.svg" alt="#" />
                                <div class="partners__slide_item-text">
                                    <span>Результат:</span> Компания
                                    избежала штрафов и сэкономила 34 млн
                                    сум
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="partners__slide swiper-slide">
                        <div class="partners__slide_about">
                            <img
                                src="../img/jpg/partners01.jpg"
                                alt="#"
                            />
                            <div class="partners__slide_about-content">
                                <span>Agro Kontinent</span>
                                <p>
                                    Одна из ведущих семенных и
                                    агрохимических компаний Узбекистана
                                </p>
                            </div>
                        </div>
                        <div class="partners__slide_list">
                            <div class="partners__slide_item">
                                <img src="../img/svg/bag.svg" alt="#" />
                                <div class="partners__slide_item-text">
                                    <span>Компания:</span> Agro
                                    Kontinent
                                </div>
                            </div>
                            <div class="partners__slide_item">
                                <img src="../img/svg/bag.svg" alt="#" />
                                <div class="partners__slide_item-text">
                                    <span>Задача:</span> Восстановление
                                    бухгалтерского учёта за 2 года
                                </div>
                            </div>
                            <div class="partners__slide_item">
                                <img src="../img/svg/bag.svg" alt="#" />
                                <div class="partners__slide_item-text">
                                    <span>Решение:</span> Подключили
                                    аудит, оптимизировали налоги, навели
                                    порядок
                                </div>
                            </div>
                            <div class="partners__slide_item">
                                <img src="../img/svg/bag.svg" alt="#" />
                                <div class="partners__slide_item-text">
                                    <span>Результат:</span> Компания
                                    избежала штрафов и сэкономила 34 млн
                                    сум
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="trust">
        <div class="trust__container">
            <div class="trust__title title">Нам доверяют!</div>

            <div class="trust__swiper swiper-container">
                <div class="trust__wrapper swiper-wrapper">
                    <div class="trust__slide swiper-slide">
                        <img src="../img/jpg/trust01.jpg" alt="#" />
                    </div>
                    <div class="trust__slide swiper-slide">
                        <img src="../img/jpg/trust02.jpg" alt="#" />
                    </div>
                    <div class="trust__slide swiper-slide">
                        <img src="../img/jpg/trust03.jpg" alt="#" />
                    </div>
                    <div class="trust__slide swiper-slide">
                        <img src="../img/jpg/trust04.jpg" alt="#" />
                    </div>
                    <div class="trust__slide swiper-slide">
                        <img src="../img/jpg/trust05.jpg" alt="#" />
                    </div>
                    <div class="trust__slide swiper-slide">
                        <img src="../img/jpg/trust01.jpg" alt="#" />
                    </div>
                    <div class="trust__slide swiper-slide">
                        <img src="../img/jpg/trust02.jpg" alt="#" />
                    </div>
                    <div class="trust__slide swiper-slide">
                        <img src="../img/jpg/trust03.jpg" alt="#" />
                    </div>
                    <div class="trust__slide swiper-slide">
                        <img src="../img/jpg/trust04.jpg" alt="#" />
                    </div>
                    <div class="trust__slide swiper-slide">
                        <img src="../img/jpg/trust05.jpg" alt="#" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="want">
        <div class="want__container">
            <div class="want__title title">
                Хотите такой же результат?
            </div>
            <div class="want__text text">
                Сэкономьте время, нервы и деньги. Мы возьмём на себя
                весь учёт, отчётность и расчёты, чтобы вы могли спокойно
                заниматься бизнесом. Первичная консультация — бесплатно
            </div>
            <a
                href="/index.html#support-form"
                class="want__button yellow-button-big"
                >Оставить заявку</a
            >
        </div>
    </section>
@endsection

@push('scripts')
    <!-- Специфичные скрипты только для главной страницы -->
@endpush