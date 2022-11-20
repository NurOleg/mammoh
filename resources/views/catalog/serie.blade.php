@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render() }}

    <link rel="stylesheet" href="//simeydotme.github.io/jQuery-ui-Slider-Pips/dist/css/jqueryui.min.css">
    <link rel="stylesheet" href="//simeydotme.github.io/jQuery-ui-Slider-Pips/dist/css/jquery-ui-slider-pips.min.css">
    <script src="//simeydotme.github.io/jQuery-ui-Slider-Pips/dist/js/jquery-plus-ui.min.js" defer></script>
    <script src="{{ asset('js/modules/jquery-ui-slider-pips.js') }}" defer></script>
    <script src="{{ asset('js/modules/range-sliders.js') }}" defer></script>
    <section class="catalog-page">
        <div class="container catalog-page__container">
            <div class="catalog-page__title-row">
                @if(url()->current() != url()->previous())
                    <a href="{{ url()->previous() }}" class="previous-link catalog-page__previous-link">
                        <svg class="previous-link__icon" width="24" height="12">
                            <use href="{{ asset('svg/svgSprites/svgSprite.svg#icon-back') }}"></use>
                        </svg>
                    </a>
                @endif
                <h1 class="section-title catalog-page__section-title">{{ $serie->name }}</h1>
            </div>
            <h2 class="catalog-page__subtitle">{{ $serie->preview_text }}</h2>
            <div class="filter-dropdown" x-data="{toggleDropdown: false}">
                <div class="filter-dropdown__top" x-on:click="toggleDropdown = !toggleDropdown">
                    <svg class="filter-dropdown__icon" width="24" height="24">
                        <use href="{{ asset('svg/svgSprites/svgSprite.svg#icon-filter') }}"></use>
                    </svg>
                    <p class="filter-dropdown__top-text">Фильтры</p>
                    <svg class="filter-dropdown__arrow" width="13" height="10" x-bind:class="{ 'active': toggleDropdown === true }">
                        <use href="{{ asset('svg/svgSprites/svgSprite.svg#arrow-icon') }}"></use>
                    </svg>
                </div>
                <div class="filter-dropdown__body" x-show="toggleDropdown === true" x-collapse.duration.800ms>
                    <div class="filter-range-sliders-wrapper">
                        <div class="filter-range-slider__wrapper">
                            <h3 class="filter-range-slider__title">Передаточное число, U</h3>
                            <div class="filter-range-slider filter-range-slider--1"></div>
                            <div class="filter-range-slider__input-values">
                                <div class="filter-range-slider__input-values-wrapper">
                                    <input type="number"
                                           name="inputValueMin1"
                                           id="inputValueMin1"
                                           class="filter-range-slider__input filter-range-slider__input-min filter-range-slider__input-min--rangeSlider-1">
                                </div>
                                <div class="filter-range-slider__input-values-wrapper">
                                    <input type="number"
                                           name="inputValueMax1"
                                           id="inputValueMax1"
                                           class="filter-range-slider__input filter-range-slider__input-max filter-range-slider__input-max--rangeSlider-1">
                                </div>
                            </div>
                        </div>
                        <div class="filter-range-slider__wrapper">
                            <h3 class="filter-range-slider__title">Крутящий момент</h3>
                            <div class="filter-range-slider filter-range-slider--2"></div>
                            <div class="filter-range-slider__input-values">
                                <div class="filter-range-slider__input-values-wrapper">
                                    <input type="number" name="inputValueMin2" id="inputValueMin2" class="filter-range-slider__input filter-range-slider__input-min filter-range-slider__input-min--rangeSlider-2">
                                </div>
                                <div class="filter-range-slider__input-values-wrapper">
                                    <input type="number" name="inputValueMax2" id="inputValueMax2" class="filter-range-slider__input filter-range-slider__input-max filter-range-slider__input-max--rangeSlider-2">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="catalog-page__list" role="list">
                @foreach($reducers as $reducer)
                    <li class="catalog-page__list-item">
                        <h2 class="catalog-page__list-title">{{ $reducer->title }}</h2>
                        <ul class="catalog-page__chars-list">
                            <li class="catalog-page__chars-list-item">
                                <p>Ном. крутящий момент на вых. валу, Н*м</p>
                                <p>{{ $reducer->rated_output_torque }}</p>
                            </li>
                            <li class="catalog-page__chars-list-item">
                                <p>Передаточное отношение</p>
                                <p>{{ implode('; ', $reducer->gear_ratios->pluck('value')->all()) }}</p>
                            </li>
                            <li class="catalog-page__chars-list-item">
                                <p>Суммарное межосевое расстояние, мм</p>
                                <p>{{ $reducer->total_center_distance }}</p>
                            </li>
                            <li class="catalog-page__chars-list-item">
                                <p>Масса, кг</p>
                                <p>{{ $reducer->weight }}</p>
                            </li>
                        </ul>
                        <div class="catalog-page__list-btn-group">
                            <a href="{{ route('catalog.detail', ['slug' => $serie->slug, 'reducer_id' => $reducer->id]) }}"
                               class="btn btn--flat catalog-page__details-link">Подробнее</a>
                            <a href="#" class="btn btn--outline catalog-page__configurator-link">Конфигуратор</a>
                        </div>
                    </li>
                @endforeach
            </ul>
            {{ $reducers->links('vendor.pagination.custom') }}
{{--            <ul class="pagination" role="list">--}}
{{--                <li class="pagination__item active"><p>1</p></li>--}}
{{--                <li class="pagination__item"><p>2</p></li>--}}
{{--                <li class="pagination__item"><p>3</p></li>--}}
{{--                <li class="pagination__next-page-link">--}}
{{--                    <svg class="pagination__next-page-icon" width="10" height="12">--}}
{{--                        <use href="{{ asset('svg/svgSprites/svgSprite.svg#pagination-next-icon') }}"></use>--}}
{{--                    </svg>--}}
{{--                </li>--}}
{{--                <li class="pagination__end-link">--}}
{{--                    <svg class="pagination__end-icon" width="12" height="12">--}}
{{--                        <use href="{{ asset('svg/svgSprites/svgSprite.svg#pagination-end-icon') }}"></use>--}}
{{--                    </svg>--}}
{{--                </li>--}}
{{--            </ul>--}}
        </div>
    </section>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            initFilter(
                {{ $gearRatioFilter->first() }},
                {{ $gearRatioFilter->last() }},
                {{ $torqueFilter->first() }},
                {{ $torqueFilter->last() }}
            );
        });
    </script>
@endsection
