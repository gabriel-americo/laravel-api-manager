@extends('sistema.template.master')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div class="app-toolbar py-3 py-lg-6">
            <div class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">

                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Detalhe da
                        Aprovação</h1>

                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="#" class="text-muted text-hover-primary">Aprovação</a>
                        </li>

                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>

                        <li class="breadcrumb-item text-muted">Visualização</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="app-content flex-column-fluid">
            <div class="app-container container-xxl">
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-body p-lg-17">
                        <div class="mb-0">
                            <h1 class="text-dark mb-10">Imagens das Aprovações</h1>
                            <div class="row g-10">
                                @foreach ($aprovacao->images as $image)
                                    <div class="col-md-4">
                                        <div class="card-xl-stretch me-md-6">
                                            <div class="d-block overlay">
                                                <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-200px"
                                                    style="background-image:url({{ $image->imagem ? asset('storage/img/aprovacao/' . $image->imagem) : asset('assets/media/svg/avatars/blank.svg') }});">
                                                </div>

                                                <div
                                                    class="overlay-layer card-rounded bg-dark bg-opacity-25 d-flex justify-content-around">
                                                    <a class="d-flex align-items-center justify-content-center w-33 h-100"
                                                        data-fslightbox="lightbox-hot-sales"
                                                        href="{{ $image->imagem ? asset('storage/img/aprovacao/' . $image->imagem) : asset('assets/media/svg/avatars/blank.svg') }}">
                                                        <i class="bi bi-eye fs-2x text-white"></i>
                                                    </a>
                                                    <a class="d-flex align-items-center justify-content-center w-33 h-100"
                                                        href="{{ route('aprovacoes-imagens.download-imagem', $image->id) }}">
                                                        <i class="bi bi-download fs-2x text-white"></i>
                                                    </a>
                                                    <a class="d-flex align-items-center justify-content-center w-33 h-100"
                                                        href="{{ route('aprovacoes-imagens.delete-imagem', $image->id) }}"
                                                        onclick="return confirmDeletion(event, this)">
                                                        <i class="bi bi-trash fs-2x text-white"></i>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="mt-4">
                                                <span
                                                    class="fw-semibold fs-6 text-gray-600 text-dark mt-3 mb-5">{{ $image->legenda }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="separator separator-dashed mb-10"></div>

                        <div class="d-flex flex-stack">
                            <div class="d-flex align-items-center me-5">
                                <div class="symbol symbol-40px me-3">
                                    <span class="symbol-label bg-light-{{ $class }}">
                                        <i class="bi bi-check fs-2x text-{{ $class }}"></i>
                                    </span>
                                </div>

                                <div class="me-5">
                                    <span class="text-gray-800 fw-bold fs-5">{{ $aprovacao->ideia->nome }}</span>

                                    <span class="fw-semibold fs-7 d-block text-start text-{{ $class }} ps-0">
                                        {{ $aprovacao->status }} Aprovado</span>
                                </div>
                            </div>

                            <div class="d-flex align-items-center">
                                <div class="d-flex flex-center">
                                    <div class="form-check form-switch form-check-custom form-check-solid">
                                        <input class="form-check-input h-20px w-30px" id="aprovado-status"
                                            data-id="{{ $aprovacao->id }}" type="checkbox" value="1"
                                            {{ $checked }}>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="separator separator-dashed mb-8 mt-8"></div>

                        <div class="d-flex align-items-center w-200px w-sm-800px flex-column mt-3">
                            <div class="d-flex justify-content-between w-100 mt-auto mb-2">
                                <span class="fw-semibold fs-6 text-gray-400">Porcentagem de alterações feitas:</span>
                                <span class="fw-bold fs-6 text-bar">{{ $porcentagem }}%</span>
                            </div>
                            <div class="h-5px mx-3 w-100 bg-light mb-3">
                                <div class="rounded h-7px progress-bar" style="width: {{ $porcentagem }}%;"
                                    aria-valuenow="{{ $porcentagem }}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>

                        <div class="separator separator-dashed mb-8 mt-8"></div>

                        <div class="mb-5">
                            <div class="mb-5">
                                <h3 class="text-gray-900 fs-3 fw-bold">Descrição da aprovação:</h3>
                            </div>

                            <div class="fs-5 fw-semibold text-gray-600">
                                {!! $aprovacao->descricao !!}
                            </div>
                        </div>

                        <div class="separator separator-dashed mb-8 mt-8"></div>

                        <div class="mb-5">
                            <h3 class="text-gray-900 fs-3 fw-bold">Adicionar Alteração:</h3>
                        </div>

                        <form class="form">
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-semibold fs-6">Coloque o que precisa ser
                                    alterado</label>
                                <div class="col-lg-8 fv-row">
                                    <textarea name="correcao" class="form-control form-control-lg"></textarea>
                                    @error('nome')
                                        <div class="fv-plugins-message-container invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <input type="hidden" value="{{ $aprovacao->id }}" name="aprovacao_id">
                            <input type="hidden" value="{{ Auth::user()->id }}" name="usuario_id">

                            <div class="card-footer d-flex justify-content-end py-6 px-9">
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                            @csrf
                        </form>

                        <div class="separator separator-dashed mb-8 mt-8"></div>

                        @foreach ($alteracao as $alteracoes)
                            <div class="card mb-5 mb-xl-8">
                                <div class="card-body pb-0">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="d-flex align-items-center flex-grow-1">
                                            <div class="symbol symbol-55px me-5">
                                                <img src="{{ asset('storage/img/usuarios/' . $alteracoes->usuario->imagem) }}"
                                                    alt="">
                                            </div>

                                            <div class="d-flex flex-column">
                                                <a href="#"
                                                    class="text-gray-900 text-hover-primary fs-6 fw-bold">{{ $alteracoes->usuario->nome }}</a>
                                                <span class="text-gray-400 fw-bold">{{ $alteracoes->create_at }}</span>
                                            </div>
                                        </div>

                                        <div class="my-0">
                                            <span class="ms-2" data-bs-toggle="tooltip"
                                                aria-label="Ative o checkbox para aprovar a resposta"
                                                data-bs-original-title="Ative o checkbox para aprovar a resposta"
                                                data-kt-initialized="1">
                                                <i class="bi bi-question-circle fs-3"></i>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-column flex-row-fluid">
                                        <div class="d-flex align-items-center flex-wrap mb-1">
                                            <span
                                                class="text-gray-800 fs-7 fw-normal pt-1">{{ $alteracoes->correcao }}</span>
                                            <div class="ms-auto form-check form-switch form-check-custom form-check-solid">
                                                <input class="form-check-input h-20px w-30px js-switch"
                                                    data-id="{{ $alteracoes->id }}" type="checkbox" value="1"
                                                    {{ $alteracoes->status == '1' ? 'checked' : '' }}>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-7">
                                        @foreach ($resposta as $respostas)
                                            @if ($respostas->alteracao_id == $alteracoes->id)
                                                <div class="d-flex mb-5">
                                                    <div class="symbol symbol-40px me-5">
                                                        <img src="{{ asset('storage/img/usurios/' . $respostas->usuario->imagem) }}"
                                                            alt="">
                                                    </div>

                                                    <div class="d-flex flex-column flex-row-fluid">
                                                        <div class="d-flex align-items-center flex-wrap mb-1">
                                                            <span
                                                                class="text-gray-800 text-hover-primary fw-bold me-2">{{ $respostas->usuario->nome }}</span>
                                                            <span
                                                                class="text-gray-400 fw-semibold fs-7">{{ $respostas->created_at }}</span>
                                                        </div>

                                                        <span
                                                            class="text-gray-800 fs-7 fw-normal pt-1">{{ $respostas->resposta }}</span>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>

                                    <div class="separator mb-4"></div>

                                    <form class="position-relative mb-6">
                                        <textarea class="form-control border-0 p-0 pe-10 resize-none min-h-25px" data-kt-autosize="true" rows="1"
                                            placeholder="Resposta.." data-kt-initialized="1"
                                            style="overflow: hidden; overflow-wrap: break-word; text-align: start; height: 25px;"></textarea>
                                        <div class="position-absolute top-0 end-0 me-n5">
                                            <span class="btn btn-icon btn-sm btn-active-color-primary pe-0 me-2">
                                                <i class="bi bi-send fs-2 mb-3"></i>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('ajax-status')
    <script src="{{ asset('assets/plugins/custom/fslightbox/fslightbox.bundle.js') }}"></script>

    <script>
        $(document).ready(function() {
            const inputElems = $('input[type="checkbox"]');
            const total = inputElems.length;
            let count = inputElems.filter(":checked").length;

            const updateStatus = (status, id, url, successCallback) => {
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: url,
                    data: {
                        'status': status,
                        'id': id
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: successCallback,
                    error: (jqXHR, textStatus) => console.error('Erro ao atualizar o status: ',
                        textStatus)
                });
            };

            $.fn.animateNumbers = function(stop, duration = 1000, ease = "swing") {
                return this.each(function() {
                    const $this = $(this);
                    const start = parseInt($this.text().replace(/%/g, ''));
                    $({
                        value: start
                    }).animate({
                        value: stop
                    }, {
                        duration,
                        easing: ease,
                        step: function() {
                            $this.text(Math.floor(this.value) + "%");
                        },
                        complete: function() {
                            $this.text(this.value + "%");
                        }
                    });
                });
            };

            $('#aprovado-status').change(function() {
                const status = $(this).prop('checked') ? 1 : 0;
                const aprovacaoId = $(this).data('id');
                const message = status == 1 ? 'Ideia aprovada com sucesso.' :
                    'Ideia desaprovada com sucesso.';

                updateStatus(status, aprovacaoId, "{{ route('aprovacoes.update-status') }}", (data) => {
                    Swal.fire({
                            icon: 'success',
                            title: 'Sucesso',
                            text: message
                        })
                        .then((result) => {
                            if (result.isConfirmed) location.reload();
                        });
                });
            });

            const calculateColor = (percent) => percent < 30 ? 'bg-danger' : percent < 60 ? 'bg-warning' :
                'bg-success';

            let initialPercent = {{ $porcentagem }};
            let initialColor = calculateColor(initialPercent);
            $('.progress-bar').addClass(initialColor);

            $(".js-switch").change(function() {
                const status = $(this).prop('checked') ? 1 : 0;
                const alteracaoId = $(this).data('id');
                count = status == 1 ? count + 1 : count - 1;

                const percent = Math.min(Math.round(count / total * 100), 100);
                const color = calculateColor(percent);

                updateStatus(status, alteracaoId, "{{ route('alteracoes.change-status') }}", () => {
                    $('.text-bar').animateNumbers(percent);
                    $('.progress-bar').removeClass('bg-success bg-warning bg-danger').addClass(
                        color).animate({
                        width: percent + '%'
                    }, 1000);
                });
            });

            $('.form').on('submit', function(e) {
                e.preventDefault();

                var correcao = $('textarea[name="correcao"]').val();
                var aprovacao_id = $('input[type="hidden"][name="aprovacao_id"]').val();
                var usuario_id = $('input[type="hidden"][name="usuario_id"]').val();
                var csrfToken = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: "POST",
                    url: "{{ route('alteracoes.create-alteracao') }}",
                    data: {
                        'correcao': correcao,
                        'aprovacao_id': aprovacao_id,
                        'usuario_id': usuario_id,
                        '_token': csrfToken
                    },
                    success: function(response) {
                        console.log(response);
                        Swal.fire({
                            icon: 'success',
                            title: 'Sucesso',
                            text: 'Formulário enviado com sucesso!'
                        }).then((result) => {
                            if (result.isConfirmed) location.reload();
                        });
                    },
                    error: function(jqXHR, textStatus) {
                        console.error('Erro ao enviar o formulário: ', textStatus);
                    }
                });
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
