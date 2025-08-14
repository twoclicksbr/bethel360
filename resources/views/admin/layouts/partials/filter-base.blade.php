<div class="row">

    <div class="col-12 col-md-1 mb-3">
        <input type="text" name="search_id" value="{{ request('search_id') }}" class="form-control" placeholder="ID">
    </div>
    <div class="col-12 col-md-5 mb-3">
        <input type="text" name="search_name" value="{{ request('search_name') }}" class="form-control " placeholder="Pesquisar por nome">
    </div>

    <div class="col-12 col-md-2 mb-3">
        <select name="search_date_type" class="form-select mb-2" data-control="select2" data-hide-search="true">
            <option value="updated_at" {{ request('search_date_type') == 'updated_at' ? 'selected' : '' }}>Data de Alteração</option>
            <option value="created_at" {{ request('search_date_type') == 'created_at' ? 'selected' : '' }}>Data de Criação</option>
        </select>
    </div>

    <div class="col-12 col-md-2 mb-3">
        <input type="text" name="search_date_range" value="{{ request('search_date_range') }}" class="form-control" id="kt_datepicker_7"
            placeholder="Selecione o período">
    </div>

    <div class="col-12 col-md-2 mb-3">
        <select name="search_active" class="form-select mb-2" data-control="select2" data-hide-search="true">
            <option value="" {{ request('search_active') == '' ? 'selected' : '' }}>Todos os status</option>
            <option value="1" {{ request('search_active') == '1' ? 'selected' : '' }}>Público</option>
            <option value="0" {{ request('search_active') == '0' ? 'selected' : '' }}>Inativo</option>
        </select>
    </div>

</div>
