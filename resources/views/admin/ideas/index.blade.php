@extends('admin.template.master')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div class="app-toolbar py-3 py-lg-6">
            <div class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Ideias
                    </h1>

                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">Lista</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="app-content flex-column-fluid">
            <div class="app-container container-xxl">
                <div class="card">
                    <div class="card-header border-0 pt-6">
                        <div class="card-title">
                            <div class="d-flex align-items-center position-relative my-1">
                                <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <input type="text" data-kt-table-filter="search"
                                    class="form-control form-control-solid w-250px ps-13" placeholder="Buscar Ideia" />
                            </div>
                        </div>

                        <div class="card-toolbar">
                            <div class="d-flex justify-content-end" data-kt-table-toolbar="base">
                                <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click"
                                    data-kt-menu-placement="bottom-end">
                                    <i class="ki-duotone ki-filter fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>Filtros</button>
                                <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
                                    <div class="px-7 py-5">
                                        <div class="fs-5 text-dark fw-bold">Opções de filtros</div>
                                    </div>

                                    <div class="separator border-gray-200"></div>

                                    <div class="px-7 py-5" data-kt-table-filter="form">
                                        <div class="mb-10">
                                            <label class="form-label fs-6 fw-semibold">Status:</label>
                                            <select class="form-select form-select-solid fw-bold" data-kt-select2="true"
                                                data-placeholder="Selecione o status" data-allow-clear="true"
                                                data-kt-table-filter="status" data-hide-search="true">
                                                <option></option>
                                                <option value="Iniciar">Iniciar</option>
                                                <option value="Em Andamento">Em Andamento</option>
                                                <option value="Concluído">Concluído</option>
                                            </select>
                                        </div>

                                        <div class="d-flex justify-content-end">
                                            <button type="reset"
                                                class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6"
                                                data-kt-menu-dismiss="true" data-kt-table-filter="reset">Resetar</button>
                                            <button type="submit" class="btn btn-primary fw-semibold px-6"
                                                data-kt-menu-dismiss="true" data-kt-table-filter="filter">Aplicar</button>
                                        </div>
                                    </div>
                                </div>

                                <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_export_users">
                                    <i class="ki-duotone ki-exit-up fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>Exportar</button>

                                <a href="{{ route('ideias.create') }}" type="button" class="btn btn-primary">
                                    <i class="ki-duotone ki-plus fs-2"></i>Novo Registro
                                </a>
                            </div>

                            <div class="d-flex justify-content-end align-items-center d-none"
                                data-kt-table-toolbar="selected">
                                <div class="fw-bold me-5">
                                    <span class="me-2" data-kt-table-select="selected_count"></span>Selecionados
                                </div>
                                <button type="button" class="btn btn-danger" data-kt-table-select="delete_selected">Deletar
                                    Selecionados</button>
                            </div>

                            @include('admin.template.export')
                        </div>
                    </div>

                    <div class="card-body py-4">
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table">
                            <thead>
                                <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                    <th class="w-10px pe-2">
                                        <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                            <input class="form-check-input" type="checkbox" data-kt-check="true"
                                                data-kt-check-target="#kt_table .form-check-input" value="" />
                                        </div>
                                    </th>
                                    <th class="min-w-125px">Nome da Arte</th>
                                    <th class="min-w-125px">Data do Inicio</th>
                                    <th class="min-w-125px">Data da Entrega</th>
                                    <th class="min-w-125px">Data do Lançamento</th>
                                    <th class="min-w-100px">Criador da Arte</th>
                                    <th class="text-center min-w-95px">Status</th>
                                    <th class="text-center min-w-95px">Imagens</th>
                                    <th class="text-end min-w-100px">Ações</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 fw-semibold">
                                @foreach ($ideas as $idea)
                                    <tr>
                                        <td>
                                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox"
                                                    value="{{ $idea->id }}" />
                                            </div>
                                        </td>
                                        <td><a class="text-gray-800 text-hover-primary mb-1"
                                                href="{{ route('ideas.show', $idea->id) }}">{{ $idea->nome }}</a></td>
                                        <td>{{ $idea->data_inicio_br }}</td>
                                        <td>{{ $idea->data_entrega_br }}</td>
                                        <td>{{ $idea->data_lancamento_br }}</td>
                                        <td>{{ $idea->criador }}</td>
                                        <td class="text-center">
                                            <div class="{{ $idea->class }}">
                                                {{ $idea->status }}
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('ideais.images', $idea->id) }}">
                                                <i class="bi bi-images fs-1"></i>
                                            </a>
                                        </td>
                                        <td class="text-end">
                                            <a href="#"
                                                class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Ações
                                                <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                data-kt-menu="true">
                                                <div class="menu-item px-3">
                                                    <a href="{{ route('ideais.edit', $idea->id) }}"
                                                        class="menu-link px-3">Editar</a>
                                                </div>

                                                <form class="menu-item px-3 sweetalert-delete"
                                                    action="{{ route('ideais.destroy', $idea->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="menu-link px-3 button-delete"
                                                        type="submit">Deletar</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('ajax-status')
    <script src="{{ asset('assets/js/custom/apps/user-management/users/list/export-users.js') }}"></script>

    <script type="text/javascript">
        "use strict";

        var KTUsersList = (function() {
            const tableName = "ideas";
            const columnIndexDataEntrega = 3;

            const tableElement = document.getElementById("kt_table");

            var initTable = function() {
                const checkboxes = tableElement.querySelectorAll('[type="checkbox"]');
                const baseToolbar = document.querySelector('[data-kt-table-toolbar="base"]');
                const selectedToolbar = document.querySelector('[data-kt-table-toolbar="selected"]');
                const selectedCountElement = document.querySelector('[data-kt-table-select="selected_count"]');
                const deleteBtn = document.querySelector('[data-kt-table-select="delete_selected"]');

                checkboxes.forEach((checkbox) => {
                    checkbox.addEventListener("click", function() {
                        setTimeout(updateSelection, 50);
                    });
                });

                deleteBtn.addEventListener("click", confirmDelete);

                function updateSelection() {
                    const checkboxes = tableElement.querySelectorAll('tbody [type="checkbox"]');
                    let isSelected = false;
                    let selectedCount = 0;

                    checkboxes.forEach((checkbox) => {
                        if (checkbox.checked) {
                            isSelected = true;
                            selectedCount++;
                        }
                    });

                    if (isSelected) {
                        selectedCountElement.textContent = selectedCount;
                        baseToolbar.classList.add("d-none");
                        selectedToolbar.classList.remove("d-none");
                    } else {
                        baseToolbar.classList.remove("d-none");
                        selectedToolbar.classList.add("d-none");
                    }
                }

                function confirmDelete() {
                    Swal.fire({
                        text: `Tem certeza de que deseja excluir os ${tableName} selecionados?`,
                        icon: "warning",
                        showCancelButton: true,
                        buttonsStyling: false,
                        confirmButtonText: "Sim, deletar!",
                        cancelButtonText: "Não, cancelar",
                        customClass: {
                            confirmButton: "btn fw-bold btn-danger",
                            cancelButton: "btn fw-bold btn-active-light-primary"
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            const selected = [];
                            $('#kt_table .form-check-input:checked').each(function() {
                                selected.push($(this).val());
                            });

                            $.ajax({
                                type: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                url: '{{ route('usuarios.multi-delete') }}',
                                data: {
                                    'selected': selected
                                },
                                success: function(response, textStatus, xhr) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: response,
                                        showDenyButton: false,
                                        showCancelButton: false,
                                        confirmButtonText: 'OK'
                                    }).then((result) => {
                                        window.location = '/' + tableName;
                                    });
                                }
                            });
                        } else if (result.dismiss === "cancel") {
                            Swal.fire({
                                text: `Os ${tableName} selecionados não foram excluídos.`,
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, eu entendi!",
                                customClass: {
                                    confirmButton: "btn fw-bold btn-primary"
                                }
                            });
                        }
                    });
                }
            };

            return {
                init: function() {
                    if (tableElement) {
                        tableElement.querySelectorAll("tbody tr").forEach((row) => {
                            const cells = row.querySelectorAll("td");
                            const dateText = cells[2].innerText.toLowerCase();
                            const currentDate = moment().subtract(0, "minutes").format();
                            cells[0].setAttribute("data-order", currentDate);
                        });

                        var dataTable = $(tableElement).DataTable({
                            info: false,
                            order: [
                                [columnIndexDataEntrega, 'desc']
                            ],
                            pageLength: 10,
                            lengthChange: false,
                            columnDefs: [{
                                type: 'date-br',
                                targets: [0, columnIndexDataEntrega],
                                orderable: false,
                            }]
                        }).on("draw", function() {
                            initTable();
                        });

                        initTable();

                        document.querySelector('[data-kt-table-filter="search"]').addEventListener(
                            "keyup",
                            function(event) {
                                dataTable.search(event.target.value).draw();
                            }
                        );

                        document.querySelector('[data-kt-table-filter="reset"]').addEventListener(
                            "click",
                            function() {
                                document.querySelector('[data-kt-table-filter="form"]').querySelectorAll(
                                    "select"
                                ).forEach((select) => {
                                    $(select).val("").trigger("change");
                                });
                                dataTable.search("").draw();
                            }
                        );

                        (function() {
                            const form = document.querySelector('[data-kt-table-filter="form"]');
                            const filterBtn = form.querySelector('[data-kt-table-filter="filter"]');
                            const selects = form.querySelectorAll("select");

                            filterBtn.addEventListener("click", function() {
                                let filterString = "";

                                selects.forEach((select, index) => {
                                    if (select.value && select.value !== "") {
                                        if (index !== 0) {
                                            filterString += " ";
                                        }
                                        filterString += select.value;
                                    }
                                });

                                dataTable.search(filterString).draw();
                            });
                        })();
                    }
                }
            };
        })();

        $.fn.dataTable.ext.type.order['date-br-pre'] = function(date) {
            const parts = date.split('/');
            return Date.parse(parts[2] + '-' + parts[1] + '-' + parts[0]) || 0;
        };

        KTUtil.onDOMContentLoaded(() => {
            KTUsersList.init();
        });
    </script>
@endsection
