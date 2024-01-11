<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

        h1 {
            color: #3498db;
        }

        p {
            line-height: 1.6em;
        }

        a {
            color: #3498db;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            color: #1f6fb2;
        }
    </style>
    <title>Redefinição de Senha</title>
</head>
<body>
    <div class="container">
        <h1>Redefinição de Senha</h1>
        <p>Olá,</p>
        <p>Você está recebendo este e-mail porque uma solicitação de redefinição de senha foi feita para sua conta.</p>
        <p>Clique no link abaixo para redefinir sua senha:</p>
        <p><a href="{{ route("password.reset", $token) }}">Resetar Senha</a></p>
        <p>Se você não solicitou uma redefinição de senha, ignore este e-mail.</p>
        <p>Obrigado!</p>
    </div>
</body>
</html>
