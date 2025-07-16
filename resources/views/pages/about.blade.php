@extends('layouts.app')

@section('title', 'Главная страница - Название компании')
@section('description', 'Описание главной страницы для SEO')
@section('keywords', 'ключевые слова, главная, услуги')

@push('styles')
    <!-- Специфичные стили только для главной страницы -->
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endpush

@section('content')
    <section class="buh">
        <div class="buh__container">
            <div class="buh__subtitle">{{ $settings['about.buh__subtitle'] }}</div>
            <div class="buh__title title">
                {!! str_replace(['[', ']'], ['<span>', '</span>'], $settings['about.buh__title']) !!}
            </div>
            <ul class="buh__list">
                @foreach($settings['about.buh__list'] as $social)
                    <li>
                        <img src="{{ $social['icon'] }}" alt="#"/>
                        <span>{{ $social['text'] }}</span>
                    </li>
                @endforeach
                {{--                <li>
                                    <img src="../img/svg/flash.svg" alt="#" />
                                    <span>Бухгалтерия нового поколения</span>
                                </li>
                                <li>
                                    <img src="../img/svg/charge.svg" alt="#" />
                                    <span>Автоматизируем рутину — экономим вашe время</span>
                                </li>
                                <li>
                                    <img src="../img/svg/danger.svg" alt="#" />
                                    <span>Работаем чётко. Отчитываемся честно</span>
                                </li>
                                <li>
                                    <img src="../img/svg/crown.svg" alt="#" />
                                    <span>Индивидуально под вас, не по шаблону</span>
                                </li>--}}
            </ul>
            <div class="buh__text text">
                {{$settings['about.buh__text']}}
            </div>
            <a
                href="/#support-form"
                class="buh__button yellow-button"
            >{{$settings['about.buh__button']}}</a
            >
            <div class="buh__bg">
                <img
                    class="only-dark"
                    src="{{$settings['about.buh__img-dark']}}"
                    alt="#"
                />
                <img
                    class="only-light"
                    src="{{$settings['about.buh__img']}}"
                    alt="#"
                />
            </div>
        </div>
    </section>
    <section class="mission">
        <div class="mission__container">
            <div class="mission__about numera">#about</div>
            <div class="mission__grid">
                <div class="mission__grid-about">
                    <div class="mission__grid-about_title title">
                        {{$settings['about_mission.title_l']}}
                    </div>
                    <div class="mission__grid-about_text text">
                        {{$settings['about_mission.text_l']}}
                    </div>
                </div>
                <div class="mission__grid-about">
                    <div class="mission__grid-about_title title">
                        {{$settings['about_mission.title_r']}}
                    </div>
                    <div class="mission__grid-about_text text">
                        {{$settings['about_mission.text_r']}}
                    </div>
                </div>
                <div class="mission__bg">
                    <img src="../img/png/target.png" alt="#"/>
                </div>
                <div class="mission__grid-about">
                    <div class="mission__grid-about_title title">
                        {{$settings['about_mission.our_values_title']}}
                    </div>
                    <ul class="mission__grid_list text">
                        @foreach($settings['about_mission.our_values_list'] as $value)
                            <li>
                                <img src="{{ $value['icon'] }}" alt="#"/>
                                <span>{{ $value['text'] }}</span>
                            </li>

                        @endforeach
                        {{--<li>
                            <img src="../img/svg/shield.svg" alt="#" />
                            <span
                                >Честность и прозрачность — мы работаем
                                без скрытых платежей и всегда открыты
                                перед клиентом.</span
                            >
                        </li>
                        <li>
                            <img src="../img/svg/octagon.svg" alt="#" />
                            <span
                                >Профессионализм и ответственность —
                                каждый бухгалтер Numera — это эксперт,
                                которому можно доверять.</span
                            >
                        </li>
                        <li>
                            <img src="../img/svg/done.svg" alt="#" />
                            <span
                                >Клиентоориентированность —
                                индивидуальный подход и вовлечённость в
                                задачи каждого бизнеса.</span
                            >
                        </li>
                        <li>
                            <img src="../img/svg/lock.svg" alt="#" />
                            <span
                                >Конфиденциальность — ваши данные всегда
                                в безопасности.</span
                            >
                        </li>
                        <li>
                            <img src="../img/svg/hash.svg" alt="#" />
                            <span
                                >Инновации и эффективность — мы
                                используем современные технологии, чтобы
                                работать быстро и точно.</span
                            >
                        </li>--}}
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="team">
        <div class="team__container">
            <div class="team__title-box">
                <div class="team__title-box_subtitle">
                    {{$settings['about_mission.team_text']}}
                </div>
                <div class="team__title-box_titles">
                    <div class="team__title-box_about numera">
                        #about
                    </div>
                    <div class="team__title-box_title title">
                        {{$settings['about_mission.team_title']}}
                    </div>
                </div>
            </div>
            <div class="team__grid">
                @foreach($commands as $command)
                    <div class="team__grid_card">
                        <div class="team__card_socials">
                            @php
                                $socials = strlen($command['social']) > 0 ? json_decode($command['social'], true) : [];

                            @endphp
                            @foreach($socials as $social)
                                <a href="{{ $social['Link'] }}" class="team__card_socials-linkedin">
                                    <img src="{{ $social['Icon'] }}" alt="#"/>
                                </a>
                            @endforeach
                        </div>
                        <div class="team__card_icon">
                            <img src="{{ asset($command->img) }}">
                        </div>
                        <div class="team__card_name">{{$command->translate($locale)?->name }}</div>
                        <div class="team__card_position">
                            {{$command->translate($locale)?->position }}
                        </div>
                        <div class="team__card_text text">
                            {{$command->translate($locale)?->description }}
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="team__history">
                <div class="team__img">
                    <img src="{{$settings['about_mission.history_bg']}}" alt="#"/>
                </div>
                <div class="team__content">
                    <div class="team__content_numera numera">
                        #about
                    </div>
                    <div class="team__history_title title">
                        {{$settings['about_mission.history_title']}}
                    </div>
                    <div class="team__history_text text">
                        {{$settings['about_mission.history_text']}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <!-- Специфичные скрипты только для главной страницы -->
@endpush
