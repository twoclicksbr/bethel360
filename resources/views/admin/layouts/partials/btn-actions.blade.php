<div class="card-toolbar">
    <a href="{{ route('person.create') }}" class="btn btn-sm btn-light-danger btn-active-danger me-2">
        <i class="ki-duotone ki-plus fs-1"></i>
        Nova Pessoa
    </a>

    {{-- <a href="" class="btn btn-sm btn-light-primary btn-active-primary">
        <i class="ki-duotone ki-search-list fs-1">
            <span class="path1"></span>
            <span class="path2"></span>
            <span class="path3"></span>
        </i>
        Pesquisar
    </a> --}}

    <a id="btn-toggle-search" class="btn btn-sm btn-light-primary btn-active-primary" data-bs-toggle="collapse" href="#searchPanel" role="button"
        aria-expanded="false" aria-controls="searchPanel">
        <i class="ki-duotone ki-search-list fs-1">
            <span class="path1"></span>
            <span class="path2"></span>
            <span class="path3"></span>
        </i>
        Pesquisar
    </a>
</div>
