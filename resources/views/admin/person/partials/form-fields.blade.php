<div class="row">

    <input type="hidden" name="form_type" value="main">

    <div class="col-12 col-md-6">
        <div class="mb-10 fv-row">
            <label class="required form-label">Nome:</label>
            <input type="text" name="name" class="form-control mb-2" placeholder="Nome completo"
                value="{{ $person['name'] ?? old('name') }}" autofocus='on' />
            <div class="text-muted fs-7">

            </div>
        </div>
    </div>

    <div class="col-12 col-md-3">
        <div class="mb-10 fv-row">
            <label class="required form-label">Gênero:</label>

            <select name="id_gender" class="form-select mb-2" data-control="select2" data-hide-search="true"
                data-placeholder="Selecione uma opção">
                <option></option>
                @foreach ($genders as $gender)
                    <option value="{{ $gender->id }}" @if (($person['id_gender'] ?? old('id_gender')) == $gender->id) selected @endif>
                        {{ $gender->name }}
                    </option>
                @endforeach
            </select>

        </div>
    </div>

    <div class="col-12 col-md-3">
        <div class="mb-10 fv-row">
            <label class="required form-label">Data Nascimento:</label>
            <input type="date" name="birthdate" class="form-control mb-2" placeholder="Data de Nascimento"
                value="{{ $person['birthdate'] ?? old('birthdate') }}" />
            <div class="text-muted fs-7">

            </div>
        </div>
    </div>

    <input type="hidden" name="active" value="{{ $person['active'] ?? 1 }}">

</div>
