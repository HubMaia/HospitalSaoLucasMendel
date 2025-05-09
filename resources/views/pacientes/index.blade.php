@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Pacientes</h1>
    <a href="{{ route('pacientes.create') }}" class="btn btn-primary mb-3">Cadastrar Paciente</a>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>Telefone</th>
                <th>Data de Nascimento</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pacientes as $paciente)
            <tr>
                <td>{{ $paciente->nome }}</td>
                <td>{{ $paciente->cpf }}</td>
                <td>{{ $paciente->telefone }}</td>
                <td>{{ \Carbon\Carbon::parse($paciente->data_nascimento)->format('d/m/Y') }}</td>
                <td>
                    <span class="badge {{ $paciente->status_cadastro ? 'bg-success' : 'bg-danger' }}">
                        {{ $paciente->status_cadastro ? 'Ativo' : 'Inativo' }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('pacientes.edit', $paciente->id) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('pacientes.destroy', $paciente->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir este paciente?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $pacientes->links() }}
</div>
@endsection