@php
use Illuminate\Support\Facades\Storage;
@endphp

@extends('layouts.app')

@section('content')
    <main class="main">
        {{ Breadcrumbs::render() }}

        <section class="articles-page" x-data="{toggleTagsList: false}">
            <div class="container articles-page__container">
                <div class="articles-page__title-row">
                    @if(url()->current() != url()->previous())
                        <a href="{{ url()->previous() }}" class="previous-link articles-page__previous-link">
                            <svg class="previous-link__icon" width="24" height="12">
                                <use href="{{ asset('svg/svgSprites/svgSprite.svg#icon-back') }}"></use>
                            </svg>
                        </a>
                    @endif
                    <h1 class="section-title articles-page__section-title">Статьи</h1>
{{--                    <form class="articles-page__search" action="#">--}}
{{--                        <button type="submit" aria-label="button" class="articles-page__search-btn">--}}
{{--                            <svg class="articles-page__search-btn-icon" width="18" height="18">--}}
{{--                                <use href="../resources/svgSprites/svgSprite.svg#icon-search"></use>--}}
{{--                            </svg>--}}
{{--                        </button>--}}
{{--                        <input type="search" placeholder="Поиск" class="articles-page__search-input">--}}
{{--                    </form>--}}
                </div>
            </div>
            <form action="#" class="articles-page__tags">
                <fieldset>
                    @foreach($tags->chunk(6) as $tagList)
                        <ul role="list" class="articles-page__tags-list">
                            @foreach($tagList as $tag)
                                <li class="articles-page__tags-list-item">
                                    <input type="checkbox" name="tagsList[]" id="{{ $tag->code }}" class="articles-page__tags-radio">
                                    <button type="button" aria-label="button" class="articles-page__tags-btn">
                                        <span>{{ $tag->name }}</span>
                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                             xmlns="http://www.w3.org/2000/svg" class="articles-page__tags-btn-icon">
                                            <path d="M10.714 6.04608H1.28595M6 1.33203V10.7601" stroke="#001A20"
                                                  stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </button>
                                </li>
                            @endforeach
                        </ul>
                    @endforeach
                </fieldset>
            </form>
            <button type="button" aria-label="button" class="articles-page__expand-tags-list-btn"
                    x-on:click="toggleTagsList = !toggleTagsList"><span
                    x-text="toggleTagsList === false ? 'Ещё категории' : 'Скрыть'">Ещё категории</span>
                <svg class="articles-page__expand-tags-list-btn-icon" width="12" height="10"
                     x-bind:class="{ 'active': toggleTagsList === true }">
                    <use href="../resources/svgSprites/svgSprite.svg#icon-expand-blue"></use>
                </svg>
            </button>
            <div class="container articles-page__container articles-page__list-container">
                <ul class="articles-page__list" role="list">
                    @foreach($articles as $article)
                        <li class="articles-page__list-item">
                            <figure class="articles-page__list-item-card">
                                <a href="{{ route('articles.detail', ['slug' => $article->slug]) }}"
                                   class="articles-page__list-item-link"></a>
                                <picture class="articles-page__list-item-picture">
                                    <img src="{{ Storage::url($article->preview_image_url) }}" loading="lazy"
                                         decoding="async" alt="image" width="212" height="118"
                                         class="articles-page__list-item-img">
                                </picture>
                                <figcaption>
                                    @if(count($article->tags) > 0)
                                        <ul role="list" class="articles-page__list-item-tags">
                                            @foreach($article->tags as $tag)
                                                <li>{{ $tag->name }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                    <h3>{{ $article->title }}</h3>
                                    <time
                                        datetime="{{ $article->published_at->format('Y.m.d') }}">{{ $article->published_at->format('d.m.Y') }}</time>
                                </figcaption>
                            </figure>
                        </li>
                    @endforeach
                </ul>
                <div class="articles-page__controls-group">
                    <div class="articles-page__display-articles-count">
                        <p>Отображать на странице:</p>
                        <div class="articles-page__display-articles-count-select">
                            <select name="displayArticlesCount" id="displayArticlesCount">
                                <option value="10" selected="">10</option>
                                <option value="10">20</option>
                                <option value="10">30</option>
                            </select>
                        </div>
                    </div>
                    {{ $articles->links('vendor.pagination.custom') }}
                </div>
            </div>
        </section>
    </main>
@endsection
