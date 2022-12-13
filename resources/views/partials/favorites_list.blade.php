@if(count($items) > 0)
    <ul role="list" class="header-favorites-modal__list">
        @foreach($items as $item)
            <li class="header-favorites-modal__list-item">
                <div class="header-favorites-modal__list-item-info">
                    <picture class="header-favorites-modal__list-item-picture">
                        <img src="{{ $item['picture_url'] }}" loading="lazy"
                             decoding="async" alt="image" class="header-favorites-modal__list-item-img"
                             width="52" height="52">
                    </picture>
                    <h4 class="header-favorites-modal__list-item-title">{{ $item['title'] }}</h4>
                </div>
                <button type="button" aria-label="button" class="btn header-favorites-modal__clear-btn"
                        x-on:click="items = items.filter(i => i !== item)">
                    <svg class="header__favorites-menu-item-clear-icon" width="16" height="18">
                        <use
                            href="{{ asset('svg/svgSprites/svgSprite.svg#header-favorites-menu-clear-icon') }}"></use>
                    </svg>
                </button>
            </li>
        @endforeach
    </ul>
@else
    <p class="header-favorites-modal__clear-text">Вы ещё не выбрали проекты</p>
@endif
