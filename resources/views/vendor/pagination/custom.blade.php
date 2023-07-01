@vite(['resources/css/navigation.css'])

@if ($paginator->hasPages())
    <nav class="pagination">
        @if ($paginator->onFirstPage())
            <a href="#" class="page-link prev disabled" tabindex="-1">
                &laquo; Precedente
            </a>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="page-link prev" tabindex="-1">
                &laquo; Precedente
            </a>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="page-item disabled">{{ $element }}</li>
            @endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a href="#" class="page-link page active">{{ $page }}</a>
                    @else
                        <a href="{{ $url }}" class="page-link page">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="page-link next">
                Successivo &raquo;
            </a>
        @else
            <a href="#" class="page-link next disabled">
                Successivo &raquo;
            </a>
        @endif
@endif
