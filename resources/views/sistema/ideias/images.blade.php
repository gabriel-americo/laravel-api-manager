@extends('sistema.template.master')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Cadastro - {{ $ideia->nome }}</h1>

                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="#" class="text-muted text-hover-primary">Imagens da Ideia</a>
                        </li>

                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>

                        <li class="breadcrumb-item text-muted">Cadastro</li>
                    </ul>
                </div>
            </div>
        </div>

        <div id="kt_app_content" class="app-content flex-column-fluid mb-10">
            <div id="kt_app_content_container" class="app-container container-xxl">

                <div class="tab-pane fade active show" id="kt_ecommerce_add_product_general" role="tab-panel">
                    <div class="d-flex flex-column gap-7 gap-lg-10">
                        <div class="card card-flush py-4">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Imagens das Ideias</h2>
                                </div>
                            </div>

                            <div class="card-body pt-0">
                                <div class="fv-row mb-2">
                                    <div class="dropzone" id="kt_ecommerce_add_product_media">
                                        <div class="dz-message needsclick">
                                            <i class="ki-duotone ki-file-up text-primary fs-3x">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>

                                            <div class="ms-4">
                                                <h3 class="fs-5 fw-bold text-gray-900 mb-1">Solte os arquivos aqui ou clique
                                                    para fazer upload.</h3>
                                                <span class="fs-7 fw-semibold text-gray-400">Carregue até 10 arquivos</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-muted fs-7">Coloque as imagens das ideias.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="card">
                <div class="card-body p-lg-17">
                    <div class="mb-0">
                        <h1 class="text-dark mb-10">Imagens da Ideia</h1>

                        <div class="row g-10">
                            @foreach ($ideia->image as $image)
                                <div class="col-md-4">
                                    <div class="card-xl-stretch me-md-6">
                                        <a class="d-block overlay" data-fslightbox="lightbox-hot-sales"
                                            href="{{ $image->imagem ? asset('storage/img/ideias/' . $image->imagem) : asset('assets/media/svg/avatars/blank.svg') }}">

                                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px"
                                                style="background-image:url({{ $image->imagem ? asset('storage/img/ideias/' . $image->imagem) : asset('assets/media/svg/avatars/blank.svg') }});">
                                            </div>

                                            <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                <i class="bi bi-eye fs-2x text-white"></i>
                                            </div>
                                        </a>

                                        <div class="mt-5">
                                            <span class="fs-4 text-dark fw-bold text-dark lh-base">{{ $image->legenda }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('ajax-status')
    <script>
        "use strict";

        var KTAppEcommerceSaveProduct = function() {
            return {
                init: function() {
                    new Dropzone("#kt_ecommerce_add_product_media", {
                        url: "{{ route('ideias.store') }}", // Endpoint para o upload de imagens
                        paramName: "imageFile",
                        maxFiles: 10,
                        maxFilesize: 10,
                        addRemoveLinks: true,
                        acceptedFiles: 'image/*', // Aceitar apenas imagens
                        success: function(file, response) {
                            console.log(response);
                        },
                        error: function(file, errorMessage) {
                            console.log('erro ao subir a imagem');
                        }
                    });
                }
            };
        }();

        KTUtil.onDOMContentLoaded(function() {
            KTAppEcommerceSaveProduct.init();
        });
    </script>
@endsection
