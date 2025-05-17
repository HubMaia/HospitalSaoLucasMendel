@extends('layouts.app')

@section('title', 'Médicos')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Lista de Médicos</h5>
        <a href="{{ route('medicos.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Novo Médico
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Especialidades</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($medicos as $medico)
                    <tr>
                        <td>{{ $medico->nome }}</td>
                        <td>
                            @foreach($medico->especialidades as $especialidade)
                            <span class="badge bg-primary">{{ $especialidade->nome }}</span>
                            @endforeach
                        </td>
                        <td>
                            <span class="badge {{ $medico->ativo ? 'bg-success' : 'bg-danger' }}">
                                {{ $medico->ativo ? 'Ativo' : 'Inativo' }}
                            </span>
                        </td>
                        <td class="action-buttons">
                            <a href="{{ route('medicos.edit', $medico) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('medicos.destroy', $medico) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este médico?')">
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
            {{ $medicos->links() }}
        </div>
    </div>
</div>
@endsection