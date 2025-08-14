<div class="collapse mt-4" id="searchPanel">
    <div class="bg-light p-5 px-md-10 py-md-7 position-relative rounded">

        {{-- Título e botão X --}}
        <div class="d-flex justify-content-between align-items-start mb-2">
            <p class="bg-light text-gray-600 fs-5 mb-0">Filtros Avançados</p>

            <button type="button" class="btn btn-sm btn-icon btn-light-danger" id="btn-close-search" aria-label="Fechar"
                data-bs-toggle="tooltip" data-bs-placement="left" title="Fechar Pesquisa">
                <i class="ki-outline ki-cross-square fs-2"></i>
            </button>
        </div>

        <form id="searchForm" method="GET"  data-sc360-filter-form>

            <input type="hidden" name="sort" value="{{ request('sort', 'name') }}">
            <input type="hidden" name="direction" value="{{ request('direction', 'asc') }}">
            <input type="hidden" name="paginate" value="{{ request('paginate', '10') }}">


            @include('admin.layouts.partials.filter-base')
            @include('admin.person.partials.filter')

            @php
                $route = Route::currentRouteName();
            @endphp

            @include('admin.layouts.partials.filter-base-btn', [
                'route_cancel' => route($route),
                'route_clear' => route($route),
            ])

        </form>
    </div>
</div>
