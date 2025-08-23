<script>
    var hostUrl = "assets/";
</script>

<script src="assets/plugins/global/plugins.bundle.js"></script>
<script src="assets/js/scripts.bundle.js"></script>


<script src="assets/plugins/custom/fslightbox/fslightbox.bundle.js"></script>
<script src="assets/plugins/custom/typedjs/typedjs.bundle.js"></script>


<script src="assets/js/custom/landing.js"></script>
<script src="assets/js/custom/pages/pricing/general.js"></script>


{{-- Calculo do preço --}}
<script>
    const valores = {
        500: {
            implantacao: 2295,
            mensal: 745
        },
        1000: {
            implantacao: 4590,
            mensal: 1490
        },
        1500: {
            implantacao: 6845,
            mensal: 1795
        },
        2000: {
            implantacao: 9100,
            mensal: 2190
        },
        2500: {
            implantacao: 11085,
            mensal: 2490
        },
        3000: {
            implantacao: 13070,
            mensal: 2790
        },
        3500: {
            implantacao: 15035,
            mensal: 3040
        },
        4000: {
            implantacao: 17000,
            mensal: 3290
        },
        4500: {
            implantacao: 19015,
            mensal: 3540
        },
        5000: {
            implantacao: 21030,
            mensal: 3790
        },
    };

    const slider = document.getElementById('slider_qtde');
    const labelQtde = document.getElementById('label_qtde');

    const startupImplantacao = document.getElementById('startup_implantacao');
    const startupMensal = document.getElementById('startup_mensal');

    const businessImplantacao = document.getElementById('business_implantacao');
    const businessMensal = document.getElementById('business_mensal');

    const enterpriseImplantacao = document.getElementById('enterprise_implantacao');
    const enterpriseMensal = document.getElementById('enterprise_mensal');

    let currentPlan = "month"; // padrão

    noUiSlider.create(slider, {
        start: [1000],
        range: {
            'min': 500,
            '10%': 1000,
            '20%': 1500,
            '30%': 2000,
            '40%': 2500,
            '50%': 3000,
            '60%': 3500,
            '70%': 4000,
            '80%': 4500,
            'max': 5000
        },
        snap: true, // 👈 só permite esses valores
        format: {
            to: value => parseInt(value),
            from: value => parseInt(value)
        }
    });

    function updatePrices(qtde) {
        const val = valores[qtde];
        if (!val) return;

        // ✅ Formata quantidade no padrão brasileiro (milhar com ponto)
        labelQtde.innerText = parseInt(qtde).toLocaleString('pt-BR');

        // ---------- STARTUP ----------
        let startupMensalVal = val.mensal;
        let startupImplantVal = val.implantacao;

        // ---------- BUSINESS (20% a mais) ----------
        let businessMensalVal = val.mensal * 1.2;
        let businessImplantVal = val.implantacao * 1.2;

        // ---------- ENTERPRISE (50% a mais) ----------
        let enterpriseMensalVal = val.mensal * 1.5;
        let enterpriseImplantVal = val.implantacao * 1.5;

        if (currentPlan === "month") {
            // Mostrar mensal
            document.querySelectorAll(".mensal-view").forEach(el => el.classList.remove("d-none"));
            document.querySelectorAll(".anual-view").forEach(el => el.classList.add("d-none"));

            // Startup
            startupImplantacao.innerText = startupImplantVal.toLocaleString('pt-BR', {
                minimumFractionDigits: 2
            });
            startupMensal.innerText = startupMensalVal.toLocaleString('pt-BR', {
                minimumFractionDigits: 2
            });

            // Business
            businessImplantacao.innerText = businessImplantVal.toLocaleString('pt-BR', {
                minimumFractionDigits: 2
            });
            businessMensal.innerText = businessMensalVal.toLocaleString('pt-BR', {
                minimumFractionDigits: 2
            });

            // Enterprise
            enterpriseImplantacao.innerText = enterpriseImplantVal.toLocaleString('pt-BR', {
                minimumFractionDigits: 2
            });
            enterpriseMensal.innerText = enterpriseMensalVal.toLocaleString('pt-BR', {
                minimumFractionDigits: 2
            });

        } else {
            // Mostrar anual
            document.querySelectorAll(".mensal-view").forEach(el => el.classList.add("d-none"));
            document.querySelectorAll(".anual-view").forEach(el => el.classList.remove("d-none"));

            // ---------- FUNÇÃO GENÉRICA PARA EVITAR REPETIÇÃO ----------
            function calcularAnual(prefix, implantVal, mensalVal) {
                const totalSemDesc = implantVal + (mensalVal * 12);
                const totalComDesc = totalSemDesc * 0.9; // -10%
                const economia = totalSemDesc - totalComDesc;

                document.getElementById(`${prefix}_total_anual`).innerText = totalComDesc.toLocaleString('pt-BR', {
                    minimumFractionDigits: 2
                });
                document.getElementById(`${prefix}_economia`).innerText = economia.toLocaleString('pt-BR', {
                    minimumFractionDigits: 2
                });
                document.getElementById(`${prefix}_implantacao_anual`).innerText = implantVal.toLocaleString('pt-BR', {
                    minimumFractionDigits: 2
                });
                document.getElementById(`${prefix}_mensal_unit`).innerText = mensalVal.toLocaleString('pt-BR', {
                    minimumFractionDigits: 2
                });
                document.getElementById(`${prefix}_mensal_sem_desconto`).innerText = (mensalVal * 12).toLocaleString(
                    'pt-BR', {
                        minimumFractionDigits: 2
                    });
                document.getElementById(`${prefix}_total_sem_desconto`).innerText = totalSemDesc.toLocaleString(
                    'pt-BR', {
                        minimumFractionDigits: 2
                    });
            }

            // Startup
            calcularAnual("startup", startupImplantVal, startupMensalVal);

            // Business
            calcularAnual("business", businessImplantVal, businessMensalVal);

            // Enterprise
            calcularAnual("enterprise", enterpriseImplantVal, enterpriseMensalVal);
        }
    }

    // Atualiza quando o slider muda
    slider.noUiSlider.on('update', function(values) {
        updatePrices(values[0]);
    });

    // 🔹 Toggle Mensal/Anual
    document.querySelectorAll("[data-kt-plan]").forEach(btn => {
        btn.addEventListener("click", e => {
            e.preventDefault();
            document.querySelectorAll("[data-kt-plan]").forEach(b => b.classList.remove("active"));
            btn.classList.add("active");
            currentPlan = btn.dataset.ktPlan;
            updatePrices(slider.noUiSlider.get());
        });
    });

    // Inicializa
    updatePrices(slider.noUiSlider.get());
</script>
