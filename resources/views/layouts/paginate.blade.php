@if ($paginator->hasPages())
    <div class="paginate-container">
        @if ($paginator->onFirstPage())
            <span class="paginate-text">←</span>
        @else
            <a class="paginate-text" href="{{ $paginator->previousPageUrl() }}" rel="prev">←</a>
        @endif
        @foreach ($elements as $element)
            @if (is_string($element))
                    <span>{{ $element }}</span>
            @endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                            <span class="paginate-link active-paginate-link">{{ $page }}</span>
                    @else
                            <a class="paginate-link" href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach
        @if ($paginator->hasMorePages())
                <a class="paginate-text" href="{{ $paginator->nextPageUrl() }}" rel="next">→</a>
        @else
                <span class="paginate-text">→</span>
        @endif
    </div>
@endif
