<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Styles -->
    <style>
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f8f9fa;
            text-align: center;
            font-family: Arial, sans-serif;
        }
        .container {
            margin: 10px;
            padding: 2rem;
            background: white;
            border-radius: 0.5rem;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            display: flex; /* Adicionado para flex layout */
        }
        .error-content {
            flex: 1; /* Ocupa metade da largura */
            padding: 1rem;
            text-align: left;
        }
        .error-code {
            font-size: 6rem;
            font-weight: bold;
            color: #6c757d;
        }
        .error-message {
            font-size: 1.5rem;
            color: #6c757d;
            margin-bottom: 1rem;
        }
        p {
            color: #6c757d;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        .img-container {
            flex: 1; /* Ocupa metade da largura */
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .img-fluid {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="error-content">
            <div class="error-code">@yield('code')</div>
            <div class="error-message">@yield('message')</div>
            <p>@yield('message1')</p>
            <a href="{{ url()->previous() }}" class="btn btn-primary">Voltar para o início</a>
        </div>
        <div class="img-container">
            <img class="img-fluid" src="{{ asset('assets/media/auth/nature-erro-page.png') }}" alt="Not Found">
        </div>
    </div>
</body>

</html>
