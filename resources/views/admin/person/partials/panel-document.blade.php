@php
    $edit = isset($document['id']);
    $currentTab = session('tab', request()->get('tab', $tab ?? 'dados'));
@endphp

<div class="tab-pane fade {{ $currentTab === 'document' ? 'show active' : '' }}" id="panel_{{ $module }}_document"
    role="tab-panel">

    <div class="d-flex flex-column gap-7 gap-lg-10">
        <div class="card card-flush py-4">
            <div class="card-header">
                <div class="card-title">
                    <h2>Documentos</h2>
                </div>
            </div>

            <div class="card-body pt-0 pb-0">

                <form
                    action="{{ $edit
                        ? route('person.document.update', [base64_encode($person['id']), base64_encode($document['id'])])
                        : route('person.document.store', base64_encode($person['id'])) }}"
                    method="POST">
                    @csrf
                    @if ($edit)
                        @method('PUT')
                    @endif


                    <div class="row g-5">

                        <input type="hidden" name="form_type" value="document">
                        <input type="hidden" name="target_table" value="person">
                        <input type="hidden" name="id_target" value="{{ $person['id'] ?? null }}">

                        <div class="col-12 col-md-4">
                            <div class="mb-2 fv-row">
                                <label class="required form-label">Tipo de Documento:</label>
                                <select id="id_type_document" name="id_type_document" class="form-select mb-2"
                                    data-control="select2" data-hide-search="true" data-placeholder="Selecione..."
                                    required>
                                    <option></option>
                                    @foreach ($typeDocuments as $type)
                                        <option value="{{ $type->id }}" data-mask="{{ $type->mask }}"
                                            {{ old('id_type_document', $document['id_type_document'] ?? '') == $type->id ? 'selected' : '' }}>
                                            {{ $type->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-12 col-md-8">
                            <div class="mb-6 fv-row">
                                <label class="required form-label">Número do Documento:</label>
                                <input type="text" name="value" id="input-document-value" class="form-control"
                                    value="{{ old('value', data_get($document, 'value', '')) }}" required />
                            </div>
                        </div>


                    </div>

                    @php
                        $segments = request()->segments();
                        $routeCancel = url('admin/person'); // fallback

                        if (count($segments) >= 6) {
                            $routeCancel = url("admin/{$segments[1]}/edit/{$segments[3]}/{$segments[4]}");
                        } elseif (count($segments) === 5 || count($segments) === 4) {
                            $routeCancel = url("admin/{$segments[1]}");
                        }
                    @endphp

                    @include('admin.layouts.partials.form-btn-footer', [
                        'routeCancel' => $routeCancel ?? url('admin/person'),
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
                                        Valor
                                    </div>
                                </th>
                                <th style="width: 10%">
                                    <div class="text-muted fs-7 d-flex align-items-center gap-1">
                                        Status
                                    </div>
                                </th>
                                <th style="width: 15%">
                                    <div class="text-muted fs-7 d-flex align-items-center gap-1">
                                        Ações
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($documents as $document)
                                <tr>
                                    <td>
                                        <span
                                            class="text-gray-900 fs-7">{{ $document['typeDocument']['name'] ?? '-' }}</span>
                                    </td>
                                    <td>
                                        <span class="text-gray-900 fs-7">{{ $document['value'] }}</span>
                                    </td>
                                    <td>
                                        <span
                                            class="badge badge-light-{{ $document['active'] ? 'success' : 'danger' }}">
                                            {{ $document['active'] ? 'Ativo' : 'Inativo' }}
                                        </span>
                                    </td>
                                    <td class="text-end">
                                        <a href="{{ url('admin/person/edit/' . base64_encode($person['id']) . '/document/' . base64_encode($document['id'])) }}"
                                            class="btn btn-icon btn-light-warning btn-active-color btn-sm me-1"
                                            data-bs-toggle="tooltip" title="Editar">
                                            <i class="ki-outline ki-pencil fs-2"></i>
                                        </a>

                                        <a href="#" class="btn btn-sm btn-icon btn-light-danger btn-delete"
                                            data-id="{{ $document['id'] }}" data-module="document"
                                            data-redirect="{{ url('admin/person/edit/' . base64_encode($person['id']) . '/document') }}"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Excluir documento">
                                            <i class="ki-outline ki-trash fs-2"></i>
                                        </a>


                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted">Nenhum documento encontrado.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
