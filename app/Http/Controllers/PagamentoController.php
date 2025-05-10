<?php

namespace App\Http\Controllers;

use App\Models\Pagamento;
use Illuminate\Http\Request;

class PagamentoController extends Controller
{
    public function index()
    {
        return view('pagamentos.index');
    }

    public function create()
    {
        return view('pagamentos.create');
    }

    public function store(Request $request)
    {
        // Implementação futura
    }

    public function show(Pagamento $pagamento)
    {
        return view('pagamentos.show', compact('pagamento'));
    }

    public function edit(Pagamento $pagamento)
    {
        return view('pagamentos.edit', compact('pagamento'));
    }

    public function update(Request $request, Pagamento $pagamento)
    {
        // Implementação futura
    }

    public function destroy(Pagamento $pagamento)
    {
        // Implementação futura
    }
}
