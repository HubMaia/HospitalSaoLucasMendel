<?php

namespace App\Http\Controllers;

use App\Models\HorarioMedico;
use App\Models\Medico;
use App\Models\Especialidade;
use Illuminate\Http\Request;

class HorarioMedicoController extends Controller
{
    public function index()
    {
        $horarios = HorarioMedico::with(['medico', 'especialidade'])->paginate(10);
        return view('horarios.index', compact('horarios'));
    }

    public function create()
    {
        $medicos = Medico::where('ativo', true)->get();
        $especialidades = Especialidade::all();
        return view('horarios.create', compact('medicos', 'especialidades'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'medico_id' => 'required|exists:medicos,id',
            'especialidade_id' => 'required|exists:especialidades,id',
            'dia_semana' => 'required|string|max:15',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fim' => 'required|date_format:H:i|after:hora_inicio',
            'ativo' => 'boolean'
        ]);

        HorarioMedico::create($data);

        return redirect()->route('horarios.index')
            ->with('success', 'Horário cadastrado com sucesso!');
    }

    public function edit(HorarioMedico $horario)
    {
        $medicos = Medico::where('ativo', true)->get();
        $especialidades = Especialidade::all();
        return view('horarios.edit', compact('horario', 'medicos', 'especialidades'));
    }

    public function update(Request $request, HorarioMedico $horario)
    {
        $data = $request->validate([
            'medico_id' => 'required|exists:medicos,id',
            'especialidade_id' => 'required|exists:especialidades,id',
            'dia_semana' => 'required|string|max:15',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fim' => 'required|date_format:H:i|after:hora_inicio',
            'ativo' => 'boolean'
        ]);

        $horario->update($data);

        return redirect()->route('horarios.index')
            ->with('success', 'Horário atualizado com sucesso!');
    }

    public function destroy(HorarioMedico $horario)
    {
        $horario->delete();

        return redirect()->route('horarios.index')
            ->with('success', 'Horário excluído com sucesso!');
    }
}
