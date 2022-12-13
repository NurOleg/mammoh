@php
    use Illuminate\Support\Facades\Route;
@endphp
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>главная страница</title>
    <meta name="description" content="Page description">
    <meta property="og:title" content="Unique page title - My Site">
    <meta property="og:description" content="Page description">
    <meta property="og:image" content="https://www.mywebsite.com/image.jpg">
    <meta property="og:image:alt" content="Image description">
    <meta property="og:locale" content="ru">
    <meta property="og:type" content="website">
    <meta name="twitter:card" content="summary_large_image">
    <meta property="og:url" content="https://www.mywebsite.com/page">
    <link rel="canonical" href="https://www.mywebsite.com/page">
    <link rel="icon" href="/favicon.ico">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    <!-- <link rel="manifest" href="/my.webmanifest"> -->
    <meta name="theme-color" content="#fff"/>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{ asset('styles/main.css?v=1') }}"/>
    <!-- <link rel="stylesheet" href="styles/main.min.css" /> -->
</head>
<body
    x-data="{headerMobileMenu: false, headerFavorites: false, headerFavoritesModal: false, orderCompleteModal: false }"
    x-bind:class="{ 'overflow-hidden': headerMobileMenu === true || headerFavoritesModal === true || orderCompleteModal === true}">

<script defer src="//unpkg.com/@alpinejs/mask@3.x.x/dist/cdn.min.js"></script>
<script defer src="//unpkg.com/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
<script defer src="//unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<!-- <script src="js/modules/alpine.js" defer></script> -->
<script src="//code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="{{ asset('js/main.js?v=1') }}" defer></script>
<script src="{{ asset('js/custom.js?v=1') }}"></script>
<!-- <script src="js/main.min.js" defer></script> -->


