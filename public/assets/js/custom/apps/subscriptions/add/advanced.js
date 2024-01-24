"use strict";

class KTSubscriptionsAdvanced {
    constructor() {
        this.table = document.getElementById("kt_create_new_custom_fields");
        this.dataTable = null;
        this.initializeTable();
        this.updateNames();
    }

    updateNames() {
        this.table.querySelectorAll("tbody tr").forEach((row, index) => {
            const textareas = row.querySelectorAll("td textarea");
            textareas.forEach((textarea) => {
                const textareaId = textarea.getAttribute("id");
                textarea.setAttribute("name", `${textareaId}-${index}`);
            });
        });
    }

    initializeTable() {
        const addBtn = document.getElementById("kt_create_new_custom_fields_add");
        const defaultRow = this.table.querySelector("tbody tr");

        const iHtml = defaultRow.querySelector("td:nth-child(1)").innerHTML;
        const rHtml = defaultRow.querySelector("td:nth-child(2)").innerHTML;
        const cHtml = defaultRow.querySelector("td:nth-child(3)").innerHTML;

        this.dataTable = $(this.table).DataTable({
            info: false,
            order: [],
            ordering: false,
            paging: false,
            lengthChange: false
        });

        addBtn.addEventListener("click", (event) => {
            event.preventDefault();
            const newRow = this.dataTable.row.add([iHtml, rHtml, cHtml]).draw().node();
            $(newRow).find("td").eq(2).addClass("text-end");
            this.updateNames();
        });
    }
}

document.addEventListener("DOMContentLoaded", () => {
    new KTSubscriptionsAdvanced();
});
