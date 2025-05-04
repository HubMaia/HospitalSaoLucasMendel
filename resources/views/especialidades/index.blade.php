@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Especialidades</h2>
    <a href="{{ route('especialidades.create') }}" class="btn btn-primary">Nova Especialidade</a>
</div>

@if (session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($especialidades as $especialidade)
        <tr>
            <td>{{ $especialidade->id }}</td>
            <td>{{ $especialidade->nome }}</td>
            <td>{{ $especialidade->descricao }}</td>
            <td>
                <a href="{{ route('especialidades.edit', $especialidade) }}" class="btn btn-sm btn-warning">Editar</a>

                <form action="{{ route('especialidades.destroy', $especialidade) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Excluir</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4">Nenhuma especialidade encontrada.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection