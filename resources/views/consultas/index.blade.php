@extends('layouts.app')

@section('title', 'Consultas')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Lista de Consultas</h5>
        <a href="{{ route('consultas.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Nova Consulta
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Paciente</th>
                        <th>Médico</th>
                        <th>Data</th>
                        <th>Horário</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($consultas as $consulta)
                    <tr>
                        <td>{{ $consulta->paciente->nome }}</td>
                        <td>{{ $consulta->medico->nome }}</td>
                        <td>{{ $consulta->data ? $consulta->data->format('d/m/Y') : 'N/A' }}</td>
                        <td>{{ $consulta->hora ? $consulta->hora->format('H:i') : 'N/A' }}</td>
                        <td>
                            <span class="badge {{ $consulta->status == 'agendada' ? 'bg-primary' : ($consulta->status == 'realizada' ? 'bg-success' : 'bg-danger') }}">
                                {{ ucfirst($consulta->status) }}
                            </span>
                        </td>
                        <td class="action-buttons">
                            <a href="{{ route('consultas.edit', $consulta) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('consultas.destroy', $consulta) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir esta consulta?')">
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
            {{ $consultas->links() }}
        </div>
    </div>
</div>
@endsection