<!DOCTYPE html>
<html lang="pt">

<head>
    <base href="{{ env('APP_URL') }}" />
    <title>Sistema de Gerenciamento | CMS</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="refresh" content="600">

    <link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />

    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
</head>

<body class="app-blank">
    
    @yield('content')
    @include('admin.template.auth.flags')

    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#newpassword, #confirmpassword').on('input', function() {
                var newPassword = $('#newpassword').val();
                var confirmPassword = $('#confirmpassword').val();
    
                $('#confirmpassword').toggleClass('is-valid', newPassword === confirmPassword);
                $('#confirmpassword').toggleClass('is-invalid', newPassword !== confirmPassword);
    
                var isConfirmPasswordValid = $('#confirmpassword').hasClass('is-valid');
    
                // Desabilitar o botão de atualizar se o campo de confirmação de senha não for válido
                $('#btnAtualizarSenha').prop('disabled', !isConfirmPasswordValid);
            });
        });
    </script>
</body>

</html>
