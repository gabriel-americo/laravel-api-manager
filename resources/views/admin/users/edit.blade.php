@extends('admin.template.master')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">

        <x-toolbar-list title="Atualização" subTitle="Usuário" type="Atualizar" />

        <div class="app-content flex-column-fluid">
            <div class="app-container container-xxl">
                <div class="card mb-5 mb-xl-10">
                    <div class="card-header border-0">
                        <div class="card-title m-0">
                            <h3 class="fw-bold m-0">Editar Usuário</h3>
                        </div>
                    </div>

                    <form class="form" enctype="multipart/form-data" action="{{ route('usuarios.update', $user->id) }}"
                        method="POST">
                        <div class="card-body border-top p-9">
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-semibold fs-6">Imagem do Perfil</label>

                                <div class="col-lg-8">
                                    <div class="image-input image-input-outline" data-kt-image-input="true"
                                        style="background-image: url('assets/media/svg/avatars/blank.svg')">
                                        <div class="image-input-wrapper w-125px h-125px"
                                            style="background-image: url({{ $user->imagePath }})">
                                        </div>

                                        <label
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                            title="Trocar imagem">
                                            <i class="ki-duotone ki-pencil fs-7">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>

                                            <input type="file" name="imagem" accept=".png, .jpg, .jpeg" />
                                            <input type="hidden" name="avatar_remove" />
                                        </label>

                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                            title="Cancelar imagem">
                                            <i class="ki-duotone ki-cross fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </span>

                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                            title="Remover imagem">
                                            <i class="ki-duotone ki-cross fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </span>
                                    </div>

                                    <div class="form-text">Tipos de arquivo permitidos: png, jpg, jpeg.</div>
                                </div>
                            </div>

                            <x-text-input name="name" label="Nome Completo" placeholder="Nome Completo" value="{{ $user->name }}" required="true" />

                            <x-text-input name="user" label="Usuário" placeholder="Usuário" value="{{ $user->user }}" required="true" />

                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                    <span class="required">Sexo</span>
                                </label>
                                <div class="col-lg-8 fv-row">
                                    <select name="sexo" data-control="select2"
                                        class="form-select form-select-solid form-select-lg fw-semibold">
                                        <option value="Masculino" {{ $user->sexo == 'Masculino' ? 'selected' : '' }}>
                                            Masculino</option>
                                        <option value="Feminino" {{ $user->sexo == 'Feminino' ? 'selected' : '' }}>
                                            Feminino</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                    <span class="required">Função</span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                        title="Função do usuário para definir a prioridade"></i>
                                </label>
                                <div class="col-lg-8 fv-row">
                                    <select name="roles" aria-label="Selecione uma função" data-control="select2"
                                        data-placeholder="Selecione uma função..."
                                        class="form-select form-select-solid form-select-lg fw-semibold">
                                        <option value="">Selecione uma função...</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}"
                                                {{ $user->roles->contains($role->id) ? 'selected' : '' }}>
                                                {{ $role->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('roles')
                                        <div class="fv-plugins-message-container invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <label class="col-lg-4 col-form-label fw-semibold fs-6">Ativar</label>
                                <div class="col-lg-8 d-flex align-items-center">
                                    <div class="form-check form-check-solid form-switch fv-row">
                                        <input class="form-check-input w-45px h-30px" type="checkbox" name="status"
                                            {{ $user['status'] == 'Ativo' ? 'checked' : '' }}
                                            value="{{ $status }}" />
                                        <label class="form-check-label" for="ativar"></label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                            <button type="reset" class="btn btn-light btn-active-light-primary me-2">Resetar</button>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                        @csrf
                        @method('PUT')
                    </form>
                </div>

                <div class="card mb-5 mb-xl-10">
                    <div class="card-header border-0">
                        <div class="card-title m-0">
                            <h3 class="fw-bold m-0">Metodo de login</h3>
                        </div>
                    </div>

                    <div class="card-body border-top p-9">
                        <div class="d-flex flex-wrap align-items-center">
                            <div id="kt_signin_email">
                                <div class="fs-6 fw-bold mb-1">Email</div>
                                <div class="fw-semibold text-gray-600">{{ $user->email }}</div>
                            </div>

                            <div id="kt_signin_email_edit" class="flex-row-fluid d-none">
                                <form class="form" action="{{ route('usuarios.update-email', $user->id) }}"
                                    method="POST" novalidate="novalidate">
                                    <div class="row mb-6">
                                        <div class="col-lg-6 mb-4 mb-lg-0">
                                            <div class="fv-row mb-0">
                                                <label for="emailaddress" class="form-label fs-6 fw-bold mb-3">Novo
                                                    Email</label>
                                                <input type="email"
                                                    class="form-control form-control-lg form-control-solid"
                                                    placeholder="Email" name="email" value="{{ $user->email }}" />
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="fv-row mb-0">
                                                <label for="confirmemailpassword"
                                                    class="form-label fs-6 fw-bold mb-3">Confirmar Senha</label>
                                                <input type="password"
                                                    class="form-control form-control-lg form-control-solid"
                                                    name="confirmemailpassword" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <button type="submit" class="btn btn-primary me-2 px-6">Atualizar Email</button>
                                        <button id="kt_signin_cancel" type="button"
                                            class="btn btn-color-gray-400 btn-active-light-primary px-6">Cancelar</button>
                                    </div>
                                    @csrf
                                    @method('PATCH')
                                </form>
                            </div>

                            <div id="kt_signin_email_button" class="ms-auto">
                                <button class="btn btn-light btn-active-light-primary">Mudar Email</button>
                            </div>
                        </div>

                        <div class="separator separator-dashed my-6"></div>

                        <div class="d-flex flex-wrap align-items-center mb-10">
                            <div id="kt_signin_password">
                                <div class="fs-6 fw-bold mb-1">Senha</div>
                                <div class="fw-semibold text-gray-600">************</div>
                            </div>

                            <div id="kt_signin_password_edit" class="flex-row-fluid d-none">
                                <form class="form" action="{{ route('usuarios.update-password', $user->id) }}"
                                    method="POST" novalidate="novalidate">
                                    <div class="row mb-1">
                                        <div class="col-lg-4">
                                            <div class="fv-row mb-0">
                                                <label for="currentpassword" class="form-label fs-6 fw-bold mb-3">Senha
                                                    Atual</label>
                                                <input type="password"
                                                    class="form-control form-control-lg form-control-solid"
                                                    name="currentpassword" />
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="fv-row mb-0">
                                                <label for="newpassword" class="form-label fs-6 fw-bold mb-3">Nova
                                                    Senha</label>
                                                <input type="password"
                                                    class="form-control form-control-lg form-control-solid"
                                                    name="newpassword" id="newpassword" />
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="fv-row mb-0">
                                                <label for="confirmpassword"
                                                    class="form-label fs-6 fw-bold mb-3">Confirmar Nova Senha</label>
                                                <input type="password"
                                                    class="form-control form-control-lg form-control-solid"
                                                    name="confirmpassword" id="confirmpassword" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-text mb-5">A senha deve ter pelo menos 6 caracteres</div>
                                    <div class="d-flex">
                                        <button type="submit" class="btn btn-primary me-2 px-6"
                                            id="btnAtualizarSenha">Atualizar Senha</button>
                                        <button id="kt_password_cancel" type="button"
                                            class="btn btn-color-gray-400 btn-active-light-primary px-6">Cancelar</button>
                                    </div>
                                    @csrf
                                    @method('PATCH')
                                </form>
                            </div>

                            <div id="kt_signin_password_button" class="ms-auto">
                                <button class="btn btn-light btn-active-light-primary">Resetar Senha</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('ajax-status')
    <script>
        $(document).ready(function() {
            const $newPassword = $('#newpassword');
            const $confirmPassword = $('#confirmpassword');
            const $updateButton = $('#btnAtualizarSenha');

            // Função para verificar se as senhas são iguais
            function arePasswordsEqual() {
                const newPassword = $newPassword.val();
                const confirmPassword = $confirmPassword.val();
                return newPassword === confirmPassword;
            }

            // Função para atualizar a validade da confirmação de senha
            function updatePasswordValidity() {
                const isConfirmPasswordValid = arePasswordsEqual();
                $confirmPassword.toggleClass('is-valid', isConfirmPasswordValid);
                $confirmPassword.toggleClass('is-invalid', !isConfirmPasswordValid);
            }

            // Função para atualizar o estado do botão de atualização
            function updateButtonState() {
                const isConfirmPasswordValid = arePasswordsEqual();
                $updateButton.prop('disabled', !isConfirmPasswordValid);
            }

            // Adicionar ouvinte de evento para atualizar a validade da senha e o estado do botão
            $newPassword.add($confirmPassword).on('input', function() {
                updatePasswordValidity();
                updateButtonState();
            });
        });
    </script>
@endsection
