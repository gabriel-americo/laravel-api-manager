@extends('sistema.template.master')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div class="app-toolbar py-3 py-lg-6">
            <div class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Cadastro imagens - {{ $ideia->nome }}</h1>

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

        <div class="app-content flex-column-fluid mb-5">
            <div class="app-container container-xxl">

                <div class="tab-pane fade active show" role="tab-panel">
                    <div class="d-flex flex-column gap-7 gap-lg-10">
                        <div class="card card-flush py-4">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Imagens das Ideias</h2>
                                </div>
                            </div>

                            <div class="card-body pt-0">
                                <form class="form fv-plugins-bootstrap5 fv-plugins-framework"
                                    action="{{ route('ideias-imagens.upload-imagem') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="mb-5">
                                        <div class="imgPreview row object-fit-cover"></div>
                                    </div>

                                    <div class="custom-file">
                                        <input type="hidden" name="ideia_id" value="{{ $ideia->id }}">
                                        <input type="file" name="imageFile[]" class="custom-file-input" id="images"
                                            multiple="multiple">
                                        <label class="custom-file-label" for="images">Escolha as imagens</label>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-block mt-4"> Upload Images </button>
                                </form>
                                <div class="text-muted fs-7">Coloque as imagens das ideias.</div>
                            </div>

                            <div class="separator separator-dashed mb-8"></div>

                            <div class="card-body">
                                <div class="mb-0">
                                    <h1 class="text-dark mb-10">Imagens da Ideia - {{ $ideia->nome }}</h1>

                                    <div class="row g-10">
                                        @foreach ($ideia->ideiaImagem as $image)
                                            <div class="col-md-4">
                                                <div class="card-xl-stretch me-md-6">
                                                    <div class="d-block overlay">
                                                        <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-200px"
                                                            style="background-image:url({{ $image->imagem ? asset('storage/img/ideias/' . $image->imagem) : asset('assets/media/svg/avatars/blank.svg') }});">
                                                        </div>

                                                        <div
                                                            class="overlay-layer card-rounded bg-dark bg-opacity-50 d-flex justify-content-around">
                                                            <a class="d-flex align-items-center justify-content-center w-33 h-100"
                                                                data-fslightbox="lightbox-ideias"
                                                                href="{{ $image->imagem ? asset('storage/img/ideias/' . $image->imagem) : asset('assets/media/svg/avatars/blank.svg') }}">
                                                                <i class="bi bi-eye fs-2x text-white"></i>
                                                            </a>
                                                            <a class="d-flex align-items-center justify-content-center w-33 h-100"
                                                                href="{{ route('ideias-imagens.download-imagem', $image->id) }}">
                                                                <i class="bi bi-download fs-2x text-white"></i>
                                                            </a>
                                                            <a class="d-flex align-items-center justify-content-center w-33 h-100"
                                                                href="{{ route('ideias-imagens.delete-imagem', $image->id) }}"
                                                                onclick="return confirmDeletion(event, this)">
                                                                <i class="bi bi-trash fs-2x text-white"></i>
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <div class="mt-5">
                                                        <textarea id="legenda-{{ $image->id }}" class="form-control">{{ $image->legenda }}</textarea>
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
        </div>
    </div>
@endsection

@section('ajax-status')
    <script src="{{ asset('assets/plugins/custom/fslightbox/fslightbox.bundle.js') }}"></script>

    <script>
        $(function() {
            const form = $('form');
            const images = $('#images');
            const legendas = $('textarea[id^="legenda-"]');
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            const ajaxCall = (type, url, data, successMessage, errorMessage) => {
                return $.ajax({
                    type,
                    dataType: "json",
                    url,
                    data,
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    processData: false,
                    contentType: false,
                    success: () => Swal.fire({
                        icon: 'success',
                        title: 'Sucesso',
                        text: successMessage
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    }),
                    error: () => Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: errorMessage
                    })
                });
            };

            const saveLegend = (id, legenda) => {
                ajaxCall("POST", "{{ route('ideias-imagens.create-subtitle') }}", {
                    'legenda': legenda,
                    'idImagem': id
                }, 'Legenda atualizada com sucesso.', 'Erro ao atualizar legenda.');
            };

            const multiImgPreview = (input, imgPreviewPlaceholder) => {
                if (input.files) {
                    [...input.files].forEach(file => {
                        const reader = new FileReader();

                        reader.onload = event => {
                            $($.parseHTML(
                                    '<div class="col-md-3 col-sm-4 gallery-item"><img class="h-75 d-inline-block img-fluid"></div>'
                                ))
                                .find('img')
                                .attr('src', event.target.result)
                                .end()
                                .appendTo(imgPreviewPlaceholder);
                        }

                        reader.readAsDataURL(file);
                    });
                }
            };

            images.on('change', function() {
                multiImgPreview(this, 'div.imgPreview');
            });

            form.on('submit', function(e) {
                e.preventDefault();
                ajaxCall('POST', $(this).attr('action'), new FormData(this), 'Imagem enviada com sucesso.',
                    'Erro ao enviar formulário!');
            });

            legendas.on('input', function() {
                const id = $(this).attr('id').split('-')[1];
                const legenda = $(this).val();
                saveLegend(id, legenda);
            });
        });

        function confirmDeletion(e, element) {
            e.preventDefault();
            const href = $(element).attr('href');
            Swal.fire({
                title: 'Tem certeza?',
                text: "Você não poderá reverter isso!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sim, delete!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = href;
                }
            });
        }
    </script>
@endsection
