<div class="tab-pane fade" id="panel_{{ $module }}_address" role="tab-panel">
    <div class="d-flex flex-column gap-7 gap-lg-10">



        <div class="card card-flush py-4">

            <div class="card-header">
                <div class="card-title">
                    <h2>Endereços</h2>
                </div>
            </div>

            <div style="display: ">
                <form action="{{ url('admin/person/' . $person['id'] . '/address') }}" method="POST">
                    @csrf

                    <div class="card-body pt-0 pb-0">

                        <div class="row">
                            <input type="hidden" name="form_type" value="address">
                            <input type="hidden" name="target_table" value="{{ $module }}">
                            <input type="hidden" name="id_target" value="{{ $person['id'] ?? null }}">
                            <input type="hidden" name="country" value="">


                            <div class="col-12 col-md-2">
                                <div class="mb-2 fv-row">
                                    <label class="required form-label">Tipo de Endereço:</label>
                                    <select name="id_type_address" id="select-type-address" class="form-select mb-2"
                                        data-control="select2" data-hide-search="true"
                                        data-placeholder="Selecione uma opção" required>
                                        @foreach ($typeAddresses as $type)
                                            <option></option>
                                            <option value="{{ $type->id }}"
                                                {{ old('id_type_address') == $type->id ? 'selected' : '' }}>
                                                {{ $type->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>

                            <div class="col-12 col-md-2">
                                <div class="mb-2 fv-row">
                                    <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                        <span>CEP</span>
                                        <span class="text-danger ms-1">*</span>
                                        <a href="https://buscacepinter.correios.com.br/app/endereco/index.php"
                                            target="_blank" class="ms-1" data-bs-toggle="tooltip"
                                            title="Clique para encontrar seu CEP no site dos Correios">
                                            <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i>
                                        </a>
                                    </label>

                                    <input type="text" name="zipcode" id="input-zipcode" data-mask="99999-999"
                                        class="form-control mb-2" value="{{ old('zipcode') }}" placeholder="00000-000"
                                        required />
                                </div>
                            </div>

                            <div class="col-12 col-md-5">
                                <div class="mb-2 fv-row">
                                    <label class="required form-label">Rua:</label>
                                    <input type="text" name="street" class="form-control mb-2"
                                        value="{{ old('street') }}" placeholder="Rua, Avenida etc." required />
                                </div>
                            </div>

                            <div class="col-12 col-md-1">
                                <div class="mb-2 fv-row">
                                    <label class="required form-label">Número:</label>
                                    <input type="text" name="number" id="input-number" class="form-control mb-2"
                                        value="{{ old('number') }}" placeholder="Nº" required />
                                </div>
                            </div>

                            <div class="col-12 col-md-2">
                                <div class="mb-2 fv-row">
                                    <label class="form-label">Complemento:</label>
                                    <input type="text" name="complement" class="form-control mb-2"
                                        value="{{ old('complement') }}" placeholder="Ap, bloco etc." />
                                </div>
                            </div>

                            <div class="col-12 col-md-4">
                                <div class="mb-2 fv-row">
                                    <label class="required form-label">Bairro:</label>
                                    <input type="text" name="neighborhood" class="form-control mb-2"
                                        value="{{ old('neighborhood') }}" placeholder="Bairro" required />
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="mb-2 fv-row">
                                    <label class="required form-label">Cidade:</label>
                                    <input type="text" name="city" class="form-control mb-2"
                                        value="{{ old('city') }}" placeholder="Cidade" required />
                                </div>
                            </div>

                            <div class="col-12 col-md-2">
                                <div class="mb-2 fv-row">
                                    <label class="required form-label">Estado:</label>
                                    <input type="text" name="state" class="form-control mb-2"
                                        value="{{ old('state') }}" placeholder="Estado" required />
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="d-flex align-items-center me-auto">
                                    <div class="form-check form-switch form-check-custom form-check-solid mb-2 mt-2">
                                        <input class="form-check-input h-20px w-30px" type="checkbox" name="main"
                                            value="1" id="mainSwitch"
                                            {{ old('main', !isset($hasAnyAddress) || !$hasAnyAddress) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="mainSwitch">
                                            Endereço principal
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>


                        @include('admin.layouts.partials.form-btn-footer', [
                            'routeCancel' => route('person.index'),
                            'showActiveCheckbox' => true,
                        ])

                    </div>

                </form>
            </div>

            <div class="card-body py-3">

                <div class="table-responsive">
                    <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                        <thead>
                            <tr class="fw-bold text-muted">

                                <th style="width: 10%">
                                    <div class="text-muted fs-7 d-flex align-items-center gap-1">
                                        Tipo
                                    </div>
                                </th>

                                <th>
                                    <div class="text-muted fs-7 d-flex align-items-center gap-1">
                                        Rua
                                    </div>
                                </th>

                                <th style="width: 25%">
                                    <div class="text-muted fs-7 d-flex align-items-center gap-1">
                                        Cidade
                                    </div>
                                </th>

                                <th style="width: 10%">
                                    <div class="text-muted fs-7 d-flex align-items-center gap-1">Ações</div>
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($addresses as $address)
                                <tr>

                                    <td>
                                        <span class="text-gray-900 fs-7">
                                            {{ $address['id_type_address'] }}
                                        </span>
                                    </td>

                                    <td>
                                        <span class="text-gray-900 fs-7">
                                            {{ $address['street'] }}, {{ $address['number'] }}
                                            @if (!empty($address['complement']))
                                                - {{ $address['complement'] }}
                                            @endif
                                            <br>
                                            {{ $address['neighborhood'] }} - {{ $address['zipcode'] }}
                                        </span>
                                    </td>


                                    <td>
                                        <span class="text-gray-900 fs-7">{{ $address['city'] }} /
                                            {{ $address['state'] }}</span>
                                    </td>

                                    <td class="text-end">
                                        <a href="#" class="btn btn-icon btn-bg-light btn-sm"><i
                                                class="ki-outline ki-pencil fs-2"></i></a>
                                        <a href="#" class="btn btn-icon btn-bg-light btn-sm"><i
                                                class="ki-outline ki-trash fs-2"></i></a>
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="text-center text-muted">Nenhum endereço encontrado.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

        </form>

    </div>
</div>
