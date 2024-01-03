"use strict";

$(document).ready(() => {
    //
    const KTSweetAlert2Delete = (() => {
        const initDemos = () => {
            $('.sweetalert-delete').click(function (e) {
                e.preventDefault();
                const form = this;
                swal.fire({
                    title: 'Você tem certeza?',
                    text: "Você não poderá reverter essa ação!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sim, delete isso!',
                    cancelButtonText: 'Não, cancelar!',
                    reverseButtons: true,
                    buttonsStyling: false,
                    customClass: {
                        confirmButton: "btn btn-danger",
                        cancelButton: "btn btn-active-light"
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        };

        return {
            init: initDemos
        };
    })();

    //
    const [input1, input2, input3] = [$('#nome_cli'), $('#nome_cob'), $('#nome_env')];

    input1.on('keyup', () => {
        input2.val(input1.val());
        input3.val(input1.val());
    });

    $('#sobr_cli').on('keyup', function() {
        $('#sobr_cob, #sobr_env').val($(this).val());
    });

    //
    var KTAccountSettingsSigninMethods = function() {
        var e, n, o, i, s, r, a, l,
            d = function() {
                e.classList.toggle("d-none"), s.classList.toggle("d-none"), n.classList.toggle("d-none")
            },
            c = function() {
                o.classList.toggle("d-none"), a.classList.toggle("d-none"), i.classList.toggle("d-none")
            };
        return {
            init: function() {
                e = document.getElementById("kt_signin_email"),
                n = document.getElementById("kt_signin_email_edit"),
                o = document.getElementById("kt_signin_password"),
                i = document.getElementById("kt_signin_password_edit"),
                s = document.getElementById("kt_signin_email_button"),
                r = document.getElementById("kt_signin_cancel"),
                a = document.getElementById("kt_signin_password_button"),
                l = document.getElementById("kt_password_cancel"),
                e && (s.querySelector("button").addEventListener("click", (function() {
                        d()
                    })), r.addEventListener("click", (function() {
                        d()
                    })), a.querySelector("button").addEventListener("click", (function() {
                        c()
                    })), l.addEventListener("click", (function() {
                        c()
                    })));
            }
        }
    }();

    KTAccountSettingsSigninMethods.init();
    KTSweetAlert2Delete.init();
});