<header class="header
        @if(Route::currentRouteName() === 'home')
            header--index-page"
        @endif
        x-on:click.outside="headerMobileMenu = false;headerFavorites = false">
    <div class="container header__container">
        <button type="button" class="header__mobile-menu-btn"
                x-on:click="headerFavorites = false;headerMobileMenu = !headerMobileMenu"
                x-bind:class="{ 'active': headerMobileMenu === true }">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <a href="#" class="header__logo header__logo--tablet">
            <svg class="header__logo-icon" width="28" height="28">
                <use href="{{ asset('svg/svgSprites/svgSprite.svg#logo-icon') }}"></use>
            </svg>
            <p class="header__logo-title">mammoh</p>
        </a>
        <div class="header__right">
            <ul class="header__menu" role="list">
{{--                <li><a href="{{ route('catalog') }}">Каталог</a></li>--}}
                <li><a href="{{ route('articles.index') }}">Статьи</a></li>
                <li><a href="{{ route('about') }}">О нас</a></li>
                <li><a href="{{ route('contacts') }}">Контакты</a></li>
            </ul>
            <button class="header__favorites-btn" type="button"
                    x-on:click="headerMobileMenu = false;headerFavorites = !headerFavorites"
                    x-bind:class="{ 'active': headerFavorites === true }">
                <svg class="header__favorites-star-icon" width="24" height="23">
                    <use class="header__favorites-star-icon-default"
                         href="{{ asset('svg/svgSprites/svgSprite.svg#star-icon-white') }}"></use>
                    <use class="header__favorites-star-icon-default-black"
                         href="{{ asset('svg/svgSprites/svgSprite.svg#star-icon') }}"></use>
                    <use class="header__favorites-star-icon-hover"
                         href="{{ asset('svg/svgSprites/svgSprite.svg#star-icon-hover') }}"></use>
                    <use class="header__favorites-star-icon-pressed"
                         href="{{ asset('svg/svgSprites/svgSprite.svg#star-icon-pressed') }}"></use>
                </svg>
                <span class="header__favorites-btn-count">
                    {{ count(session()->get('favorite_items') ?? []) }}
                </span>
            </button>
            <button class="header__auth-btn" type="button">
                <svg class="header__auth-icon" width="22" height="20">
                    <use class="header__auth-icon-default"
                         href="{{ asset('svg/svgSprites/svgSprite.svg#auth-icon-white') }}"></use>
                    <use class="header__auth-icon-default-black"
                         href="{{ asset('svg/svgSprites/svgSprite.svg#auth-icon') }}"></use>
                    <use class="header__auth-icon-hover"
                         href="{{ asset('svg/svgSprites/svgSprite.svg#auth-icon-hover') }}"></use>
                </svg>
                <span class="header__auth-btn-indicator"></span>
            </button>
        </div>
    </div>
    <nav class="header__mobile-menu" x-show="headerMobileMenu === true" x-collapse.duration.800ms>
        <a href="#" class="header__logo header__logo--mobile">
            <svg class="header__logo-icon" width="28" height="28">
                <use href="{{ asset('svg/svgSprites/svgSprite.svg#logo-icon') }}"></use>
            </svg>
            <p class="header__logo-title">mammoh</p>
        </a>
        <ul role="list" class="header__mobile-menu-list">
            <li><a href="#">Главная</a></li>
            <li><a href="#">Статьи</a></li>
            <li><a href="#">О нас</a></li>
            <li><a href="#">Контакты</a></li>
        </ul>
        <div class="header__lang-dropdown" x-data="{langDropdownList: false, langDropdownText: 'Русский'}"
             x-on:click.outside="langDropdownList = false">
            <div class="header__lang-dropdown-top" x-on:click="langDropdownList = !langDropdownList">
                <svg class="header__lang-dropdown-icon" width="18" height="18">
                    <use href="{{ asset('svg/svgSprites/svgSprite.svg#lang-icon-black') }}"></use>
                </svg>
                <p class="header__lang-dropdown-text" x-text="langDropdownText">Русский</p>
                <svg class="header__lang-dropdown-arrow" width="13" height="10"
                     x-bind:class="{ 'active': langDropdownList === true }">
                    <use href="{{ asset('svg/svgSprites/svgSprite.svg#arrow-icon') }}"></use>
                </svg>
            </div>
            <ul role="list" class="header__lang-dropdown-list" x-show="langDropdownList === true"
                x-collapse.duration.800ms>
                <li x-on:click="langDropdownText = 'Русский';langDropdownList = false"
                    x-bind:class="{ 'active': langDropdownText === 'Русский' }">Русский
                </li>
                <li x-on:click="langDropdownText = 'English';langDropdownList = false"
                    x-bind:class="{ 'active': langDropdownText === 'English' }">English
                </li>
                <li x-on:click="langDropdownText = 'الإمارات العربية المتحدة';langDropdownList = false"
                    x-bind:class="{ 'active': langDropdownText === 'الإمارات العربية المتحدة' }">الإمارات العربية
                    المتحدة
                </li>
                <li x-on:click="langDropdownText = '中国';langDropdownList = false"
                    x-bind:class="{ 'active': langDropdownText === '中国'}">中国
                </li>
            </ul>
        </div>
    </nav>
    <nav class="header__favorites-menu"
         x-show="headerFavorites === true" x-collapse.duration.800ms>
        <div class="header__favorites-menu-top">
            <h3>Избранные проекты</h3>
            <button type="button" class="btn header__favorites-menu-close" x-on:click="headerFavorites = false">
                <svg class="header__favorites-menu-close-icon" width="12" height="12">
                    <use href="{{ asset('svg/svgSprites/svgSprite.svg#close-icon') }}"></use>
                </svg>
            </button>
        </div>
        <div id="header__favorites-menu__list">
            @include('partials.favorites', ['items' => session()->get('favorite_items') ?? []])
        </div>
    </nav>
</header>


<script src="//code.createjs.com/easeljs-0.7.1.min.js" defer></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js" defer></script>

<main class="main">
    @yield('content')
</main>

