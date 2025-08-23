<div class="mt-sm-n20">

    {{-- <div class="landing-curve landing-dark-color">
        <svg viewBox="15 -1 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z"
                fill="currentColor"></path>
        </svg>
    </div> --}}


    <div class="py-20 bg-dark">

        <div class="container">

            <div class="d-flex flex-column container pt-lg-20">

                <div class="mb-13 text-center">
                    <h1 class="fs-2hx fw-bold text-danger mb-5" id="pricing">Planos Bethel360°</h1>
                    <div class="text-gray-300 fw-semibold fs-5">Escolha a quantidade de pessoas e veja os valores em
                        tempo real</div>
                </div>


                <div class="text-center" id="kt_pricing">

                    <div class="mb-15 text-center">
                        {{-- <label class="fw-bold mb-2 text-white">Quantidade de Pessoas</label> --}}
                        <div class="d-flex align-items-center justify-content-center mb-4 text-white">
                            {{-- <span class="me-2">Número de</span> --}}
                            <span id="label_qtde" class="fw-bold fs-3x"></span>
                            <span class="ms-2 mt-1">Pessoas</span>
                        </div>
                        <div id="slider_qtde" class="noUi-sm mb-7 mx-auto" style="max-width: 600px;"></div>
                    </div>

                    <div class="nav-group landing-dark-bg d-inline-flex mb-15" data-kt-buttons="true"
                        style="border: 1px dashed #2B4666;">
                        <a href="#"
                            class="btn btn-color-gray-600 btn-active btn-active-success px-6 py-3 me-2 active"
                            data-kt-plan="month">Mensal</a>
                        <a href="#" class="btn btn-color-gray-600 btn-active btn-active-success px-6 py-3"
                            data-kt-plan="annual">Anual</a>
                    </div>



                    <div class="row g-10">

                        {{-- <div class="col-xl-4">
                            <div class="d-flex h-100 align-items-center">

                                <div class="w-100 d-flex flex-column flex-center rounded-3 bg-body py-15 px-10">

                                    <div class="mb-7 text-center">

                                        <h1 class="text-gray-900 mb-5 fw-boldest">Startup</h1>


                                        <div class="text-gray-500 fw-semibold mb-5">Best Settings for Startups</div>


                                        <div class="text-center">
                                            <span class="mb-2 text-primary">R$</span>
                                            <span id="startup_implantacao" class="fs-4 fw-bold text-primary"></span>
                                            <div class="fs-7 fw-semibold opacity-50">Implantação</div>
                                        </div>
                                        <div class="text-center mt-3">
                                            <span class="mb-2 text-primary">R$</span>
                                            <span id="startup_mensal" class="fs-3x fw-bold text-primary"></span>
                                            <span class="fs-7 fw-semibold opacity-50">/ Mês</span>
                                        </div>



                                    </div>


                                    <div class="w-100 mb-10">

                                        <div class="d-flex flex-stack mb-5">
                                            <span class="fw-semibold fs-6 text-gray-800 text-start pe-3">Up to 10 Active
                                                Users</span>
                                            <i class="ki-outline ki-check-circle fs-1 text-success"></i>
                                        </div>


                                        <div class="d-flex flex-stack mb-5">
                                            <span class="fw-semibold fs-6 text-gray-800 text-start pe-3">Up to 30
                                                Project Integrations</span>
                                            <i class="ki-outline ki-check-circle fs-1 text-success"></i>
                                        </div>


                                        <div class="d-flex flex-stack mb-5">
                                            <span class="fw-semibold fs-6 text-gray-800">Keen Analytics Platform</span>
                                            <i class="ki-outline ki-cross-circle fs-1"></i>
                                        </div>


                                        <div class="d-flex flex-stack mb-5">
                                            <span class="fw-semibold fs-6 text-gray-800">Targets Timelines &
                                                Files</span>
                                            <i class="ki-outline ki-cross-circle fs-1"></i>
                                        </div>


                                        <div class="d-flex flex-stack">
                                            <span class="fw-semibold fs-6 text-gray-800">Unlimited Projects</span>
                                            <i class="ki-outline ki-cross-circle fs-1"></i>
                                        </div>

                                    </div>


                                    <a href="#" class="btn btn-primary">Select</a>

                                </div>

                            </div>
                        </div> --}}




                        <div class="col-xl-4">
                            <div class="d-flex h-100 align-items-center">
                                <div class="w-100 d-flex flex-column flex-center rounded-3 bg-body py-15 px-10">

                                    <div class="mb-7 text-center">
                                        <h1 class="text-gray-900 mb-5 fw-boldest">Startup</h1>
                                        <div class="text-gray-500 fw-semibold mb-5">Best Settings for Startups</div>

                                        <!-- 📌 Modo Mensal -->
                                        <div class="mensal-view">
                                            <div class="text-center">
                                                <span class="mb-2 text-primary">R$</span>
                                                <span id="startup_implantacao" class="fs-6 fw-bold text-primary"></span>
                                                <div class="fs-8 fw-semibold opacity-50">Implantação</div>
                                            </div>
                                            <div class="text-center mt-3">
                                                <span class="mb-2 text-primary">R$</span>
                                                <span id="startup_mensal" class="fs-3x fw-bold text-primary"></span>
                                                <span class="fs-7 fw-semibold opacity-50">/ Mês</span>
                                            </div>
                                        </div>

                                        <!-- 📌 Modo Anual -->
                                        <div class="anual-view d-none text-center">
                                            <div class="fs-3x fw-bold text-primary">R$ <span
                                                    id="startup_total_anual"></span></div>
                                            <div class="fs-2 text-success fw-bold">Economia de: R$ <span
                                                    id="startup_economia"></span></div>

                                            <!-- Detalhes -->
                                            <div class="mt-4 text-center text-gray-500">
                                                <div>Implantação: R$ <span id="startup_implantacao_anual"></span></div>
                                                <div>Mensal 12x R$ <span id="startup_mensal_unit"></span> = R$ <span
                                                        id="startup_mensal_sem_desconto"></span></div>
                                                <div>Total: R$ <span id="startup_total_sem_desconto"></span></div>

                                            </div>
                                        </div>



                                    </div>

                                    <div class="w-100 mb-10">

                                        <div class="d-flex flex-stack mb-5">
                                            <span class="fw-semibold fs-6 opacity-75 text-start pe-3">Up to
                                                10 Active Users</span>
                                            <i class="ki-outline ki-check-circle fs-1"></i>
                                        </div>


                                        <div class="d-flex flex-stack mb-5">
                                            <span class="fw-semibold fs-6 opacity-75 text-start pe-3">Up to
                                                30 Project Integrations</span>
                                            <i class="ki-outline ki-check-circle fs-1"></i>
                                        </div>


                                        <div class="d-flex flex-stack mb-5">
                                            <span class="fw-semibold fs-6 opacity-75 text-start pe-3">Keen
                                                Analytics Platform</span>
                                            <i class="ki-outline ki-check-circle fs-1"></i>
                                        </div>


                                        <div class="d-flex flex-stack mb-5">
                                            <span class="fw-semibold fs-6 opacity-75 text-start pe-3">Targets
                                                Timelines & Files</span>
                                            <i class="ki-outline ki-cross-circle fs-1"></i>
                                        </div>


                                        <div class="d-flex flex-stack">
                                            <span class="fw-semibold fs-6 opacity-75">Unlimited
                                                Projects</span>
                                            <i class="ki-outline ki-cross-circle fs-1"></i>
                                        </div>

                                    </div>

                                    <a href="#" class="btn btn-primary">Select</a>
                                </div>
                            </div>
                        </div>



                        <!-- 💼 Business -->
                        <div class="col-xl-4">
                            <div class="d-flex h-100 align-items-center">
                                <div class="w-100 d-flex flex-column flex-center rounded-3 bg-danger py-20 px-10">

                                    <div class="mb-7 text-center">
                                        <h1 class="text-white mb-5 fw-boldest">Business</h1>
                                        <div class="text-white opacity-75 fw-semibold mb-5">Best Settings for Business
                                        </div>

                                        <!-- 📌 Modo Mensal -->
                                        <div class="mensal-view">
                                            <div class="text-center">
                                                <span class="mb-2 text-white">R$</span>
                                                <span id="business_implantacao" class="fs-6 fw-bold text-white"></span>
                                                <div class="fs-8 fw-semibold text-white opacity-75">Implantação</div>
                                            </div>
                                            <div class="text-center mt-3">
                                                <span class="mb-2 text-white">R$</span>
                                                <span id="business_mensal" class="fs-3x fw-bold text-white"></span>
                                                <span class="fs-7 fw-semibold text-white opacity-75">/ Mês</span>
                                            </div>
                                        </div>

                                        <!-- 📌 Modo Anual -->
                                        <div class="anual-view d-none text-center">
                                            <div class="fs-3x fw-bold text-white">R$ <span
                                                    id="business_total_anual"></span></div>
                                            <div class="bg-light-success text-success rounded-2">
                                                <div class="fs-2 fw-bold text-success m-2">
                                                    Economia de: R$
                                                    <span id="business_economia"></span>
                                                </div>
                                            </div>



                                            <div class="mt-4 text-center text-white ">
                                                <div>Implantação: R$ <span id="business_implantacao_anual"></span></div>
                                                <div>Mensal 12x R$ <span id="business_mensal_unit"></span> = R$ <span
                                                        id="business_mensal_sem_desconto"></span></div>
                                                <div>Total: R$ <span id="business_total_sem_desconto"></span></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="w-100 mb-10">
                                        <div class="d-flex flex-stack mb-5"><span
                                                class="fw-semibold fs-6 text-white opacity-75 text-start pe-3">Up to 50
                                                Active Users</span><i
                                                class="ki-outline ki-check-circle fs-1 text-white"></i></div>
                                        <div class="d-flex flex-stack mb-5"><span
                                                class="fw-semibold fs-6 text-white opacity-75 text-start pe-3">Up to
                                                100 Project Integrations</span><i
                                                class="ki-outline ki-check-circle fs-1 text-white"></i></div>
                                        <div class="d-flex flex-stack mb-5"><span
                                                class="fw-semibold fs-6 text-white opacity-75 text-start pe-3">Advanced
                                                Analytics Platform</span><i
                                                class="ki-outline ki-check-circle fs-1 text-white"></i></div>
                                        <div class="d-flex flex-stack mb-5"><span
                                                class="fw-semibold fs-6 text-white opacity-75 text-start pe-3">Priority
                                                Support</span><i
                                                class="ki-outline ki-check-circle fs-1 text-white"></i></div>
                                        <div class="d-flex flex-stack"><span
                                                class="fw-semibold fs-6 text-white opacity-75">Unlimited
                                                Projects</span><i
                                                class="ki-outline ki-cross-circle fs-1 text-white"></i></div>
                                    </div>

                                    <a href="#" class="btn btn-light">Select</a>
                                </div>
                            </div>
                        </div>


                        <!-- 🏢 Enterprise -->
                        <div class="col-xl-4">
                            <div class="d-flex h-100 align-items-center">
                                <div class="w-100 d-flex flex-column flex-center rounded-3 bg-body py-15 px-10">

                                    <div class="mb-7 text-center">
                                        <h1 class="text-gray-900 mb-5 fw-boldest">Enterprise</h1>
                                        <div class="text-gray-500 fw-semibold mb-5">Best Settings for Enterprise</div>

                                        <!-- 📌 Modo Mensal -->
                                        <div class="mensal-view">
                                            <div class="text-center">
                                                <span class="mb-2 text-primary">R$</span>
                                                <span id="enterprise_implantacao"
                                                    class="fs-6 fw-bold text-primary"></span>
                                                <div class="fs-8 fw-semibold opacity-50">Implantação</div>
                                            </div>
                                            <div class="text-center mt-3">
                                                <span class="mb-2 text-primary">R$</span>
                                                <span id="enterprise_mensal"
                                                    class="fs-3x fw-bold text-primary"></span>
                                                <span class="fs-7 fw-semibold opacity-50">/ Mês</span>
                                            </div>
                                        </div>

                                        <!-- 📌 Modo Anual -->
                                        <div class="anual-view d-none text-center">
                                            <div class="fs-3x fw-bold text-primary">R$ <span
                                                    id="enterprise_total_anual"></span></div>
                                            <div class="fs-2 text-success fw-bold">Economia de: R$ <span
                                                    id="enterprise_economia"></span></div>

                                            <div class="mt-4 text-center text-gray-500">
                                                <div>Implantação: R$ <span id="enterprise_implantacao_anual"></span>
                                                </div>
                                                <div>Mensal 12x R$ <span id="enterprise_mensal_unit"></span> = R$ <span
                                                        id="enterprise_mensal_sem_desconto"></span></div>
                                                <div>Total: R$ <span id="enterprise_total_sem_desconto"></span></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="w-100 mb-10">
                                        <div class="d-flex flex-stack mb-5"><span
                                                class="fw-semibold fs-6 opacity-75 text-start pe-3">Unlimited
                                                Users</span><i class="ki-outline ki-check-circle fs-1"></i></div>
                                        <div class="d-flex flex-stack mb-5"><span
                                                class="fw-semibold fs-6 opacity-75 text-start pe-3">Unlimited
                                                Integrations</span><i class="ki-outline ki-check-circle fs-1"></i>
                                        </div>
                                        <div class="d-flex flex-stack mb-5"><span
                                                class="fw-semibold fs-6 opacity-75 text-start pe-3">Full Analytics
                                                Suite</span><i class="ki-outline ki-check-circle fs-1"></i></div>
                                        <div class="d-flex flex-stack mb-5"><span
                                                class="fw-semibold fs-6 opacity-75 text-start pe-3">Dedicated Account
                                                Manager</span><i class="ki-outline ki-check-circle fs-1"></i></div>
                                        <div class="d-flex flex-stack"><span
                                                class="fw-semibold fs-6 opacity-75">Custom Integrations</span><i
                                                class="ki-outline ki-check-circle fs-1"></i></div>
                                    </div>

                                    <a href="#" class="btn btn-primary">Select</a>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- <div class="landing-curve landing-dark-color">
        <svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z"
                fill="currentColor"></path>
        </svg>
    </div> --}}

</div>
