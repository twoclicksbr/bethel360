"use strict";
var KTSigninGeneral = function () {
    var t, e, r;
    return {
        init: function () {
            t = document.querySelector("#kt_sign_in_form"), e = document.querySelector("#kt_sign_in_submit"), r = FormValidation.formValidation(t, {
                fields: {
                    email: {
                        validators: {
                            regexp: {
                                regexp: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
                                message: "O valor informado não é um e-mail válido"
                            },
                            notEmpty: {
                                message: "O e-mail é obrigatório"
                            }
                        }
                    },
                    password: {
                        validators: {
                            notEmpty: {
                                message: "A senha é obrigatória"
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger,
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row",
                        eleInvalidClass: "",
                        eleValidClass: ""
                    })
                }
            }), ! function (t) {
                try {
                    return new URL(t), !0
                } catch (t) {
                    return !1
                }
            }(e.closest("form").getAttribute("action")) ? e.addEventListener("click", (function (i) {
                i.preventDefault(), r.validate().then((function (r) {
                    "Valid" == r ? (e.setAttribute("data-kt-indicator", "on"), e.disabled = !0, setTimeout((function () {
                        e.removeAttribute("data-kt-indicator"), e.disabled = !1, Swal.fire({
                            text: "Login realizado com sucesso!",
                            icon: "success",
                            buttonsStyling: !1,
                            confirmButtonText: "1 Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        }).then((function (e) {
                            if (e.isConfirmed) {
                                t.querySelector('[name="email"]').value = "", t.querySelector('[name="password"]').value = "";
                                var r = t.getAttribute("data-kt-redirect-url");
                                r && (location.href = r)
                            }
                        }))
                    }), 2e3)) : Swal.fire({
                        text: "Erro ao processar os dados. Verifique os campos e tente novamente.",
                        icon: "error",
                        buttonsStyling: !1,
                        confirmButtonText: "2 Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    })
                }))
            })) : e.addEventListener("click", (function (i) {
                i.preventDefault(), r.validate().then((function (r) {
                    "Valid" == r ? (e.setAttribute("data-kt-indicator", "on"), e.disabled = !0, axios.post(e.closest("form").getAttribute("action"), new FormData(t)).then((function (e) {
                        if (e) {
                            t.reset(), Swal.fire({
                                text: "You have successfully logged in!",
                                icon: "success",
                                buttonsStyling: !1,
                                confirmButtonText: "3 Ok, got it!",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            });
                            const e = t.getAttribute("data-kt-redirect-url");
                            e && (location.href = e)
                        } else Swal.fire({
                            text: "E-mail ou senha inválidos. Tente novamente.",
                            icon: "error",
                            buttonsStyling: !1,
                            confirmButtonText: "Ok, entendi!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        })
                    })).catch((function (t) {
                        Swal.fire({
                            text: "Sorry, looks like there are some errors detected, please try again.",
                            icon: "error",
                            buttonsStyling: !1,
                            confirmButtonText: "4 Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        })
                    })).then((() => {
                        e.removeAttribute("data-kt-indicator"), e.disabled = !1
                    }))) : Swal.fire({
                        text: "Ocorreu um erro. \n Verifique os dados e tente novamente.",
                        icon: "error",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, entendi!",
                        customClass: {
                            confirmButton: "btn btn-success"
                        }
                    })
                }))
            }))
        }
    }
}();
KTUtil.onDOMContentLoaded((function () {
    KTSigninGeneral.init()
}));
