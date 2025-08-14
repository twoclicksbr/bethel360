<div class="col-12 d-flex justify-content-between flex-wrap gap-2 mt-3">

    {{-- Select de quantidade + switch de excluídos --}}
    <div class="d-flex align-items-center gap-5">
        <select name="paginate" class="form-select form-select-sm w-auto" data-control="select2" data-hide-search="true">
            <option value="5" {{ request('paginate') == '5' ? 'selected' : '' }}>5 registros</option>
            <option value="10" {{ request('paginate') == '10' ? 'selected' : '' }}>10 registros</option>
            <option value="20" {{ request('paginate') == '20' ? 'selected' : '' }}>20 registros</option>
            <option value="50" {{ request('paginate') == '50' ? 'selected' : '' }}>50 registros</option>
            <option value="100" {{ request('paginate') == '100' ? 'selected' : '' }}>100 registros</option>
            <option value="all" {{ request('paginate') == 'all' ? 'selected' : '' }}>Todos</option>
        </select>

        {{-- Switch de excluídos --}}
        <div class="form-check form-switch form-check-custom form-check-solid">
            <input class="form-check-input h-20px w-30px" type="checkbox" name="show_deleted" id="show_deleted" value="1"
                {{ request('show_deleted') ? 'checked' : '' }}>
            <label class="form-check-label" for="show_deleted">
                Excluídos
            </label>
        </div>
    </div>

    {{-- Botões de ação --}}
    <div class="d-flex justify-content-end gap-2">
        <a id="btn-clear" href="{{ url()->current() }}?paginate=10" class="btn btn-sm btn-light-danger">
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
