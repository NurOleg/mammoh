@php
    use App\DTO\FavoriteItemsDto;
@endphp
@if(count($items) > 0)
    <ul role="list" class="header__favorites-menu-list">
        @foreach($items as $item)
            <li class="header__favorites-menu-item">
                <div class="header__favorites-menu-item-info">
                    <picture class="header__favorites-menu-item-picture">
                        <img src="{{ $item['picture_url'] }}" loading="lazy"
                             decoding="async" alt="image" class="header__favorites-menu-item-img" width="52"
                             height="52">
                    </picture>
                    <h4 class="header__favorites-menu-item-title">{{ $item['title'] }}</h4>
                </div>
                <button type="button" class="btn  header__favorites-menu-item-clear-btn"
                        x-on:click="items = items.filter(i => i !== item)">
                    <svg class="header__favorites-menu-item-clear-icon" width="16" height="18">
                        <use
                            href="{{ asset('svg/svgSprites/svgSprite.svg#header-favorites-menu-clear-icon') }}"></use>
                    </svg>
                </button>
            </li>
        @endforeach
    </ul>

    <button type="button" class="btn btn--primary header__favorites-menu-modal-btn"
            x-on:click="headerFavoritesModal = true">
        Запросить всё
    </button>
@else
    <p class="header__favorites-menu-text">Вы ещё не выбрали проекты</p>
@endif
