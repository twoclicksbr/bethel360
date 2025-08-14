@php
    $from  = $pagination['from'] ?? 0;
    $to    = $pagination['to'] ?? 0;
    $total = $pagination['total'] ?? 0;
@endphp

<span class="text-muted mt-1 fw-semibold fs-7">
    Encontramos: <b>{{ $total }}</b> registros
    {{-- Exibindo {{ $from }}–{{ $to }} de {{ $total }} registros cadastradas --}}
</span>
