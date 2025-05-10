@extends('layouts.app')

@section('title', 'Autorizações de Convênio')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Lista de Autorizações de Convênio</h5>
        <a href="{{ route('autorizacoes.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Nova Autorização
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Paciente</th>
                        <th>Convênio</th>
                        <th>Número da Carteirinha</th>
                        <th>Status</th>
                        <th>Data da Autorização</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>João Silva</td>
                        <td>Unimed</td>
                        <td>123456789</td>
                        <td>
                            <span class="badge bg-warning">Pendente</span>
                        </td>
                        <td>-</td>
                        <td class="action-buttons">
                            <a href="#" class="btn btn-primary btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="#" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir esta autorização?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td>Maria Santos</td>
                        <td>Amil</td>
                        <td>987654321</td>
                        <td>
                            <span class="badge bg-success">Aprovada</span>
                        </td>
                        <td>15/05/2024</td>
                        <td class="action-buttons">
                            <a href="#" class="btn btn-primary btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="#" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir esta autorização?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection