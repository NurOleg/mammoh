@php
    use Illuminate\Support\Facades\Storage;
@endphp

@extends('layouts.app')

@section('content')
    <script type="module">
        import Swiper from '//cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.esm.browser.min.js';

        const moreArticlesSlider = new Swiper('.more-articles__slider', {
            init: false,
            breakpoints: {
                1200: {
                    slidesPerView: 'auto',
                    loop: true,
                    loopedSlides: 3,
                    spaceBetween: 20,
                },
                1920: {
                    spaceBetween: 24,
                }
            }
        });

        if (window.innerWidth >= 1200) {
            moreArticlesSlider.init();
        }
    </script>
    <main class="main">
        <style>
            .breadcrumbs__list {
                color: var(--white-color);
            }
        </style>
        {{ Breadcrumbs::render() }}

        <div class="article-page-top-bg"
             style="background-image: url({{ Storage::url($article->preview_image_url) }});">
        </div>
        <section class="article-page">
            <div class="container article-page__container">
                <div class="article-page__top-row">
                    <a href="#" class="previous-link article-page__previous-link">
                        <svg class="previous-link__icon" width="24" height="12">
                            <use href="../resources/svgSprites/svgSprite.svg#icon-back-white"></use>
                        </svg>
                    </a>
                    <time class="article-page__datetime article-page__datetime--mobile" datetime="2022.06.16">
                        16.06.2022
                    </time>
                </div>
                <h1 class="section-title article-page__section-title">
                    {{ $article->title }}
                </h1>
                @if($article->reducer !== null)
                    <a href="{{route('catalog.detail', ['slug' => $article->reducer->serie->slug, 'reducer_id' => $article->reducer->id])}}" class="article-page__reductor-link">
                        {{ $article->reducer->title }}
                    </a>
                @endif
                <div class="article-page__bottom-row">
                    <time class="article-page__datetime article-page__datetime--tablet"
                          datetime="{{ $article->published_at->format('Y.m.d') }}">
                        {{ $article->published_at->format('d.m.Y') }}
                    </time>
                    @if(count($article->tags) > 0)
                        <ul role="list" class="article-page__tags-list">
                            @foreach($article->tags as $tag)
                                <li>{{ $tag->name }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                <div class="article-page__info">
                    {!! $article->description !!}
                </div>
            </div>
        </section>
        @if(count($sameArticles) > 0)
            <section class="more-articles">
                <div class="container more-articles__container">
                    <h2 class="section-title more-articles__section-title">Больше статей</h2>
                    <div class="swiper more-articles__slider">
                        <ul class="swiper-wrapper more-articles__slider-list" role="list">
                            @foreach($sameArticles as $article)
                                <li class="swiper-slide more-articles__slider-list-item">
                                    <a href="{{ route('articles.detail', ['slug' => $article->slug]) }}" class="more-articles__slider-link"></a>
                                    <figure class="more-articles__slider-card">
                                        <picture class="more-articles__slider-card-picture">
                                            <img loading="lazy" decoding="async"
                                                 src="{{ Storage::url($article->preview_image_url) }}" alt="image" width="200"
                                                 height="200" class="more-articles__slider-card-img">
                                        </picture>
                                        <figcaption class="more-articles__slider-card-figcaption">
                                            @if(count($article->tags) > 0)
                                                <ul role="list" class="more-articles__tags-list">
                                                    @foreach($article->tags as $tag)
                                                        <li>{{ $tag->name }}</li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                            <h3 class="more-articles__slider-card-title">
                                                {{ $article->title }}
                                            </h3>
                                            <time class="more-articles__datetime"
                                                  datetime="{{ $article->published_at->format('Y.m.d') }}">
                                                {{ $article->published_at->format('d.m.Y') }}
                                            </time>
                                        </figcaption>
                                    </figure>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </section>
        @endif
    </main>
@endsection
