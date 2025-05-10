<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sanctu Lucas e Mendel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #1d1d1f;
            --secondary-color: #86868b;
            --accent-color: #0066cc;
            --background-color: #f5f5f7;
            --card-background: #ffffff;
        }

        body {
            background-color: var(--background-color);
            color: var(--primary-color);
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
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

        .hero-section {
            padding: 80px 0;
            text-align: center;
            background: linear-gradient(to bottom, #ffffff, var(--background-color));
        }

        .hero-title {
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 20px;
            background: linear-gradient(45deg, var(--primary-color), var(--accent-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-subtitle {
            font-size: 24px;
            color: var(--secondary-color);
            margin-bottom: 40px;
        }

        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background: var(--card-background);
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 2rem;
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--primary-color);
        }

        .card-text {
            color: var(--secondary-color);
            margin-bottom: 1.5rem;
        }

        .btn-primary {
            background-color: var(--accent-color);
            border: none;
            padding: 10px 25px;
            border-radius: 25px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0055b3;
            transform: scale(1.05);
        }

        .feature-icon {
            font-size: 2rem;
            margin-bottom: 1rem;
            color: var(--accent-color);
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 2rem;
            text-align: center;
            color: var(--primary-color);
        }
    </style>
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

    <div class="hero-section">
        <div class="container">
            <h1 class="hero-title">Excelência em Saúde</h1>
            <p class="hero-subtitle">Cuidando de você com tecnologia e humanidade</p>
        </div>
    </div>

    <div class="container" style="margin-top: -40px;">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    <!-- Médicos -->
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-user-md feature-icon"></i>
                                <h5 class="card-title">Médicos</h5>
                                <p class="card-text">Gerenciamento de médicos e suas especialidades</p>
                                <a href="{{ route('medicos.index') }}" class="btn btn-primary">Acessar</a>
                            </div>
                        </div>
                    </div>

                    <!-- Especialidades -->
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-stethoscope feature-icon"></i>
                                <h5 class="card-title">Especialidades</h5>
                                <p class="card-text">Gerenciamento de especialidades médicas</p>
                                <a href="{{ route('especialidades.index') }}" class="btn btn-primary">Acessar</a>
                            </div>
                        </div>
                    </div>

                    <!-- Horários -->
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-clock feature-icon"></i>
                                <h5 class="card-title">Horários</h5>
                                <p class="card-text">Gerenciamento de horários dos médicos</p>
                                <a href="{{ route('horarios.index') }}" class="btn btn-primary">Acessar</a>
                            </div>
                        </div>
                    </div>

                    <!-- Pacientes -->
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-users feature-icon"></i>
                                <h5 class="card-title">Pacientes</h5>
                                <p class="card-text">Gerenciamento de pacientes</p>
                                <a href="{{ route('pacientes.index') }}" class="btn btn-primary">Acessar</a>
                            </div>
                        </div>
                    </div>

                    <!-- Consultas -->
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-calendar-check feature-icon"></i>
                                <h5 class="card-title">Consultas</h5>
                                <p class="card-text">Agendamento e gerenciamento de consultas</p>
                                <a href="{{ route('consultas.index') }}" class="btn btn-primary">Acessar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>