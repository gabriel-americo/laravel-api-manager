<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmação de Troca de Senha</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Olá, {{ $user->name }}</h2>
        <p>Este e-mail é para confirmar que a sua senha foi alterada com sucesso.</p>
        <p>Se você não solicitou esta alteração, por favor, entre em contato conosco imediatamente.</p>
        <p>Atenciosamente,</p>
        <p>Equipe do Seu Projeto</p>
    </div>
</body>
</html>