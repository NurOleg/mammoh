@if(!$breadcrumbs->isEmpty())
    <nav class="breadcrumbs">
        <div class="container breadcrumbs__container">
            <ul class="breadcrumbs__list" role="list">
                @foreach($breadcrumbs as $breadcrumb)
                    @if(!is_null($breadcrumb->url) && !$loop->last)
                        <li class="breadcrumbs__item">
                            <a href="{{ $breadcrumb->url }}" class="breadcrumbs__item-link">{{ $breadcrumb->title }}</a>
                        </li>
                    @else
                        <li class="breadcrumbs__item">{{ $breadcrumb->title }}</li>
                    @endif
                @endforeach
            </ul>
        </div>
    </nav>
@endif
