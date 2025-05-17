@extends('layouts.app')

@section('styles')
<style>
    :root {
        --primary-color: #1d1d1f;
        --secondary-color: #86868b;
        --accent-color: #0066cc;
        --background-color: #f5f5f7;
        --card-background: #ffffff;
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
@endsection

@section('content')
<div class="hero-section">
    <div class="container">
        <h1 class="hero-title">Bem-vindo à Central de Administração</h1>
        <p class="hero-subtitle">Gerencie todos os aspectos da sua clínica com facilidade</p>
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
                            <p class="card-text">Gerenciamento de médicos</p>
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
                <!-- Autorizações -->
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-file-signature feature-icon"></i>
                            <h5 class="card-title">Autorizações</h5>
                            <p class="card-text">Gerenciamento de autorizações de convênio</p>
                            <a href="{{ route('autorizacoes.index') }}" class="btn btn-primary">Acessar</a>
                        </div>
                    </div>
                </div>
                <!-- Pagamentos -->
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-money-check-alt feature-icon"></i>
                            <h5 class="card-title">Pagamentos</h5>
                            <p class="card-text">Gerenciamento de pagamentos</p>
                            <a href="{{ route('pagamentos.index') }}" class="btn btn-primary">Acessar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection