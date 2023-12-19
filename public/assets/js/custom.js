"use strict";

const KTSweetAlert2Delete = (function () {
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
                if (result.value) {
                    form.submit();
                }
            });
        });
    };

    return {
        init: () => initDemos()
    };
})();

$(document).ready(() => {
    KTSweetAlert2Delete.init();

    const [input1, input2, input3] = [$('#nome_cli'), $('#nome_cob'), $('#nome_env')];

    input1.on('keyup', () => {
        input2.val(input1.val());
        input3.val(input1.val());
    });

    $('#sobr_cli').on('keyup', function() {
        $('#sobr_cob, #sobr_env').val($(this).val());
    });
});