<div class="modal header-favorites-modal" x-bind:class="{ 'active': headerFavoritesModal === true }" x-on:click.self="headerFavoritesModal = false">
    <div class="modal-content header-favorites-modal__content">
        <div class="header-favorites-modal__top">
            <div class="modal__title-wrapper header-favorites-modal__title-wrapper">
                <h3 class="modal__title header-favorites-modal__title">Вы выбрали</h3>
                <button type="button" aria-label="button" class="btn modal__close-btn header-favorites-modal__close-btn"
                        x-on:click="headerFavoritesModal = false">
                    <svg class="header-favorites-modal__close-btn-icon" width="15" height="15">
                        <use href="{{ asset('svg/svgSprites/svgSprite.svg#close-icon') }}"></use>
                    </svg>
                </button>
            </div>
            <div id="header__favorites-menu-modal__list">
                @include('partials.favorites_list', ['items' => session()->get('favorite_items') ?? []])
            </div>
        </div>
        <div class="header-favorites-modal__bottom">
            <form action="#" method="post" class="modal__form header-favorites-modal__form"
                  @submit.prevent="headerFavoritesModal = false; orderCompleteModal = true; sendFavoriteForm;">
                <fieldset class="header-favorites-modal__fieldset">
                    <div class="form-controls-wrapper header-favorites-modal__form-controls-wrapper">
                        <label for="headerFavoritesModalName">ФИО <sup>*</sup></label>
                        <div class="form-controls-wrapper__validation-wrapper">
                            <input type="text" name="headerFavoritesModalName" id="headerFavoritesModalName"
                                   placeholder="Ваше имя" required>
                            <svg class="form-controls-wrapper__error-icon" width="18" height="18">
                                <use href="{{ asset('svg/svgSprites/svgSprite.svg#error-icon') }}"></use>
                            </svg>
                            <svg class="form-controls-wrapper__correct-icon" width="18" height="18">
                                <use href="{{ asset('svg/svgSprites/svgSprite.svg#correct-icon') }}"></use>
                            </svg>
                        </div>
                    </div>
                    <div class="form-controls-wrapper header-favorites-modal__form-controls-wrapper">
                        <label for="headerFavoritesModalEmail">E-mail <sup>*</sup></label>
                        <div class="form-controls-wrapper__validation-wrapper">
                            <input type="email" name="headerFavoritesModalEmail" id="headerFavoritesModalEmail"
                                   placeholder="ivan@mail.ru" required>
                            <svg class="form-controls-wrapper__error-icon" width="18" height="18">
                                <use href="{{ asset('svg/svgSprites/svgSprite.svg#error-icon') }}"></use>
                            </svg>
                            <svg class="form-controls-wrapper__correct-icon" width="18" height="18">
                                <use href="{{ asset('svg/svgSprites/svgSprite.svg#correct-icon') }}"></use>
                            </svg>
                        </div>
                    </div>
                    <div class="form-controls-wrapper header-favorites-modal__form-controls-wrapper">
                        <label for="headerFavoritesModalTextarea">Комментарий к заявке</label>
                        <textarea id="headerFavoritesModalTextarea" placeholder="Введите текст"></textarea>
                    </div>
                    <button type="submit" class="btn btn--primary modal__submit-btn header-favorites-modal__submit-btn">
                        <span>Заказать</span></button>
                </fieldset>
            </form>
        </div>
    </div>
</div>
<div class="modal order-complete-modal" x-on:click.self="orderCompleteModal = false"
     x-bind:class="{ 'active': orderCompleteModal === true }">
    <div class="modal-content order-complete-modal__content">
        <div class="modal__title-wrapper order-complete-modal__title-wrapper">
            <h3 class="modal__title order-complete-modal__title">Заявка отправлена</h3>
            <button type="button" aria-label="button" class="btn modal__close-btn order-complete-modal__close-btn"
                    x-on:click="orderCompleteModal = false">
                <svg class="order-complete-modal__close-btn-icon" width="15" height="15">
                    <use href="{{ asset('svg/svgSprites/svgSprite.svg#close-icon') }}"></use>
                </svg>
            </button>
        </div>
        <p class="order-complete-modal__text">Менеджер свяжется с вами в ближайшее время.</p>
        <a href="{{ route('home') }}" class="btn btn--primary order-complete-modal__link">На главную</a>
    </div>
</div>
<button type="button" aria-label="button" class="to-top-btn" x-on:click="window.scrollTo(0,0)">
    <svg class="to-top-btn__icon" width="14" height="14">
        <use href="{{ asset('svg/svgSprites/svgSprite.svg#to-top-btn-icon') }}"></use>
    </svg>
