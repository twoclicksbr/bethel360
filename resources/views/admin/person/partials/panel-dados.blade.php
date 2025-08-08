<div class="tab-pane fade {{ $tab === 'dados' ? 'show active' : '' }}" id="panel_{{ $module }}_dados" role="tab-panel">
    <div class="d-flex flex-column gap-7 gap-lg-10">

        <form action="{{ route('person.update', $person['id']) }}"
            method="POST">
            @csrf
            @method('PUT')

            <div class="card card-flush py-4">

                <div class="card-header">
                    <div class="card-title">
                        <h2>Dados</h2>
                    </div>
                </div>

                <div class="card-body pt-0 pb-0">

                    @include('admin.person.partials.form-fields')

                    @include('admin.layouts.partials.form-btn-footer', [
                    'routeCancel' => route('person.index'),
                    ])

                </div>
            </div>
        </form>

        <div class="card card-flush py-4">

            <div class="card-header">
                <div class="card-title">
                    <h2>Media</h2>
                </div>
            </div>

            <div class="card-body pt-0">
                <div class="fv-row mb-2">
                    <div class="dropzone" id="panel_{{ $module }}_media">
                        <div class="dz-message needsclick">
                            <i class="ki-outline ki-file-up text-primary fs-3x"></i>
                            <div class="ms-4">
                                <h3 class="fs-5 fw-bold text-gray-900 mb-1">Drop files here or
                                    click
                                    to
                                    upload.</h3>
                                <span class="fs-7 fw-semibold text-gray-500">Upload up to 10
                                    files</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-muted fs-7">Set the product media gallery.</div>
            </div>
        </div>

    </div>
</div>