@extends('layouts.app')

@section('title', 'Horários')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Lista de Horários</h5>
        <a href="{{ route('horarios.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Novo Horário
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
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
                    @foreach($horarios as $horario)
                    <tr>
                        <td>{{ $horario->medico->nome }}</td>
                        <td>{{ $horario->especialidade->nome }}</td>
                        <td>{{ $horario->dia_semana }}</td>
                        <td>{{ $horario->hora_inicio ? $horario->hora_inicio->format('H:i') : '' }}</td>
                        <td>{{ $horario->hora_fim ? $horario->hora_fim->format('H:i') : '' }}</td>
                        <td>
                            <span class="badge {{ $horario->ativo ? 'bg-success' : 'bg-danger' }}">
                                {{ $horario->ativo ? 'Ativo' : 'Inativo' }}
                            </span>
                        </td>
                        <td class="action-buttons">
                            <a href="{{ route('horarios.edit', $horario) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('horarios.destroy', $horario) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este horário?')">
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
            {{ $horarios->links() }}
        </div>
    </div>
</div>
@endsection