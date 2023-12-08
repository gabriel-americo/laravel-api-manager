"use strict";

var KTSubscriptionsAdvanced = (function () {
    var table, dataTable;

    var updateNames = function () {
        table.querySelectorAll("tbody tr").forEach(function (row, index) {
            const textareas = row.querySelectorAll("td textarea");
            textareas.forEach(function (textarea) {
                const textareaId = textarea.getAttribute("id");
                textarea.setAttribute("name", textareaId + "-" + index);
            });
        });
    };

    var initializeTable = function () {
        const addBtn = document.getElementById("kt_create_new_custom_fields_add");
        const defaultRow = table.querySelector("tbody tr");

        var iHtml = defaultRow.querySelector("td:nth-child(1)").innerHTML,
            rHtml = defaultRow.querySelector("td:nth-child(2)").innerHTML,
            cHtml = defaultRow.querySelector("td:nth-child(3)").innerHTML;

        dataTable = $(table).DataTable({
            info: false,
            order: [],
            ordering: false,
            paging: false,
            lengthChange: false
        });

        addBtn.addEventListener("click", function (event) {
            event.preventDefault();
            var newRow = dataTable.row.add([iHtml, rHtml, cHtml]).draw().node();
            $(newRow).find("td").eq(2).addClass("text-end");
            updateNames();
        });
    };

    return {
        init: function () {
            table = document.getElementById("kt_create_new_custom_fields");

            initializeTable();
            updateNames();

            KTUtil.on(table, '[data-kt-action="field_remove"]', "click", function (event) {
                event.preventDefault();
                var row = event.target.closest("tr");

                Swal.fire({
                    text: "Você tem certeza que deseja deletar esse campo?",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Sim, delete!",
                    cancelButtonText: "Não, cancele",
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary"
                    }
                }).then(function (result) {
                    if (result.value) {
                        Swal.fire({
                            text: "Você o excluiu.",
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, entendi!",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary"
                            }
                        }).then(function () {
                            dataTable.row($(row)).remove().draw();
                        });
                    } else if (result.dismiss === "cancel") {
                        Swal.fire({
                            text: "Não foi excluído.",
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
        }
    };
})();

KTUtil.onDOMContentLoaded(function () {
    KTSubscriptionsAdvanced.init();
});
