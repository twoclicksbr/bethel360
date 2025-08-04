<div class="card-toolbar">
    @php
        $routeBase = explode('.', Route::currentRouteName())[0];
    @endphp

    <a href="{{ route($routeBase . '.create') }}" class="btn btn-sm btn-light-danger btn-active-danger me-2">
        <i class="ki-duotone ki-plus fs-1"></i>
        Novo Registro
    </a>

    <a id="btn-toggle-search" class="btn btn-sm btn-light-primary btn-active-primary me-2" data-bs-toggle="collapse"
        href="#searchPanel" role="button" aria-expanded="false" aria-controls="searchPanel">
        <i class="ki-duotone ki-search-list fs-1">
            <span class="path1"></span><span class="path2"></span><span class="path3"></span>
        </i>
        Pesquisar
    </a>

    <a href="#" id="btn-print-global" class="btn btn-sm btn-icon btn-light-primary">
        <i class="fas fa-print"></i>
    </a>
</div>
