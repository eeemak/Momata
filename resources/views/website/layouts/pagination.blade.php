<nav id="pagination" class="pagination_wrap pagination_pages">
    @if($paginator->currentPage() != 1)
    <a href="{{ $paginator->url($paginator->url(1)) }}" class="pager_first" title="First Page"></a>
    <a href="{{ $paginator->previousPageUrl() }}" class="pager_prev" title="Previous Page"></a>
    @endif
    @for($i = 1; $i <= $paginator->lastPage(); $i++)
    @if($paginator->currentPage() == $i)
    <span class="pager_current active ">{{ $i }}</span>
    @else
    <a href="{{ $paginator->url($i) }}" class="">{{ $i }}</a>
    @endif
    @endfor
    @if($paginator->currentPage() != $paginator->lastPage())
    <a href="{{ $paginator->nextPageUrl() }}" class="pager_next" title="Next Page"></a>
    <a href="{{ $paginator->url($paginator->lastPage()) }}" class="pager_last" title="Last Page"></a>
    @endif
</nav>
