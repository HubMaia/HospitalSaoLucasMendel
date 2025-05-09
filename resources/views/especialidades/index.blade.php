@extends('layouts.app')

@section('title', 'Especialidades')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Lista de Especialidades</h5>
        <a href="{{ route('especialidades.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Nova Especialidade
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($especialidades as $especialidade)
                    <tr>
                        <td>{{ $especialidade->nome }}</td>
                        <td>{{ $especialidade->descricao }}</td>
                        <td class="action-buttons">
                            <a href="{{ route('especialidades.edit', $especialidade) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('especialidades.destroy', $especialidade) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir esta especialidade?')">
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
            {{ $especialidades->links() }}
        </div>
    </div>
</div>
@endsection