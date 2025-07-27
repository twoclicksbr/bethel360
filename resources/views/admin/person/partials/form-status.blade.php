<div class="card card-flush py-4">
    <div class="card-header">
        <div class="card-title">
            <h2>Status</h2>
        </div>
        <div class="card-toolbar">
            <div class="rounded-circle {{ $person['active'] ?? 1 ? 'bg-success' : 'bg-danger' }} w-15px h-15px"
                id="kt_ecommerce_add_product_status"></div>
        </div>
    </div>

    <div class="card-body pt-0">
        <form action="{{ route('person.update', $person['id']) }}" method="POST">

            @csrf
            @method('PUT')

            <input type="hidden" name="form_type" value="status">

            <input type="hidden" name="name" value="{{ $person['name'] }}">
            <input type="hidden" name="id_gender" value="{{ $person['id_gender'] }}">
            <input type="hidden" name="birthdate" value="{{ $person['birthdate'] }}">

            <select class="form-select mb-2" data-control="select2" data-hide-search="true" name="active"
                onchange="this.form.submit()">
                <option value="1" {{ ($person['active'] ?? 1) == 1 ? 'selected' : '' }}>Público
                </option>
                <option value="0" {{ ($person['active'] ?? 1) == 0 ? 'selected' : '' }}>Inativo
                </option>
            </select>
        </form>

        <div class="text-muted fs-7">Defina se o registro está: <br> Público ou inativa.</div>
    </div>
</div>
