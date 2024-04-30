"use strict";

const KTSubscriptionsAdvanced = (() => {
    let table, dataTable;
    let counter = 9;

    const updateFieldNames = () => {
        table.querySelectorAll("tbody tr").forEach((row, index) => {
            const firstInput = row.querySelector("td:first-child textarea");
            const secondInput = row.querySelector("td:nth-child(2) textarea");
            if (firstInput) {
                firstInput.setAttribute("name", `grupo_perguntas[${index}][pergunta]`);
            }
            if (secondInput) {
                secondInput.setAttribute("name", `grupo_perguntas[${index}][resposta]`);
            }
        });
    };

    const initTable = () => {
        const addButton = document.getElementById("kt_create_new_custom_fields_add");

        dataTable = $(table).DataTable({
            info: false,
            order: [],
            ordering: false,
            paging: false,
            lengthChange: false
        });

        addButton.addEventListener("click", event => {
            event.preventDefault();
            const firstCellHTML = `<textarea class="form-control form-control-solid" name="grupo_perguntas[${counter}][pergunta]"></textarea>`;
            const secondCellHTML = `<textarea class="form-control form-control-solid" name="grupo_perguntas[${counter}][resposta]"></textarea>`;
            const lastCellHTML = '<button type="button"class="btn btn-icon btn-flex btn-active-light-primary w-50px h-50px me-3"data-kt-action="field_remove"><i class="bi bi-trash3 fs-3"></i></button>';
            const newRow = dataTable.row.add([firstCellHTML, secondCellHTML, lastCellHTML]).draw().node();
            $(newRow).find("td").eq(2).addClass("text-end");
            counter++;
        });
    };

    const initRemoveFieldAction = () => {
        KTUtil.on(table, '[data-kt-action="field_remove"]', "click", event => {
            event.preventDefault();
            const row = event.target.closest("tr");
            Swal.fire({
                text: "Você tem certeza que deseja deletar este campo ?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Sim, deletar!",
                cancelButtonText: "Não, cancelar",
                customClass: {
                    confirmButton: "btn fw-bold btn-danger",
                    cancelButton: "btn fw-bold btn-active-light-primary"
                }
            }).then(result => {
                if (result.value) {
                    Swal.fire({
                        text: "Campo excluido!.",
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, entendi!",
                        customClass: {
                            confirmButton: "btn fw-bold btn-primary"
                        }
                    }).then(() => {
                        dataTable.row($(row)).remove().draw();
                    });
                } else if (result.dismiss === "cancel") {
                    Swal.fire({
                        text: "Campo não excluido.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, entendi!",
                        customClass: {
                            confirmButton: "btn fw-bold btn-primary"
                        }
                    });
                }
            });
        });
    };

    return {
        init: () => {
            table = document.getElementById("kt_create_new_custom_fields");
            initTable();
            updateFieldNames();
            initRemoveFieldAction();
        }
    };
})();

document.addEventListener("DOMContentLoaded", KTSubscriptionsAdvanced.init);
