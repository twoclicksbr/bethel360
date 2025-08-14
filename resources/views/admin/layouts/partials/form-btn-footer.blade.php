<div class="card-footer d-flex justify-content-end py-6 px-0">

    {{-- @if (!empty($showActiveCheckbox))
        <div class="d-flex align-items-center me-auto">
            <div class="form-check form-switch form-check-custom form-check-danger form-check-solid">
                <input class="form-check-input h-20px w-30px" type="checkbox" name="active" value="1" id="activeSwitch"
                    {{ old('active', $address['active'] ?? 1) ? 'checked' : '' }}>

                <label class="form-check-label" for="activeSwitch" id="activeLabel">
                    {{ old('active', $address['active'] ?? 1) ? 'Público' : 'Inativo' }}
                </label>
            </div>
        </div>
    @endif --}}

    @php
        $ref = $tab === 'document' ? $document ?? [] : ($tab === 'address' ? $address ?? [] : $person ?? []);
        $activeValue = (int) old('active', data_get($ref, 'active', 1));

        $switchId =
            $tab === 'document'
                ? 'documentActiveSwitch'
                : ($tab === 'address'
                    ? 'addressActiveSwitch'
                    : 'activeSwitch');
        $labelId = $switchId . 'Label';
    @endphp

    @if (!empty($showActiveCheckbox))
        <div class="d-flex align-items-center me-auto">
            <div class="form-check form-switch form-check-custom form-check-danger form-check-solid">
                <input class="form-check-input h-20px w-30px" type="checkbox" name="active" value="1"
                    id="{{ $switchId }}" {{ $activeValue ? 'checked' : '' }}>
                <label class="form-check-label" for="{{ $switchId }}" id="{{ $labelId }}" data-on="Público"
                    data-off="Inativo">
                    {{ $activeValue ? 'Público' : 'Inativo' }}
                </label>
            </div>
        </div>
    @endif




    <a href="{{ $routeCancel }}" class="btn btn-sm btn-light-danger btn-active-danger me-2">
        <i class="ki-duotone ki-cross-circle"><span class="path1"></span><span class="path2"></span></i>
        Cancelar
    </a>

    <button type="submit" class="btn btn-sm btn-light-primary" id="kt_account_profile_details_submit">
        <i class="ki-duotone ki-send"><span class="path1"></span><span class="path2"></span></i>
        Savar Registro
    </button>
</div>
