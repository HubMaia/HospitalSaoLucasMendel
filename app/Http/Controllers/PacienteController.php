<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Rules\Cpf;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function index()
    {
        $pacientes = Paciente::paginate(10);
        return view('pacientes.index', compact('pacientes'));
    }

    public function create()
    {
        return view('pacientes.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:100',
            'cpf' => ['required', 'string', 'max:14', 'unique:pacientes', new Cpf],
            'genero' => 'required|string|in:Masculino,Feminino,Outro',
            'tipo_sanguineo' => 'required|string|in:A+,A-,B+,B-,AB+,AB-,O+,O-',
            'telefone' => 'required|string|max:20',
            'endereco' => 'required|string|max:150',
            'data_nascimento' => 'required|date',
            'status_cadastro' => 'boolean'
        ]);

        $data['status_cadastro'] = $request->has('status_cadastro');
        Paciente::create($data);

        return redirect()->route('pacientes.index')
            ->with('success', 'Paciente cadastrado com sucesso!');
    }

    public function edit(Paciente $paciente)
    {
        return view('pacientes.edit', compact('paciente'));
    }

    public function update(Request $request, Paciente $paciente)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:100',
            'cpf' => ['required', 'string', 'max:14', "unique:pacientes,cpf,{$paciente->id}", new Cpf],
            'genero' => 'required|string|in:Masculino,Feminino,Outro',
            'tipo_sanguineo' => 'required|string|in:A+,A-,B+,B-,AB+,AB-,O+,O-',
            'telefone' => 'required|string|max:20',
            'endereco' => 'required|string|max:150',
            'data_nascimento' => 'required|date',
            'status_cadastro' => 'boolean'
        ]);

        $data['status_cadastro'] = $request->has('status_cadastro');
        $paciente->update($data);

        return redirect()->route('pacientes.index')
            ->with('success', 'Paciente atualizado com sucesso!');
    }

    public function destroy(Paciente $paciente)
    {
        $paciente->delete();

        return redirect()->route('pacientes.index')
            ->with('success', 'Paciente excluído com sucesso!');
    }
}
