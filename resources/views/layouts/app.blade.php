<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Sanctu Lucas e Mendel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #1d1d1f;
            --secondary-color: #86868b;
            --accent-color: #0066cc;
            --background-color: #f5f5f7;
            --card-background: #ffffff;
            --danger-color: #ff3b30;
            --success-color: #34c759;
        }

        body {
            background-color: var(--background-color);
            color: var(--primary-color);
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            padding-top: 76px;
        }

        .navbar {
            background-color: rgba(255, 255, 255, 0.8) !important;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            color: var(--primary-color) !important;
            font-weight: 600;
        }

        .logo {
            height: 40px;
            margin-right: 10px;
        }

        .page-header {
            background: linear-gradient(to right, #ffffff, var(--background-color));
            padding: 2rem 0;
            margin-bottom: 2rem;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        .page-title {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary-color);
            margin: 0;
        }

        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background: var(--card-background);
            overflow: hidden;
            margin-bottom: 1.5rem;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: var(--card-background);
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
        }

        .card-body {
            padding: 1.5rem;
        }

        .btn {
            border-radius: 25px;
            padding: 0.5rem 1.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background-color: var(--accent-color);
            border: none;
        }

        .btn-primary:hover {
            background-color: #0055b3;
            transform: scale(1.05);
        }

        .btn-danger {
            background-color: var(--danger-color);
            border: none;
        }

        .btn-danger:hover {
            background-color: #ff2d55;
            transform: scale(1.05);
        }

        .btn-success {
            background-color: var(--success-color);
            border: none;
        }

        .btn-success:hover {
            background-color: #30b350;
            transform: scale(1.05);
        }

        .form-control {
            border-radius: 12px;
            border: 1px solid rgba(0, 0, 0, 0.1);
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            box-shadow: 0 0 0 3px rgba(0, 102, 204, 0.2);
            border-color: var(--accent-color);
        }

        .table {
            background-color: var(--card-background);
            border-radius: 20px;
            overflow: hidden;
        }

        .table thead th {
            background-color: rgba(0, 0, 0, 0.02);
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            font-weight: 600;
            padding: 1rem;
        }

        .table tbody td {
            padding: 1rem;
            vertical-align: middle;
        }

        .badge {
            padding: 0.5rem 1rem;
            border-radius: 15px;
            font-weight: 500;
        }

        .alert {
            border-radius: 15px;
            border: none;
            padding: 1rem 1.5rem;
        }

        .alert-success {
            background-color: rgba(52, 199, 89, 0.1);
            color: var(--success-color);
        }

        .alert-danger {
            background-color: rgba(255, 59, 48, 0.1);
            color: var(--danger-color);
        }

        .pagination {
            margin-top: 2rem;
        }

        .page-link {
            border-radius: 12px;
            margin: 0 0.2rem;
            border: none;
            color: var(--primary-color);
            padding: 0.5rem 1rem;
        }

        .page-item.active .page-link {
            background-color: var(--accent-color);
            color: white;
        }

        .action-buttons .btn {
            padding: 0.4rem 0.8rem;
            margin: 0 0.2rem;
        }

        .status-badge {
            padding: 0.5rem 1rem;
            border-radius: 15px;
            font-weight: 500;
        }

        .status-active {
            background-color: rgba(52, 199, 89, 0.1);
            color: var(--success-color);
        }

        .status-inactive {
            background-color: rgba(255, 59, 48, 0.1);
            color: var(--danger-color);
        }
    </style>
    @yield('styles')
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="/">
                <img src="{{ asset('images/SANCTU LUCAS E MENDEL.png') }}" alt="Sanctu Lucas e Mendel" class="logo">
                Sanctu Lucas e Mendel
            </a>
        </div>
    </nav>

    <div class="page-header">
        <div class="container">
            <h1 class="page-title">@yield('title')</h1>
        </div>
    </div>

    <div class="container">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script>
        $(document).ready(function() {
            // Máscara para CPF
            $('.cpf-mask').mask('000.000.000-00', {
                reverse: true
            });

            // Máscara para telefone
            $('.phone-mask').mask('(00) 00000-0000');

            // Máscara para hora
            $('.time-mask').mask('00:00');

            // Máscara para CEP
            $('.cep-mask').mask('00000-000');
        });
    </script>
    @stack('scripts')
</body>

</html>