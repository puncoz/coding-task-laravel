@if ($paginator->lastPage() > 1)
<ul class="pagination">
    <li  class="prev {{ ($paginator->currentPage() == 1) ? ' hidden' : '' }}">
        <a href="{{ URL::to('client/page/'.($paginator->currentPage()-1)) }}"><span aria-hidden="true">&laquo;</span></a>
    </li>
    @for ($i = 1; $i <= $paginator->lastPage(); $i++)
        <li class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
            <a href="{{ ($paginator->currentPage() == $i) ? 'javascript:;' : URL::to('client/page/'.$i) }}">{{ $i }}</a>
        </li>
    @endfor
    <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' hidden' : '' }}">
        <a href="{{ URL::to('client/page/'.($paginator->currentPage()+1)) }}" ><span aria-hidden="true">&raquo;</span></a>
    </li>

    @php
        $start = ($paginator->currentPage() * $paginator->perPage()) - $paginator->perPage();
        $from = $start + 1;
        $to = $start + $paginator->perPage();
        $to = ($to > $paginator->total()) ? $paginator->total() : $to;
    @endphp
    <li class="deadlink"><a><strong>{{ $from }}-{{ $to }}</strong> out of <strong>{{ $paginator->total() }}</strong> clients. </a></li>
</ul>
@endif