<div class="row">
    <div class="col-12 col-md-2 mb-3">
        <select name="birthdate" class="form-select mb-2" data-control="select2" data-hide-search="true">
            <option value="" {{ request('birthdate') == '' ? 'selected' : '' }}>Aniversariantes</option>
            <option value="day" {{ request('birthdate') == 'day' ? 'selected' : '' }}>Hoje</option>
            <option value="week" {{ request('birthdate') == 'week' ? 'selected' : '' }}>Esta Semana</option>
            <option value="month" {{ request('birthdate') == 'month' ? 'selected' : '' }}>Este Mês</option>
        </select>
    </div>

    <div class="col-12 col-md-2 mb-3">
        <select name="id_gender" class="form-select mb-2" data-control="select2" data-hide-search="true">
            <option value="">Todos os gêneros</option>
            @foreach ($genders as $gender)
                <option value="{{ $gender->id }}" {{ request('id_gender') == $gender->id ? 'selected' : '' }}>
                    {{ $gender->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-12 col-md-2 mb-3">
        <select name="city" class="form-select mb-2" data-control="select2">
            <option value="">Todas as cidades</option>
            @foreach ($cities as $city)
                <option value="{{ $city }}" {{ request('city') == $city ? 'selected' : '' }}>
                    {{ $city }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- <div class="col-12 col-md-2 mb-3">
        <select id="id_type_document" name="typeDocument" class="form-select" data-control="select2">
            <option value="">Documento</option>
            @foreach ($typeDocuments as $doc)
                <option value="{{ $doc->id }}" data-mask="{{ $doc->mask }}"
                    {{ request('typeDocument') == $doc->id ? 'selected' : '' }}>
                    {{ $doc->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-12 col-md-2 mb-3" id="valueDocumentWrapper" style="display:none;">
        <input type="text" id="input-document-value" name="valueDocument" class="form-control"
            value="{{ request('valueDocument') }}">
    </div> --}}


    <div class="col-12 col-md-2 mb-3">
        <select id="typeDocument" name="typeDocument" class="form-select" data-control="select2">
            <option value="">Documento</option>
            @foreach ($typeDocuments as $doc)
                <option value="{{ $doc->id }}" data-mask="{{ $doc->mask ?? '' }}"
                    {{ request('typeDocument') == $doc->id ? 'selected' : '' }}>
                    {{ $doc->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-12 col-md-2 mb-3" id="valueDocumentWrapper" style="display:none;">
        <input type="text" id="valueDocument" name="valueDocument" class="form-control" placeholder="Número"
            value="{{ request('valueDocument') }}">
    </div>

</div>
