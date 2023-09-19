@if ($paginator->hasPages())
    <nav aria-label="Pagination">
        <hr class="my-0" />
        <ul class="pagination justify-content-center my-4">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Newer</a></li>
            @else
            <li class="page-item " aria-current="page"><a class="page-link" href="{{ $paginator->previousPageUrl() }}">Newer</a></li>
                
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    
                
                <li class="page-item disabled"><a class="page-link" href="#!">{{ $element }}</a></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                        <li class="page-item active"><a class="page-link" href="#!">{{ $page }}</a></li>

                        @else
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())

                <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}">Older</a></li>

            @else
               
                <li class="page-item disabled"><a class="page-link" href="#!">Older</a></li>
            @endif
        </ul>
    </nav>
@endif
