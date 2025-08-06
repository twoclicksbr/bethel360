<div class="card card-flush py-4">
    <div class="card-header">
        <div class="card-title">
            <h2>Avatar</h2>
        </div>
    </div>
    <div class="card-body text-center pt-0">

        <form method="POST" enctype="multipart/form-data" id="avatarForm"
            action="{{ env('APP_URL_API') . '/admin/person/' . $person['id'] . '/avatar' }}">

            @csrf
            <div class="image-input image-input-outline mb-3" data-kt-image-input="true">
                @php
                    $imageUrl =
                    $person['avatar_url'] ?? asset('assets/media/svg/files/blank-image.svg');
                @endphp

                <div class="image-input-wrapper w-150px h-150px" style="background-image: url('{{ $imageUrl }}')">
                </div>

                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                    data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Escolher avatar">
                    <i class="ki-outline ki-pencil fs-7"></i>
                    <input type="file" name="avatar" accept=".png, .jpg, .jpeg" id="avatarInput" />
                    <input type="hidden" name="avatar_remove" />
                </label>

                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancelar avatar">
                    <i class="ki-outline ki-cross fs-2"></i>
                </span>
                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                    data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remover avatar">
                    <i class="ki-outline ki-cross fs-2"></i>
                </span>
            </div>
        </form>

        <div class="text-muted fs-7">
            Defina a imagem do seu avatar.
            Apenas arquivos de imagem com extensão .png, .jpg e .jpeg são aceitos.
        </div>
    </div>
</div>