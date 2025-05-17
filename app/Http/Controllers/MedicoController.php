<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use App\Models\Especialidade;
use App\Rules\Cpf;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    public function index()
    {
        $medicos = Medico::with('especialidades')->paginate(10);
        return view('medicos.index', compact('medicos'));
    }

    public function create()
    {
        $especialidades = Especialidade::all();
        return view('medicos.create', compact('especialidades'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:100',
            'cpf' => ['required', 'string', 'max:14', 'unique:medicos', new Cpf],
            'genero' => 'required|string|max:20',
            'idade' => 'required|integer',
            'data_nascimento' => 'required|date',
            'endereco' => 'required|string|max:150',
            'telefone' => 'required|string|max:20',
            'matricula' => 'required|string|max:20|unique:medicos',
            'data_admissao' => 'required|date',
            'data_demissao' => 'nullable|date',
            'necessidades_especiais' => 'boolean',
            'ativo' => 'boolean',
            'especialidades' => 'required|array',
            'especialidades.*' => 'exists:especialidades,id', // Garantir que os ids são válidos
        ]);

        $data['ativo'] = $request->has('ativo');
        $medico = Medico::create($data);
        $medico->especialidades()->sync($data['especialidades'] ?? []); // Associa as especialidades

        return redirect()->route('medicos.index')->with('success', 'Médico cadastrado com sucesso!');
    }

    public function edit(Medico $medico)
    {
        $especialidades = Especialidade::all();
        $medico->load('especialidades');
        return view('medicos.edit', compact('medico', 'especialidades'));
    }

    public function update(Request $request, Medico $medico)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:100',
            'cpf' => ['required', 'string', 'max:14', "unique:medicos,cpf,{$medico->id}", new Cpf],
            'genero' => 'required|string|max:20',
            'idade' => 'required|integer',
            'data_nascimento' => 'required|date',
            'endereco' => 'required|string|max:150',
            'telefone' => 'required|string|max:20',
            'matricula' => "required|string|max:20|unique:medicos,matricula,{$medico->id}",
            'data_admissao' => 'required|date',
            'data_demissao' => 'nullable|date',
            'necessidades_especiais' => 'boolean',
            'ativo' => 'boolean',
            'especialidades' => 'required|array',
            'especialidades.*' => 'exists:especialidades,id', // Garantir que os ids são válidos
        ]);

        $data['ativo'] = $request->has('ativo');
        $medico->update($data);
        $medico->especialidades()->sync($data['especialidades'] ?? []); // Atualiza as especialidades

        return redirect()->route('medicos.index')->with('success', 'Médico atualizado com sucesso!');
    }

    public function destroy(Medico $medico)
    {
        $medico->especialidades()->detach(); // Remove as associações de especialidades
        $medico->delete();

        return redirect()->route('medicos.index')->with('success', 'Médico excluído com sucesso!');
    }
}
