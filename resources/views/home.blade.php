@php
use Illuminate\Support\Facades\Storage;
@endphp

@extends('layouts.app')

@section('content')
    <canvas id="particles-animation-bg">Your browser does not support the Canvas element.</canvas>
    <div id="index-bg-2"></div>
    <script src="{{ asset('js/modules/particlesAnimation.js') }}" defer></script>
    <script src="{{ asset('js/modules/indexPage.js') }}" defer></script>
    <div class="index-products">
        <div class="container index-products__container">
            <ul role="list" class="index-products__card-list">
                @foreach ($series as $serie)
                    <li class="index-products__card-list-item">
                        <figure class="index-products__card">
                            <picture class="index-products__picture">
                                <img src="{{ Storage::url($serie->preview_image_url) }}" loading="lazy" decoding="async" alt="image"
                                     width="243"
                                     height="164" class="index-products__img">
                            </picture>
                            <figcaption class="index-products__figcaption">
                                <h2 class="index-products__title">{{ $serie->name }}</h2>
                                <p class="index-products__subtitle">{{ $serie->preview_text }}</p>
                                <div class="index-products__figcaption-bottom">
                                    <a href="{{ route('catalog.serie', ['slug' => $serie->slug]) }}" class="index-products__link">подробнее</a>
                                    <a href="#" class="btn btn--outline index-products__btn-link">Конфигуратор</a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <section class="index-articles">
        <div class="container index-articles__container">
            <div class="index-articles__top-row">
                <h2 class="section-title index-articles__section-title">Статьи</h2>
                <a href="#" class="index-articles__all-articles-link index-articles__all-articles-link--tablet">Все
                    статьи</a>
            </div>
            <div class="index-articles__list-grid">
                <ul role="list" class="index-articles__list">
                    <li>
                        <a href="#" class="index-articles__link">
                            <figure class="index-articles__card index-articles__card--big">
                                <picture class="index-articles__picture index-articles__picture--big">
                                    <img src="resources/images/index-articles-card-img-1.jpg" loading="lazy"
                                         decoding="async" alt="image" class="index-articles__img" width="311"
                                         height="246">
                                </picture>
                                <figcaption class="index-articles__figcaption index-articles__figcaption--big">
                                    <ul role="list" class="index-articles__tags-list">
                                        <li>редукторы</li>
                                        <li>Длинный тег</li>
                                        <li>Супердлинный тег</li>
                                    </ul>
                                    <h3 class="index-articles__title index-articles__title--big">Шесть советов по
                                        обслуживанию редуктора</h3>
                                    <time class="index-articles__date" datetime="2022.09.08">09.08.2022</time>
                                </figcaption>
                            </figure>
                        </a>
                    </li>
                </ul>
                <ul role="list" class="index-articles__list" x-data="{items: [
      {title: 'Три варианта расположения валов промышленных редукторов', imgSrc: 'resources/images/index-articles-card-img-2.jpg'},
      {title: 'Технология замены масла', imgSrc: 'resources/images/index-articles-card-img-3.jpg'},
      {title: 'Почему редукторы выходят из строя', imgSrc: 'resources/images/index-articles-card-img-4.jpg'}
      ]}">
                    <template x-for="item in items">
                        <li>
                            <a href="#" class="index-articles__link">
                                <figure class="index-articles__card index-articles__card--small">
                                    <picture class="index-articles__picture index-articles__picture--small">
                                        <img x-bind:src="item.imgSrc" loading="lazy" decoding="async" alt="image"
                                             class="index-articles__img" width="120" height="118">
                                    </picture>
                                    <figcaption class="index-articles__figcaption">
                                        <ul role="list" class="index-articles__tags-list">
                                            <li>редукторы</li>
                                            <li>Длинный тег</li>
                                            <li>Супердлинный тег</li>
                                        </ul>
                                        <h3 class="index-articles__title index-articles__title--small"
                                            x-text="item.title">Шесть советов по обслуживанию редуктора</h3>
                                        <time class="index-articles__date" datetime="2022.09.08">09.08.2022</time>
                                    </figcaption>
                                </figure>
                            </a>
                        </li>
                    </template>
                </ul>
            </div>
            <a href="#" class="index-articles__all-articles-link index-articles__all-articles-link--mobile">Все
                статьи</a>
        </div>
    </section>
@endsection
