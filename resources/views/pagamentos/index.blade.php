@extends('layouts.app')

@section('title', 'Pagamentos de Consultas')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Lista de Pagamentos de Consultas</h5>
        <a href="{{ route('pagamentos.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Novo Pagamento
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Paciente</th>
                        <th>Médico</th>
                        <th>Data da Consulta</th>
                        <th>Valor</th>
                        <th>Método de Pagamento</th>
                        <th>Data do Pagamento</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>João Silva</td>
                        <td>Dr. Carlos Santos</td>
                        <td>20/05/2024</td>
                        <td>R$ 150,00</td>
                        <td>Cartão de Crédito</td>
                        <td>15/05/2024</td>
                        <td class="action-buttons">
                            <a href="#" class="btn btn-primary btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="#" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este pagamento?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td>Maria Santos</td>
                        <td>Dra. Ana Oliveira</td>
                        <td>22/05/2024</td>
                        <td>R$ 200,00</td>
                        <td>Dinheiro</td>
                        <td>16/05/2024</td>
                        <td class="action-buttons">
                            <a href="#" class="btn btn-primary btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="#" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este pagamento?')">
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