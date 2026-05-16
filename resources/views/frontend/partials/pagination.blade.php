@if ($paginator->hasPages())
    <nav aria-label="Page navigation" class="d-flex flex-column align-items-center gap-2">

        {{-- Showing X to Y of Z results --}}
        <p class="text-muted small mb-0">
            Showing {{ $paginator->firstItem() }} to {{ $paginator->lastItem() }}
            of {{ $paginator->total() }} results
        </p>

        {{-- Pagination Links --}}
        <ul class="pagination pagination-sm mb-0">

            {{-- Previous --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link rounded-start-pill">
                        <i class="fas fa-chevron-left fa-xs"></i>
                    </span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link rounded-start-pill" href="{{ $paginator->previousPageUrl() }}" rel="prev">
                        <i class="fas fa-chevron-left fa-xs"></i>
                    </a>
                </li>
            @endif

            {{-- Page Numbers --}}
            @foreach ($elements as $element)
                {{-- Dots --}}
                @if (is_string($element))
                    <li class="page-item disabled">
                        <span class="page-link">{{ $element }}</span>
                    </li>
                @endif

                {{-- Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active">
                                <span class="page-link bg-primary border-primary">{{ $page }}</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link rounded-end-pill" href="{{ $paginator->nextPageUrl() }}" rel="next">
                        <i class="fas fa-chevron-right fa-xs"></i>
                    </a>
                </li>
            @else
                <li class="page-item disabled">
                    <span class="page-link rounded-end-pill">
                        <i class="fas fa-chevron-right fa-xs"></i>
                    </span>
                </li>
            @endif

        </ul>
    </nav>
@endif
