@extends('admin.template.master')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        
        <x-toolbar-list title="Cadastro" subTitle="Cliente" type="Cadastrar" />

        <div class="app-content flex-column-fluid">
            <div class="app-container container-xxl">
                <div class="card mb-5 mb-xl-10">
                    <div class="card-header border-0">
                        <div class="card-title m-0">
                            <h3 class="fw-bold m-0">Adicionar Cliente</h3>
                        </div>
                    </div>

                    <form class="form" enctype="multipart/form-data" action="{{ route('clientes.store') }}"
                        method="POST">
                        <div class="card-body border-top p-9">
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-semibold fs-6">Imagem do Perfil</label>

                                <div class="col-lg-8">
                                    <div class="image-input image-input-outline" data-kt-image-input="true"
                                        style="background-image: url({{ asset('/assets/media/svg/avatars/blank.svg') }})">
                                        <div
                                            class="image-input-wrapper w-125px h-125px"style="background-image: url({{ asset('/assets/media/svg/avatars/blank.svg') }})">
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

                            <x-text-input name="name" label="Nome" placeholder="Nome" required="true" />
                            
                            <x-text-input name="last_name" id="sobr_cli" label="Sobrenome" placeholder="Sobrenome" required="true" />
                            
                            <x-text-input name="user" label="Usuario" placeholder="Usuario" required="true" />

                            <x-text-input name="email" id="email_cli" label="E-mail" placeholder="E-mail" required="true" />

                            <x-text-input name="site" label="Site" placeholder="Site" />

                            <x-text-input name="password" type="password" label="Senha" placeholder="Senha" required="true" />

                            <div class="separator separator-dashed my-10"></div>

                            <h3 class="text-dark font-weight-bold mb-10">Endereço de Cobrança:</h3>

                            <x-text-input name="name_addresses" label="Nome" placeholder="Nome" />

                            <x-text-input name="last_name_addresses" id="sobr_cob" label="Sobrenome" placeholder="Sobrenome" />

                            <x-text-input name="document_addresses" label="Documento" placeholder="Documento" />

                            <x-text-input name="company_addresses" label="Empresa" placeholder="Empresa" />

                            <x-text-input type="date" name="birth_addresses" label="Data de Nascimento" placeholder="Nascimento" />

                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Sexo</label>
                                <div class="col-lg-8 fv-row">
                                    <select name="sexo_cobrancas" aria-label="Sexo" data-control="select2"
                                        data-placeholder="Sexo"
                                        class="form-select form-select-solid form-select-lg select2-hidden-accessible"
                                        tabindex="-1" aria-hidden="true">
                                        <option value="">Sexo</option>
                                        <option value="M">Masculino</option>
                                        <option value="F">Feminino</option>
                                    </select>
                                </div>
                            </div>

                            <x-text-input name="zip_addresses" id="cep_cobrancas" label="CEP" placeholder="CEP" />

                            <x-text-input name="street_addresses" id="logradouro_cobrancas" label="Rua" placeholder="Rua" />

                            <x-text-input name="number_addresses" label="Número" placeholder="Número" />

                            <x-text-input name="district_addresses" id="bairro_cobrancas" label="Bairro" placeholder="Bairro" />

                            <x-text-input name="complement_addresses" label="Complemento" placeholder="Complemento" />

                            <x-text-input name="city_addresses" id="localidade_cobrancas" label="Cidade" placeholder="Cidade" />

                            <x-text-input name="estate_addresses" id="uf_cobrancas" label="Estado" placeholder="Estado" />

                            <x-text-input name="country_addresses" id="uf_cobrancas" label="País" placeholder="País" value="Brasil" />

                            <x-text-input name="phone_addresses" label="Telefone" placeholder="Telefone" />

                            <x-text-input name="cell_addresses" label="Celular" placeholder="Celular" />

                            <x-text-input name="email_cobrancas" id="email_cob" label="E-mail" placeholder="E-mail" />

                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">E-mail</label>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                            <input type="text" id="email_cob" name="email_cobrancas"
                                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                                placeholder="E-mail" value="{{ old('email_cobrancas') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="separator separator-dashed my-10"></div>

                            <h3 class="text-dark font-weight-bold mb-10">Endereço de Envio:</h3>

                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Nome</label>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                            <input type="text" id="nome_env" name="nome_envios"
                                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                                placeholder="Nome" value="{{ old('nome_envios') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Sobrenome</label>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                            <input type="text" id="sobr_env" name="sobrenome_envios"
                                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                                placeholder="Sobrenome" value="{{ old('sobrenome_envios') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">CEP</label>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                            <input type="text" name="cep_envios" id="cep_envios"
                                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                                placeholder="CEP" value="{{ old('cep_envios') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Rua</label>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                            <input type="text" name="rua_envios" id="logradouro_envios"
                                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                                placeholder="Rua" value="{{ old('rua_envios') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Número</label>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                            <input type="text" name="numero_envios"
                                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                                placeholder="Número" value="{{ old('numero_envios') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Complemento</label>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                            <input type="text" name="complemento_envios"
                                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                                placeholder="Complemento" value="{{ old('complemento_envios') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Bairro</label>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                            <input type="text" name="bairro_envios" id="bairro_envios"
                                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                                placeholder="Bairro" value="{{ old('bairro_envios') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Cidade</label>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                            <input type="text" name="cidade_envios" id="localidade_envios"
                                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                                placeholder="Cidade" value="{{ old('cidade_envios') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Empresa</label>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                            <input type="text" name="empresa_envios"
                                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                                placeholder="Empresa" value="{{ old('empresa_envios') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Estado</label>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                            <input type="text" name="estado_envios" id="uf_envios"
                                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                                placeholder="Estado" value="{{ old('estado_envios') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">País</label>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                            <input type="text" name="pais_envios"
                                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                                placeholder="País" value="Brasil">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Ativar</label>
                                <div class="col-lg-8 d-flex align-items-center">
                                    <div class="form-check form-check-solid form-switch fv-row">
                                        <input class="form-check-input w-45px h-30px" type="checkbox" name="status"
                                            checked="checked" value="1">
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
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('ajax-status')
    <script type="text/javascript">
        $(document).ready(function() {
            const fields = ['nome', 'sobr', 'email'];
            const suffixes = ['cli', 'cob', 'env'];

            fields.forEach(field => {
                $(`#${field}_cli`).on('keyup', function() {
                    const value = $(this).val();
                    suffixes.slice(1).forEach(suffix => {
                        $(`#${field}_${suffix}`).val(value);
                    });
                });
            });

            const cepFields = ['#cep_cobrancas', '#cep_envios'];
            const fieldMapping = {
                'cep_cobrancas': 'cobrancas',
                'cep_envios': 'envios'
            };

            async function fetchCepData(cep, field) {
                try {
                    const response = await $.getJSON(`https://viacep.com.br/ws/${cep}/json/`);
                    ['logradouro', 'localidade', 'uf', 'bairro'].forEach(attr => {
                        $(`#${attr}_${fieldMapping[field]}`).val(response[attr]);
                    });
                } catch (error) {
                    alert('CEP não encontrado.');
                }
            }

            cepFields.forEach(field => {
                $(field).on('input', function() {
                    const cep = $(this).val().replace(/\D/g, '');

                    if (cep.length === 8) {
                        fetchCepData(cep, field.slice(1));
                    }
                });
            });
        });
    </script>
@endsection
