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
                {{$settings['cases.title']}}
            </div>
            <div class="result__text text">
                {{$settings['cases.text']}}
            </div>
            <a
                href="/index.html#support-form"
                class="result__button yellow-button"
                >{{$settings['cases.btn_text']}}</a
            >
            <img src="../img/png/case-bg01.png" alt="#" />
        </div>
    </section>
    <section class="story">
        <div class="story__container">
            <div class="story__numera numera">#Numera</div>
            <div class="story__title title">{{$settings['cases.history_title']}}</div>
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
            <div class="trust__title title">{{$settings['cases.trust_title']}}</div>

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
                {{$settings['cases.want_title']}}
            </div>
            <div class="want__text text">
                {{$settings['cases.want_text']}}
            </div>
            <a
                href="/index.html#support-form"
                class="want__button yellow-button-big"
                >{{$settings['cases.want_btn_text']}}</a
            >
        </div>
    </section>
@endsection

@push('scripts')
    <!-- Специфичные скрипты только для главной страницы -->
@endpush
