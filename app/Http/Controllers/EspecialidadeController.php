<?php

namespace App\Http\Controllers;

use App\Models\Especialidade;
use Illuminate\Http\Request;

class EspecialidadeController extends Controller
{
    public function index()
    {
        $especialidades = Especialidade::paginate(10);
        return view('especialidades.index', compact('especialidades'));
    }

    public function create()
    {
        return view('especialidades.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:50|unique:especialidades',
            'descricao' => 'nullable|string',
        ]);

        Especialidade::create($data);

        return redirect()->route('especialidades.index')->with('success', 'Especialidade cadastrada com sucesso!');
    }

    public function edit(Especialidade $especialidade)
    {
        return view('especialidades.edit', compact('especialidade'));
    }

    public function update(Request $request, Especialidade $especialidade)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:50|unique:especialidades,nome,' . $especialidade->id,
            'descricao' => 'nullable|string',
        ]);

        $especialidade->update($data);

        return redirect()->route('especialidades.index')->with('success', 'Especialidade atualizada com sucesso!');
    }

    public function destroy(Especialidade $especialidade)
    {
        $especialidade->delete();

        return redirect()->route('especialidades.index')->with('success', 'Especialidade excluída com sucesso!');
    }
}
