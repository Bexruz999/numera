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
    <section class="story">
        <div class="story__container">
            <div class="story__numera numera">#Numera</div>
            <div class="story__title title">Реальные истории</div>
            <div class="story__swiper swiper-container">
                <div class="story__wrapper swiper-wrapper">
                    @foreach($histories as $history)
                        <div class="story__slide swiper-slide">
                            <div class="story__slide_img">
                                <img src="{{ asset($history->img) }}" alt="#" />
                            </div>
                            <div class="story__slide_content">
                                <div class="story__slide_name">{{$history->translate($locale)?->name }}</div>
                                <div class="story__slide_position">
                                    {{ $history->translate($locale)?->position}}
                                </div>
                                <div class="story__slide_text">
                                    <p>
                                        {{ $history->translate($locale)?->description }}
                                    </p>
                                    <span>Читать дальше</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="story__tag tag">Отзывы</div>
        </div>
    </section>
    <section class="trust">
        <div class="trust__container">
            <div class="trust__title title">Нам доверяют!</div>

            <div class="trust__swiper swiper-container">
                <div class="trust__wrapper swiper-wrapper">
                    @foreach($slides->concat($slides) as $slide)
                        <div class="trust__slide swiper-slide">
                            <img src="{{ asset($slide->img) }}" alt="#" />
                        </div>
                    @endforeach
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
