<div class="col-12 d-flex justify-content-between flex-wrap gap-2 mt-3">

    {{-- Select de quantidade de registros --}}
    <div>
        <select name="paginate" class="form-select form-select-sm w-auto" data-control="select2" data-hide-search="true">
            <option value="10">10 registros</option>
            <option value="20">20 registros</option>
            <option value="50">50 registros</option>
            <option value="100">100 registros</option>
            <option value="all">Todos</option>
        </select>
    </div>

    {{-- Botões de ação --}}
    <div class="d-flex justify-content-end gap-2">
        <a id="btn-clear" href="{{ $route_cancel ?? url()->current() }}" class="btn btn-sm btn-light-danger">
            <i class="ki-duotone ki-tag-cross fs-1">
                <span class="path1"></span>
                <span class="path2"></span>
                <span class="path3"></span>
            </i>
            Limpar
        </a>

        <button id="btn-search" type="submit" class="btn btn-sm btn-light-primary">
            <i class="ki-duotone ki-search-list fs-1">
                <span class="path1"></span>
                <span class="path2"></span>
                <span class="path3"></span>
            </i>
            Pesquisar
        </button>
    </div>

</div>
