@foreach($items as $item)
    <li class="menu-item-has-children">
        <a href="{{ $item->url() }}">{{ $item->title }}</a>
        <span class="arow"></span>
        @if($item->hasChildren())
            <ul class="sub-menu">
                @include('partials.navigation',['items' => $item->children()])
            </ul>
        @endif
    </li>
@endforeach