</button>
<button type="button" aria-label="button" class="tawk-btn">
    <svg class="tawk-btn__icon" width="32" height="32">
        <use href="{{ asset('svg/svgSprites/svgSprite.svg#tawk-icon') }}"></use>
    </svg>
</button>
<footer class="footer">
    <div class="container footer__container">
        <div class="footer__lang-dropdown" x-data="{langDropdownList: false, langDropdownText: 'Русский'}"
             x-on:click.outside="langDropdownList = false">
            <div class="footer__lang-dropdown-top" x-on:click="langDropdownList = !langDropdownList">
                <svg class="footer__lang-dropdown-icon" width="18" height="18">
                    <use href="{{ asset('svg/svgSprites/svgSprite.svg#lang-icon-white') }}"></use>
                </svg>
                <p class="footer__lang-dropdown-text" x-text="langDropdownText">Русский</p>
                <svg class="footer__lang-dropdown-arrow" width="13" height="10"
                     x-bind:class="{ 'active': langDropdownList === true }">
                    <use href="{{ asset('svg/svgSprites/svgSprite.svg#arrow-icon-white') }}"></use>
                </svg>
            </div>
            <ul role="list" class="footer__lang-dropdown-list" x-show="langDropdownList === true"
                x-collapse.duration.800ms>
                <li x-on:click="langDropdownText = 'Русский';langDropdownList = false"
                    x-bind:class="{ 'active': langDropdownText === 'Русский' }">Русский
                </li>
                <li x-on:click="langDropdownText = 'English';langDropdownList = false"
                    x-bind:class="{ 'active': langDropdownText === 'English' }">English
                </li>
                <li x-on:click="langDropdownText = 'الإمارات العربية المتحدة';langDropdownList = false"
                    x-bind:class="{ 'active': langDropdownText === 'الإمارات العربية المتحدة' }">الإمارات العربية
                    المتحدة
                </li>
                <li x-on:click="langDropdownText = '中国';langDropdownList = false"
                    x-bind:class="{ 'active': langDropdownText === '中国'}">中国
                </li>
            </ul>
        </div>
        <ul role="list" class="footer__media-list">
            <li>
                <a href="#">
                    <svg class="footer__tg-icon" width="18" height="16" viewBox="0 0 18 16" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M16.666 1.3335L0.666016 8.00016L6.56075 8.88905M16.666 1.3335L14.5608 14.6668L6.56075 8.88905M16.666 1.3335L6.56075 8.88905L16.666 1.3335ZM6.56075 8.88905V13.7779L9.29675 10.8651"
                            fill="#FCFDFE"/>
                        <path
                            d="M16.666 1.3335L0.666016 8.00016L6.56075 8.88905M16.666 1.3335L14.5608 14.6668L6.56075 8.88905M16.666 1.3335L6.56075 8.88905M6.56075 8.88905V13.7779L9.29675 10.8651"
                            stroke="#FCFDFE" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </li>
            <li>
                <a href="#">
                    <svg class="footer__vk-icon" width="20" height="13" viewBox="0 0 20 13" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M11.6985 12.5847V9.07219C13.8332 9.4319 14.5081 11.2887 15.8674 12.5847H19.3327C18.4663 10.447 17.1736 8.55358 15.5515 7.04615C16.7959 5.15236 18.117 3.36965 18.7631 0.666504H15.6137C14.3788 2.73486 13.7279 5.15765 11.6985 6.7552V0.666504H7.12755L8.21884 2.15826V7.47463C6.4479 7.24717 5.25131 3.66589 3.95422 0.666504H0.666016C1.8626 4.71858 4.3802 13.6109 11.6985 12.5847Z"
                            fill="#FCFDFE"/>
                    </svg>
                </a>
            </li>
        </ul>
        <p class="footer__copyright">
            <span>Copyright © 2006 -2022, Mammoh. All rights reserved.</span>
            <span>Icons (c) 2020-2022 Paweł Kuna</span>
        </p>
    </div>
</footer>
<div class="overlay-bg" x-bind:class="{ 'active': headerMobileMenu === true || headerFavorites === true }"></div>
</body>
</html>
