@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Consultas</h1>
    <a href="{{ route('consultas.create') }}" class="btn btn-primary mb-3">Agendar Consulta</a>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Paciente</th>
                <th>Médico</th>
                <th>Especialidade</th>
                <th>Data</th>
                <th>Hora</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($consultas as $consulta)
            <tr>
                <td>{{ $consulta->paciente->nome }}</td>
                <td>{{ $consulta->medico->nome }}</td>
                <td>{{ $consulta->especialidade->nome }}</td>
                <td>{{ \Carbon\Carbon::parse($consulta->data)->format('d/m/Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($consulta->hora)->format('H:i') }}</td>
                <td>
                    <span class="badge {{ $consulta->status == 'agendada' ? 'bg-primary' : 
                                        ($consulta->status == 'concluída' ? 'bg-success' : 
                                        ($consulta->status == 'cancelada' ? 'bg-danger' : 'bg-warning')) }}">
                        {{ ucfirst($consulta->status) }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('consultas.edit', $consulta->id) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('consultas.destroy', $consulta->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir esta consulta?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $consultas->links() }}
</div>
@endsection