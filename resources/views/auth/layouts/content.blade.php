@php
    $color = '-red';
    $color_danger = 'danger';
@endphp

<div class="d-flex flex-column flex-column-fluid flex-lg-row">
    <div class="d-flex flex-center w-lg-50 pt-15 pt-lg-0 px-10">
        <div class="d-flex flex-center flex-lg-start flex-column">
            <a href="#" class="mb-7">
                {{-- Desktop --}}
                <img src="{{ asset('assets/media/logos/logo-c-white-red.svg') }}" class="d-none d-md-block"
                    style="height: 300px" alt="Logo Desktop">

                {{-- Mobile --}}
                <img src="{{ asset('assets/media/logos/logo-c-black.svg') }}" class="d-block d-md-none"
                    style="height: 200px" alt="Logo Mobile">
            </a>
            <h2 class="text-white fw-normal m-0">

            </h2>
        </div>
    </div>

    <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12 p-lg-20">
        <div class="bg-body d-flex flex-column align-items-stretch flex-center rounded-4 w-md-600px p-20">
            <div class="d-flex flex-center flex-column flex-column-fluid px-lg-10 pb-15 pb-lg-10">

                <form method="POST" action="{{ url('/auth/login') }}" class="form w-100" id="kt_sign_in_form">
                    @csrf

                    <div class="text-center mb-11">
                        <h1 class="text-gray-900 fw-bolder mb-3">Bem vindo de volta!</h1>
                        <div class="text-gray-500 fw-semibold fs-6">Faça login no Bethel360°</div>
                    </div>

                    {{-- <pre>{{ print_r(session()->all(), true) }}</pre> --}}

                    {{-- {{ print_r(session()->all(), true) }} --}}


                    @if ($errors->has('email'))
                        <div
                            class="alert alert-dismissible bg-light-danger d-flex flex-column flex-sm-row w-100 p-5 mb-10">
                            <i class="ki-duotone ki-message-text-2 fs-2hx text-danger me-4 mb-5 mb-sm-0"><span
                                    class="path1"></span><span class="path2"></span><span class="path3"></span></i>

                            <div class="d-flex flex-column pe-0 pe-sm-10">
                                <h4 class="fw-semibold">Erro ao fazer login</h4>
                                <span>
                                    {{ $errors->first('email') }}
                                </span>
                            </div>

                            <button type="button"
                                class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto"
                                data-bs-dismiss="alert">
                                <i class="ki-duotone ki-cross fs-1 text-danger"><span class="path1"></span><span
                                        class="path2"></span></i> </button>
                        </div>
                    @endif

                    @if (session('error'))
                        <div
                            class="alert alert-dismissible bg-light-danger d-flex flex-column flex-sm-row w-100 p-5 mb-10">
                            <i class="ki-duotone ki-message-text-2 fs-2hx text-danger me-4 mb-5 mb-sm-0"><span
                                    class="path1"></span><span class="path2"></span><span class="path3"></span></i>

                            <div class="d-flex flex-column pe-0 pe-sm-10">
                                <h4 class="fw-semibold">{{ session('error_title') }}</h4>
                                <span>
                                    {{ session('error_message') }}
                                </span>
                            </div>

                            <button type="button"
                                class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto"
                                data-bs-dismiss="alert">
                                <i class="ki-duotone ki-cross fs-1 text-danger"><span class="path1"></span><span
                                        class="path2"></span></i> </button>
                        </div>
                    @endif

                    @if (session('logout') !== null)
                        <div
                            class="alert alert-dismissible bg-light-success d-flex flex-column flex-sm-row w-100 p-5 mb-10">
                            <i class="ki-duotone ki-notification-bing fs-2hx text-success me-4 mb-5 mb-sm-0"><span
                                    class="path1"></span><span class="path2"></span><span class="path3"></span></i>

                            <div class="d-flex flex-column pe-0 pe-sm-10">
                                <h4 class="fw-semibold">{{ session('error_title') }}</h4>
                                <span>
                                    {{ session('error_message') }}
                                </span>
                            </div>

                            <button type="button"
                                class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto"
                                data-bs-dismiss="alert">
                                <i class="ki-duotone ki-cross fs-1 text-success"><span class="path1"></span><span
                                        class="path2"></span></i> </button>
                        </div>
                    @endif

                    {{-- <div class="row g-3 mb-9">
                        <div class="col-md-6">
                            <a href="#" class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
                                <img src="{{ asset('assets/media/svg/brand-logos/google-icon.svg') }}" class="h-15px me-3" />
                                Entrar com Google
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="#" class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
                                <img src="{{ asset('assets/media/svg/brand-logos/apple-black.svg') }}" class="theme-light-show h-15px me-3" />
                                <img src="{{ asset('assets/media/svg/brand-logos/apple-black-dark.svg') }}" class="theme-dark-show h-15px me-3" />
                                Entrar com Apple
                            </a>
                        </div>
                    </div> 
                    
                    <div class="separator separator-content my-14">
                        <span class="w-125px text-gray-500 fw-semibold fs-7">Ou com e-mail</span>
                    </div> --}}

                    <div class="fv-row mb-8">
                        <input type="text" name="email" placeholder="Email" autocomplete="off" autofocus="on"
                            class="form-control bg-transparent" value="alex@twoclicks.com" />
                    </div>

                    <div class="fv-row mb-3">
                        {{-- <input type="password" name="password" placeholder="Senha" autocomplete="off"
                            class="form-control bg-transparent" /> --}}

                        <div class="position-relative mb-3">
                            <input id="password"  class="form-control bg-transparent" type="password" placeholder="Senha"
                                name="password" autocomplete="off" value="123456" />
                            <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                data-kt-password-meter-control="visibility" onclick="togglePassword()">
                                <i class="ki-outline ki-eye-slash fs-2"></i>
                                <i class="ki-outline ki-eye fs-2 d-none"></i>
                            </span>
                        </div>
                    </div>



                    <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                        <div></div>
                        <a href="#" class="link-{{ $color_danger }}">Esqueceu a senha?</a>
                    </div>

                    <div class="d-grid mb-5">
                        <button type="submit" class="btn btn-{{ $color_danger }}" id="kt_sign_in_submit">
                            <span class="indicator-label">Entrar</span>
                            <span class="indicator-progress">Aguarde...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                    </div>

                    <div class="text-gray-500 text-center fw-semibold fs-6">
                        Não tem conta?
                        <a href="#" class="link-{{ $color_danger }}">Cadastre-se</a>
                    </div>
                </form>

            </div>

            <div class="d-flex justify-content-center px-lg-10">

                {{-- <div class="me-0">
                    <img class="w-20px h-20px rounded me-3" src="{{ asset('assets/media/flags/united-states.svg') }}" />
                    <span class="me-1">Português</span>
                </div> --}}

                <div class="d-flex fw-semibold text-primary fs-base gap-5">
                    <a href="#" class="btn btn-light-{{ $color_danger }}" target="_blank">Termos</a>
                    <a href="#" class="btn btn-light-{{ $color_danger }}" target="_blank">Planos</a>
                    <a href="#" class="btn btn-light-{{ $color_danger }}" target="_blank">Contato</a>
                </div>

            </div>
        </div>
    </div>
</div>
