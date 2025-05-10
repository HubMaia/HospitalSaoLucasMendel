<?php

namespace App\Http\Controllers;

use App\Models\AutorizacaoConvenio;
use Illuminate\Http\Request;

class AutorizacaoConvenioController extends Controller
{
    public function index()
    {
        return view('autorizacoes.index');
    }

    public function create()
    {
        return view('autorizacoes.create');
    }

    public function store(Request $request)
    {
        // Implementação futura
    }

    public function show(AutorizacaoConvenio $autorizacao)
    {
        return view('autorizacoes.show', compact('autorizacao'));
    }

    public function edit(AutorizacaoConvenio $autorizacao)
    {
        return view('autorizacoes.edit', compact('autorizacao'));
    }

    public function update(Request $request, AutorizacaoConvenio $autorizacao)
    {
        // Implementação futura
    }

    public function destroy(AutorizacaoConvenio $autorizacao)
    {
        // Implementação futura
    }
}
