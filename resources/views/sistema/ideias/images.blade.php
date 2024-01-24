@extends('sistema.template.master')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
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

        <div id="kt_app_content" class="app-content flex-column-fluid mb-5">
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
                                <form class="form fv-plugins-bootstrap5 fv-plugins-framework"
                                    action="{{ route('ideias.imagem-upload') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="mb-8">
                                        <div class="imgPreview">
                                        </div>
                                    </div>

                                    <div class="custom-file">
                                        <input type="hidden" name="ideia_id" value="{{ $ideia->id }}">
                                        <input type="file" name="imageFile[]" class="custom-file-input" id="images"
                                            multiple="multiple">
                                        <label class="custom-file-label" for="images">Escolha as imagens</label>
                                    </div>

                                    <button type="submit" name="submit" class="btn btn-primary btn-block mt-4"> Upload
                                        Images </button>

                                    <div id="error-messages"></div>
                                </form>
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
                        <h1 class="text-dark mb-10">Imagens da Ideia - {{ $ideia->nome }}</h1>

                        <div class="row g-10">
                            @foreach ($ideia->images as $image)
                                <div class="col-md-4">
                                    <div class="card-xl-stretch me-md-6">
                                        <div class="d-block overlay">
                                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-200px"
                                                style="background-image:url({{ $image->imagem ? asset('storage/img/ideias/' . $image->imagem) : asset('assets/media/svg/avatars/blank.svg') }});">
                                            </div>

                                            <div
                                                class="overlay-layer card-rounded bg-dark bg-opacity-25 d-flex justify-content-around">
                                                <a class="d-flex align-items-center justify-content-center w-50 h-100"
                                                    data-fslightbox="lightbox-hot-sales"
                                                    href="{{ $image->imagem ? asset('storage/img/ideias/' . $image->imagem) : asset('assets/media/svg/avatars/blank.svg') }}">
                                                    <i class="bi bi-eye fs-2x text-white"></i>
                                                </a>
                                                <a class="d-flex align-items-center justify-content-center w-50 h-100"
                                                    href="{{ route('ideias.imagem-download', $image->id) }}">
                                                    <i class="bi bi-download fs-2x text-white"></i>
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
@endsection

@section('ajax-status')
    <script src="{{ asset('assets/plugins/custom/fslightbox/fslightbox.bundle.js') }}"></script>

    <script>
        function saveLegend(id, legenda) {
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "{{ route('ideias.create-subtitle') }}",
                data: {
                    'legenda': legenda,
                    'idImagem': id
                },
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                success: function(data) {
                    console.log(data);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('Erro ao atualizar legenda: ', errorThrown);
                }
            });
        }

        $(function() {
            const multiImgPreview = function(input, imgPreviewPlaceholder) {
                if (input.files) {
                    let filesAmount = input.files.length;

                    for (let i = 0; i < filesAmount; i++) {
                        let reader = new FileReader();

                        reader.onload = function(event) {
                            $($.parseHTML('<img class="col-md-3 col-sm-4 gallery-item">')).attr('src', event
                                    .target.result)
                                .appendTo(imgPreviewPlaceholder);
                        }

                        reader.readAsDataURL(input.files[i]);
                    }
                }
            };

            $('#images').on('change', function() {
                multiImgPreview(this, 'div.imgPreview');
            });

            $('form').on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    url: $(this).attr('action'),
                    method: 'POST',
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Sucesso',
                            text: 'Imagem enviada com sucesso.'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        });
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Erro ao enviar formulário!'
                        });
                    }
                });
            });
        });

        $('textarea[id^="legenda-"]').on('input', function() {
            var id = $(this).attr('id').split('-')[1];
            var legenda = $(this).val();
            saveLegend(id, legenda);
        });
    </script>
@endsection
