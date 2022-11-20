@if ($paginator->hasPages())
    <ul class="pagination" role="list">
{{--        @if ($paginator->onFirstPage())--}}
{{--            <li class="pagination__item active"><p>1</p></li>--}}
{{--        @else--}}
{{--            --}}{{--            <a href="{{ $paginator->previousPageUrl() }}"--}}
{{--            --}}{{--               class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">--}}
{{--            --}}{{--                {!! __('pagination.previous') !!}--}}
{{--            --}}{{--            </a>--}}
{{--        @endif--}}

{{--        @if ($paginator->hasMorePages())--}}
{{--            <li class="pagination__next-page-link">--}}
{{--                <a href="{{ $paginator->nextPageUrl() }}">--}}
{{--                    <svg class="pagination__next-page-icon" width="10" height="12">--}}
{{--                        <use href="{{ asset('svg/svgSprites/svgSprite.svg#pagination-next-icon') }}"></use>--}}
{{--                    </svg>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            @if($paginator->url($paginator->lastPage()) == $paginator->nextPageUrl())--}}
{{--                <li class="pagination__end-link">--}}
{{--                    <a href="{{ $paginator->url($paginator->lastPage()) }}">--}}
{{--                        <svg class="pagination__end-icon" width="12" height="12">--}}
{{--                            <use href="{{ asset('svg/svgSprites/svgSprite.svg#pagination-end-icon') }}"></use>--}}
{{--                        </svg>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            @endif--}}
{{--        @endif--}}
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="pagination__item active"><p>{{ $page }}</p></li>
                        @else
                            <li class="pagination__item">
                                <a href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="pagination__next-page-link">
                    <a href="{{ $paginator->nextPageUrl() }}">
                        <svg class="pagination__next-page-icon" width="10" height="12">
                            <use href="{{ asset('svg/svgSprites/svgSprite.svg#pagination-next-icon') }}"></use>
                        </svg>
                    </a>
                </li>
                @if($paginator->url($paginator->lastPage()) == $paginator->nextPageUrl())
                    <li class="pagination__end-link">
                        <a href="{{ $paginator->url($paginator->lastPage()) }}">
                            <svg class="pagination__end-icon" width="12" height="12">
                                <use href="{{ asset('svg/svgSprites/svgSprite.svg#pagination-end-icon') }}"></use>
                            </svg>
                        </a>
                    </li>
                @endif
            @endif
    </ul>
@endif
