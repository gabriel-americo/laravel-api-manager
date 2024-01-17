@extends('sistema.template.master')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">

                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Detalhe da
                        Ideia</h1>

                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="#" class="text-muted text-hover-primary">Ideia</a>
                        </li>

                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>

                        <li class="breadcrumb-item text-muted">Visualização</li>
                    </ul>
                </div>
            </div>
        </div>

        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-body p-lg-17">
                        <div class="mb-10">
                            <div class="mb-10">
                                <h3 class="fs-2hx text-dark mb-5">{{ $ideias->nome }}</h3>

                                <div class="d-flex flex-wrap mb-6">
                                    <div class="me-9 my-1">
                                        <i class="bi bi-person text-primary fs-2 me-1"></i>
                                        <span class="fw-bold text-gray-400">{{ $ideias->criador }}</span>
                                    </div>

                                    <div class="me-9 my-1">
                                        <i class="bi bi-calendar-date text-primary fs-2 me-1"></i>
                                        <span class="fw-bold text-gray-400">Data de inicio :
                                            {{ $ideias->data_inicio_br }}</span>
                                    </div>

                                    <div class="me-9 my-1">
                                        <i class="bi bi-calendar-date text-primary fs-2 me-1"></i>
                                        <span class="fw-bold text-gray-400">Data de entrega :
                                            {{ $ideias->data_entrega_br }}</span>
                                    </div>

                                    <div class="my-1">
                                        <i class="bi bi-calendar-date text-primary fs-2 me-1"></i>
                                        <span class="fw-bold text-gray-400">Data de lançamento :
                                            {{ $ideias->data_lancamento_br }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="fs-5 fw-semibold text-gray-600">
                                {!! $ideias->descricao !!}
                            </div>
                        </div>

                        <div class="separator separator-dashed mb-10"></div>

                        <div class="mb-0">
                            <h1 class="text-dark mb-10">Perguntas e Respostas</h1>

                            <div class="mb-10">
                                @foreach ($ideias->pergunta as $pergunta)
                                    <div class="d-flex mb-10">
                                        <i class="bi bi-question-circle fs-2x me-5 ms-n1 mt-2"></i>

                                        <div class="d-flex flex-column">
                                            <div class="d-flex align-items-center mb-2">
                                                <span
                                                    class="text-dark fs-4 me-3 fw-semibold">{{ $pergunta->perguntas }}</span>
                                            </div>

                                            <span class="text-muted fw-semibold fs-6">{{ $pergunta->respostas }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="separator separator-dashed mb-10"></div>

                        <div class="mb-0">
                            <h1 class="text-dark mb-10">Imagens da Ideia</h1>

                            <div class="row g-10">
                                @foreach ($ideias->image as $image)
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
                                                <span
                                                    class="fs-4 text-dark fw-bold text-dark lh-base">{{ $image->legenda }}</span>

                                                <div class="fs-6 fw-bold mt-5 d-flex flex-stack">
                                                    <a href="{{ route('ideias.imagem.download', $image->id) }}"
                                                        class="btn btn-sm btn-primary">Download</a>
                                                </div>
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
    </div>
@endsection

@section('ajax-status')
    <script src="{{ asset('assets/plugins/custom/fslightbox/fslightbox.bundle.js') }}"></script>
@endsection
