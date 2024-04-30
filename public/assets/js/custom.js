"use strict";

$(document).ready(() => {
    const toggleVisibility = (element) => element.classList.toggle("d-none");

    const KTSweetAlert2Delete = {
        init: () => {
            $(".sweetalert-delete").click(function (e) {
                e.preventDefault();
                const form = this;
                swal.fire({
                    title: "Você tem certeza?",
                    text: "Você não poderá reverter essa ação!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Sim, delete isso!",
                    cancelButtonText: "Não, cancelar!",
                    reverseButtons: true,
                    buttonsStyling: false,
                    customClass: {
                        confirmButton: "btn btn-danger",
                        cancelButton: "btn btn-active-light",
                    },
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        },
    };

    const KTAccountSettingsSigninMethods = {
        init: () => {
            const elements = [
                "kt_signin_email",
                "kt_signin_email_edit",
                "kt_signin_password",
                "kt_signin_password_edit",
                "kt_signin_email_button",
                "kt_signin_cancel",
                "kt_signin_password_button",
                "kt_password_cancel",
            ].map((id) => document.getElementById(id));

            if (elements[0]) {
                [elements[4], elements[5], elements[6], elements[7]].forEach(
                    (button) => {
                        button.addEventListener("click", () => {
                            toggleVisibility(elements[0]);
                            toggleVisibility(elements[1]);
                            toggleVisibility(elements[2]);
                            toggleVisibility(elements[3]);
                        });
                    }
                );
            }
        },
    };

    KTAccountSettingsSigninMethods.init();
    KTSweetAlert2Delete.init();
});
