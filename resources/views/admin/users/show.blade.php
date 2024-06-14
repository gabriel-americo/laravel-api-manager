@extends('admin.template.master')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        
        <x-toolbar-list title="Detalhe do Usuário" subTitle="Usuário" type="Visualização" />

        <div class="app-content flex-column-fluid">
            <div class="app-container container-xxl">
                <div class="card mb-5 mb-xxl-8">
                    <div class="card-body pt-9 pb-0">
                        <div class="d-flex flex-wrap flex-sm-nowrap">
                            <div class="me-7 mb-4">
                                <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                                    <img src="{{ asset($imagem) }}" alt="{{ $user->name }}" />
                                    <div
                                        class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border-4 border-body h-20px w-20px">
                                    </div>
                                </div>
                            </div>

                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                    <div class="d-flex flex-column">
                                        <div class="d-flex align-items-center mb-2">
                                            <a href="#"
                                                class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">{{ $user->name }}</a>
                                            <a href="#">
                                                <i class="ki-duotone ki-verify fs-1 text-primary">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </a>
                                        </div>

                                        <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                                            <a href="#"
                                                class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                                <i class="ki-duotone ki-profile-circle fs-4 me-1">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                </i>{{ $user->roles->first()->name }}</a>
                                            <a href="#"
                                                class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                                <i class="ki-duotone ki-sms fs-4 me-1">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>{{ $user->email }}</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex flex-wrap flex-stack">
                                    <div class="d-flex flex-column flex-grow-1 pe-8">
                                        <div class="d-flex flex-wrap">
                                            <div
                                                class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <i class="ki-duotone ki-arrow-up fs-3 text-success me-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                    <div class="fs-2 fw-bold" data-kt-countup="true"
                                                        data-kt-countup-value="5000" data-kt-countup-prefix="R$">0</div>
                                                </div>

                                                <div class="fw-semibold fs-6 text-gray-400">Lucro</div>
                                            </div>

                                            <div
                                                class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <i class="ki-duotone ki-arrow-down fs-3 text-danger me-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                    <div class="fs-2 fw-bold" data-kt-countup="true"
                                                        data-kt-countup-value="12000" data-kt-countup-prefix="R$">0</div>
                                                </div>

                                                <div class="fw-semibold fs-6 text-gray-400">Investimentos</div>
                                            </div>

                                            <div
                                                class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="fs-2 fw-bold" data-kt-countup="true"
                                                        data-kt-countup-value="60">0</div>
                                                </div>

                                                <div class="fw-semibold fs-6 text-gray-400">Projetos</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
