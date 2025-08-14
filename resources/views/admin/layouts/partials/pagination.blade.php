@php use Illuminate\Support\Str; @endphp

@if (!empty($pagination['links']))
    <div class="d-flex justify-content-end mt-4">
        <nav>
            <ul class="pagination">
                @foreach ($pagination['links'] as $link)
                    @php
                        if ($link['url']) {
                            $parsed = parse_url($link['url']);
                            parse_str($parsed['query'] ?? '', $params);
                            $page = $params['page'] ?? null;
                        } else {
                            $page = null;
                        }

                        $queryString = http_build_query(array_merge(request()->query(), ['page' => $page]));
                        $url = $page ? url()->current() . '?' . $queryString : null;

                        $label = str_replace(
                            ['pagination.previous', 'pagination.next'],
                            ['&laquo;', '&raquo;'],
                            $link['label'],
                        );
                    @endphp
                    <li class="page-item {{ $link['active'] ? 'active' : '' }} {{ !$url ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $url ?? '#' }}">
                            {!! $label !!}
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>
    </div>
@endif
