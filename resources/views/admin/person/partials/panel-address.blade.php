@php
    $edit = isset($address['id']); // se tiver ID = update
@endphp

<div class="tab-pane fade {{ $tab === 'address' ? 'show active' : '' }}" id="panel_{{ $module }}_address"
    role="tab-panel">
    <div class="d-flex flex-column gap-7 gap-lg-10">
        <div class="card card-flush py-4">
            <div class="card-header">
                <div class="card-title">
                    <h2>Endereços</h2>
                </div>
            </div>

            <div class="card-body pt-0 pb-0">
                <form
                    action="{{ $edit
                        ? route('person.address.update', [base64_encode($person['id']), base64_encode($address['id'])])
                        : route('person.address.store', base64_encode($person['id'])) }}"
                    method="POST">
                    @csrf
                    @if ($edit)
                        @method('PUT')
                    @endif

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
                                            {{ old('id_type_address', $address['id_type_address'] ?? '') == $type->id ? 'selected' : '' }}>
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
                                    class="form-control mb-2" value="{{ old('zipcode', $address['zipcode'] ?? '') }}"
                                    placeholder="00000-000" required />
                            </div>
                        </div>

                        <div class="col-12 col-md-5">
                            <div class="mb-2 fv-row">
                                <label class="required form-label">Rua:</label>
                                <input type="text" name="street" class="form-control mb-2"
                                    value="{{ old('street', $address['street'] ?? '') }}"
                                    placeholder="Rua, Avenida etc." required />
                            </div>
                        </div>

                        <div class="col-12 col-md-1">
                            <div class="mb-2 fv-row">
                                <label class="required form-label">Número:</label>
                                <input type="text" name="number" id="input-number" class="form-control mb-2"
                                    value="{{ old('number', $address['number'] ?? '') }}" placeholder="Nº" required />
                            </div>
                        </div>

                        <div class="col-12 col-md-2">
                            <div class="mb-2 fv-row">
                                <label class="form-label">Complemento:</label>
                                <input type="text" name="complement" class="form-control mb-2"
                                    value="{{ old('complement', $address['complement'] ?? '') }}"
                                    placeholder="Ap, bloco etc." />
                            </div>
                        </div>

                        <div class="col-12 col-md-4">
                            <div class="mb-2 fv-row">
                                <label class="required form-label">Bairro:</label>
                                <input type="text" name="neighborhood" class="form-control mb-2"
                                    value="{{ old('neighborhood', $address['neighborhood'] ?? '') }}"
                                    placeholder="Bairro" required />
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="mb-2 fv-row">
                                <label class="required form-label">Cidade:</label>
                                <input type="text" name="city" class="form-control mb-2"
                                    value="{{ old('city', $address['city'] ?? '') }}" placeholder="Cidade" required />
                            </div>
                        </div>

                        <div class="col-12 col-md-2">
                            <div class="mb-2 fv-row">
                                <label class="required form-label">Estado:</label>
                                <input type="text" name="state" class="form-control mb-2"
                                    value="{{ old('state', $address['state'] ?? '') }}" placeholder="Estado"
                                    required />
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="d-flex align-items-center me-auto">
                                <div class="form-check form-switch form-check-custom form-check-solid mb-2 mt-2">
                                    <input class="form-check-input h-20px w-30px" type="checkbox" name="main"
                                        value="1" id="mainSwitch"
                                        {{ old('main', $address['main'] ?? !isset($hasAnyAddress) || !$hasAnyAddress) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="mainSwitch">
                                        Endereço principal
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    @php
                        $segments = request()->segments();
                        $routeCancel = route('person.index');

                        if (count($segments) >= 6) {
                            // /admin/person/edit/{id}/address/{id}
                            $routeCancel = url("admin/{$segments[1]}/edit/{$segments[3]}/{$segments[4]}");
                        } elseif (count($segments) === 5) {
                            // /admin/person/edit/{id}/address
                            $routeCancel = url("admin/{$segments[1]}");
                        } elseif (count($segments) === 4) {
                            // /admin/person/edit/{id}
                            $routeCancel = url("admin/{$segments[1]}");
                        }
                    @endphp

                    @include('admin.layouts.partials.form-btn-footer', [
                        'routeCancel' => $routeCancel,
                        'showActiveCheckbox' => true,
                    ])

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
                                    <div class="text-muted fs-7 d-flex align-items-center gap-1">
                                        Status
                                    </div>
                                </th>

                                <th style="width: 15%">
                                    <div class="text-muted fs-7 d-flex align-items-center gap-1">Ações</div>
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($addresses as $address)
                                <tr>

                                    <td>
                                        <span class="text-gray-900 fs-7">
                                            {{ $address['typeAddress']['name'] ?? '-' }}
                                        </span>
                                    </td>

                                    <td>
                                        <div class="d-flex align-items-center">
                                            @if ($address['main'])
                                                <i class="ki-duotone ki-star text-success fs-1x me-2">
                                                </i>
                                            @endif

                                            <span class="text-gray-900 fs-7">
                                                {{ $address['street'] }}, {{ $address['number'] }}
                                                @if (!empty($address['complement']))
                                                    - {{ $address['complement'] }}
                                                @endif
                                                <br>
                                                {{ $address['neighborhood'] }} - {{ $address['zipcode'] }}
                                            </span>
                                        </div>
                                    </td>


                                    <td>
                                        <span class="text-gray-900 fs-7">
                                            {{ $address['city'] }} / {{ $address['state'] }}
                                        </span>
                                    </td>

                                    <td>
                                        <span
                                            class="badge badge-light-{{ $address['active'] ? 'success' : 'danger' }}">
                                            {{ $address['active'] ? 'Público' : 'Inativo' }}
                                        </span>
                                    </td>

                                    <td class="text-end">

                                        <a href="{{ url('admin/person/edit/' . base64_encode($person['id']) . '/address/' . base64_encode($address['id'])) }}"
                                            class="btn btn-icon btn-light-warning btn-active-color btn-sm me-1"
                                            data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover"
                                            title="Editar">
                                            <i class="ki-outline ki-pencil fs-2"></i>
                                        </a>

                                        <a href="#" class="btn btn-sm btn-icon btn-light-danger btn-delete"
                                            data-id="{{ $address['id'] }}" data-module="address"
                                            data-redirect="{{ url('admin/person/edit/' . base64_encode($person['id']) . '/address') }}"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Excluir endereço">
                                            <i class="ki-outline ki-trash fs-2"></i>
                                        </a>


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
