@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Horários dos Médicos</h1>
    <a href="{{ route('horarios.create') }}" class="btn btn-primary mb-3">Cadastrar Horário</a>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Médico</th>
                <th>Especialidade</th>
                <th>Dia da Semana</th>
                <th>Horário Início</th>
                <th>Horário Fim</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($horarios as $horario)
            <tr>
                <td>{{ $horario->medico->nome }}</td>
                <td>{{ $horario->especialidade->nome }}</td>
                <td>{{ $horario->dia_semana }}</td>
                <td>{{ \Carbon\Carbon::parse($horario->hora_inicio)->format('H:i') }}</td>
                <td>{{ \Carbon\Carbon::parse($horario->hora_fim)->format('H:i') }}</td>
                <td>
                    <span class="badge {{ $horario->ativo ? 'bg-success' : 'bg-danger' }}">
                        {{ $horario->ativo ? 'Ativo' : 'Inativo' }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('horarios.edit', $horario->id) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('horarios.destroy', $horario->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir este horário?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $horarios->links() }}
</div>
@endsection