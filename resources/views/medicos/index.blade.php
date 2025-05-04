@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Médicos</h1>
    <a href="{{ route('medicos.create') }}" class="btn btn-primary mb-3">Cadastrar Médico</a>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>Especialidades</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($medicos as $medico)
            <tr>
                <td>{{ $medico->nome }}</td>
                <td>{{ $medico->cpf }}</td>
                <td>
                    @foreach ($medico->especialidades as $especialidade)
                    <span class="badge bg-secondary">{{ $especialidade->nome }}</span>
                    @endforeach
                </td>
                <td>
                    <a href="{{ route('medicos.edit', $medico->id) }}" class="btn btn-sm btn-warning">Editar</a>

                    <form action="{{ route('medicos.destroy', $medico->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $medicos->links() }}
</div>
@endsection