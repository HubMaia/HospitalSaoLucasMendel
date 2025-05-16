<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\Paciente;
use App\Models\Medico;
use App\Models\Especialidade;
use App\Models\HorarioMedico;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ConsultaController extends Controller
{
    public function index()
    {
        $consultas = Consulta::with(['paciente', 'medico', 'especialidade'])
            ->orderBy('data')
            ->orderBy('hora')
            ->paginate(10);
        return view('consultas.index', compact('consultas'));
    }

    public function create()
    {
        $pacientes = Paciente::where('status_cadastro', true)->get();
        $medicos = Medico::where('ativo', true)->with('especialidades')->get();
        $medicosEspecialidades = $medicos->mapWithKeys(function ($medico) {
            return [$medico->id => $medico->especialidades->pluck('nome', 'id')];
        });
        return view('consultas.create', compact('pacientes', 'medicos', 'medicosEspecialidades'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'medico_id' => 'required|exists:medicos,id',
            'especialidade_id' => 'required|exists:especialidades,id',
            'data' => 'required|date|after_or_equal:today',
            'hora' => 'required|date_format:H:i',
            'status' => 'required|in:agendada,concluída,cancelada,faltou'
        ]);

        // Verificar se o médico tem horário disponível na data e hora selecionada
        $dataConsulta = Carbon::parse($data['data']);
        $diaSemana = $this->getDiaSemana($dataConsulta->dayOfWeek);

        // Primeiro, verificar se o médico atende na especialidade selecionada
        $medicoEspecialidade = HorarioMedico::where('medico_id', $data['medico_id'])
            ->where('especialidade_id', $data['especialidade_id'])
            ->where('ativo', true)
            ->first();

        if (!$medicoEspecialidade) {
            return back()->withErrors(['especialidade_id' => 'Este médico não atende na especialidade selecionada.']);
        }

        // Depois, verificar se o médico atende no dia da semana
        $medicoDia = HorarioMedico::where('medico_id', $data['medico_id'])
            ->where('especialidade_id', $data['especialidade_id'])
            ->where('dia_semana', $diaSemana)
            ->where('ativo', true)
            ->first();

        if (!$medicoDia) {
            return back()->withErrors(['data' => 'Este médico não atende nas ' . strtolower($diaSemana) . 's.']);
        }

        // Por fim, verificar se o horário está dentro do período de atendimento
        $horarioMedico = HorarioMedico::where('medico_id', $data['medico_id'])
            ->where('especialidade_id', $data['especialidade_id'])
            ->where('dia_semana', $diaSemana)
            ->where('ativo', true)
            ->where('hora_inicio', '<=', $data['hora'])
            ->where('hora_fim', '>=', $data['hora'])
            ->first();

        if (!$horarioMedico) {
            return back()->withErrors(['hora' => 'O horário selecionado está fora do período de atendimento do médico.']);
        }

        // Verificar se já existe consulta agendada no mesmo horário
        $consultaExistente = Consulta::where('medico_id', $data['medico_id'])
            ->where('data', $data['data'])
            ->where('hora', $data['hora'])
            ->where('status', '!=', 'cancelada')
            ->first();

        if ($consultaExistente) {
            return back()->withErrors(['hora' => 'Já existe uma consulta agendada neste horário.']);
        }

        Consulta::create($data);

        return redirect()->route('consultas.index')
            ->with('success', 'Consulta agendada com sucesso!');
    }

    public function edit(Consulta $consulta)
    {
        $pacientes = Paciente::where('status_cadastro', true)->get();
        $medicos = Medico::where('ativo', true)->with('especialidades')->get();
        $medicosEspecialidades = $medicos->mapWithKeys(function ($medico) {
            return [$medico->id => $medico->especialidades->pluck('nome', 'id')];
        });
        return view('consultas.edit', compact('consulta', 'pacientes', 'medicos', 'medicosEspecialidades'));
    }

    public function update(Request $request, Consulta $consulta)
    {
        $data = $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'medico_id' => 'required|exists:medicos,id',
            'especialidade_id' => 'required|exists:especialidades,id',
            'data' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'status' => 'required|in:agendada,concluída,cancelada,faltou'
        ]);

        // Verificar se o médico tem horário disponível na data e hora selecionada
        $dataConsulta = Carbon::parse($data['data']);
        $diaSemana = $this->getDiaSemana($dataConsulta->dayOfWeek);

        // Primeiro, verificar se o médico atende na especialidade selecionada
        $medicoEspecialidade = HorarioMedico::where('medico_id', $data['medico_id'])
            ->where('especialidade_id', $data['especialidade_id'])
            ->where('ativo', true)
            ->first();

        if (!$medicoEspecialidade) {
            return back()->withErrors(['especialidade_id' => 'Este médico não atende na especialidade selecionada.']);
        }

        // Depois, verificar se o médico atende no dia da semana
        $medicoDia = HorarioMedico::where('medico_id', $data['medico_id'])
            ->where('especialidade_id', $data['especialidade_id'])
            ->where('dia_semana', $diaSemana)
            ->where('ativo', true)
            ->first();

        if (!$medicoDia) {
            return back()->withErrors(['data' => 'Este médico não atende nas ' . strtolower($diaSemana) . 's.']);
        }

        // Por fim, verificar se o horário está dentro do período de atendimento
        $horarioMedico = HorarioMedico::where('medico_id', $data['medico_id'])
            ->where('especialidade_id', $data['especialidade_id'])
            ->where('dia_semana', $diaSemana)
            ->where('ativo', true)
            ->where('hora_inicio', '<=', $data['hora'])
            ->where('hora_fim', '>=', $data['hora'])
            ->first();

        if (!$horarioMedico) {
            return back()->withErrors(['hora' => 'O horário selecionado está fora do período de atendimento do médico.']);
        }

        // Verificar se já existe consulta agendada no mesmo horário (exceto a própria consulta)
        $consultaExistente = Consulta::where('medico_id', $data['medico_id'])
            ->where('data', $data['data'])
            ->where('hora', $data['hora'])
            ->where('status', '!=', 'cancelada')
            ->where('id', '!=', $consulta->id)
            ->first();

        if ($consultaExistente) {
            return back()->withErrors(['hora' => 'Já existe uma consulta agendada neste horário.']);
        }

        $consulta->update($data);

        return redirect()->route('consultas.index')
            ->with('success', 'Consulta atualizada com sucesso!');
    }

    public function destroy(Consulta $consulta)
    {
        $consulta->delete();
        return redirect()->route('consultas.index')
            ->with('success', 'Consulta excluída com sucesso!');
    }

    private function getDiaSemana($dayOfWeek)
    {
        $dias = [
            0 => 'Domingo',
            1 => 'Segunda-feira',
            2 => 'Terça-feira',
            3 => 'Quarta-feira',
            4 => 'Quinta-feira',
            5 => 'Sexta-feira',
            6 => 'Sábado'
        ];
        return $dias[$dayOfWeek];
    }
}
