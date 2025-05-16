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
        $medicos = Medico::where('ativo', true)->with('especialidades')->get();
        $medicosEspecialidades = $medicos->mapWithKeys(function ($medico) {
            return [$medico->id => $medico->especialidades->pluck('id', 'nome')];
        });
        return view('horarios.create', compact('medicos', 'medicosEspecialidades'));
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

        // Verificar se já existe um horário para o mesmo médico, especialidade e dia
        $horarioExistente = HorarioMedico::where('medico_id', $data['medico_id'])
            ->where('especialidade_id', $data['especialidade_id'])
            ->where('dia_semana', $data['dia_semana'])
            ->first();

        if ($horarioExistente) {
            return back()->withErrors([
                'dia_semana' => 'Já existe um horário cadastrado para este médico nesta especialidade e dia da semana.'
            ]);
        }

        HorarioMedico::create($data);

        return redirect()->route('horarios.index')
            ->with('success', 'Horário cadastrado com sucesso!');
    }

    public function edit(HorarioMedico $horario)
    {
        $medicos = Medico::where('ativo', true)->with('especialidades')->get();
        $medicosEspecialidades = $medicos->mapWithKeys(function ($medico) {
            return [$medico->id => $medico->especialidades->pluck('id', 'nome')];
        });
        return view('horarios.edit', compact('horario', 'medicos', 'medicosEspecialidades'));
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

        // Verificar se já existe um horário para o mesmo médico, especialidade e dia
        // Excluindo o próprio horário que está sendo editado
        $horarioExistente = HorarioMedico::where('medico_id', $data['medico_id'])
            ->where('especialidade_id', $data['especialidade_id'])
            ->where('dia_semana', $data['dia_semana'])
            ->where('id', '!=', $horario->id)
            ->first();

        if ($horarioExistente) {
            return back()->withErrors([
                'dia_semana' => 'Já existe um horário cadastrado para este médico nesta especialidade e dia da semana.'
            ]);
        }

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
