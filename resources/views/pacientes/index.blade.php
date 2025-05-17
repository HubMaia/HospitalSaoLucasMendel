@extends('layouts.app')

@section('title', 'Pacientes')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Lista de Pacientes</h5>
        <a href="{{ route('pacientes.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Novo Paciente
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Telefone</th>
                        <th>Gênero</th>
                        <th>Tipo Sanguíneo</th>
                        <th>Data de Nascimento</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pacientes as $paciente)
                    <tr>
                        <td>{{ $paciente->nome }}</td>
                        <td>{{ $paciente->cpf }}</td>
                        <td>{{ $paciente->telefone }}</td>
                        <td>{{ $paciente->genero }}</td>
                        <td>{{ $paciente->tipo_sanguineo }}</td>
                        <td>{{ $paciente->data_nascimento->format('d/m/Y') }}</td>
                        <td>
                            <span class="badge {{ $paciente->status_cadastro ? 'bg-success' : 'bg-danger' }}">
                                {{ $paciente->status_cadastro ? 'Ativo' : 'Inativo' }}
                            </span>
                        </td>
                        <td class="action-buttons">
                            <a href="{{ route('pacientes.edit', $paciente) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('pacientes.destroy', $paciente) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este paciente?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {{ $pacientes->links() }}
        </div>
    </div>
</div>
@endsection