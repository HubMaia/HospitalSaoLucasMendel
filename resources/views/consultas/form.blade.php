@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="mb-3">
    <label for="paciente_id" class="form-label">Paciente</label>
    <select name="paciente_id" id="paciente_id" class="form-select" required>
        <option value="">Selecione um paciente</option>
        @foreach($pacientes as $paciente)
        <option value="{{ $paciente->id }}" {{ (old('paciente_id', $consulta->paciente_id ?? '') == $paciente->id) ? 'selected' : '' }}>
            {{ $paciente->nome }}
        </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="medico_id" class="form-label">Médico</label>
    <select name="medico_id" id="medico_id" class="form-select" required>
        <option value="">Selecione um médico</option>
        @foreach($medicos as $medico)
        <option value="{{ $medico->id }}" {{ (old('medico_id', $consulta->medico_id ?? '') == $medico->id) ? 'selected' : '' }}>
            {{ $medico->nome }}
        </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="especialidade_id" class="form-label">Especialidade</label>
    <select name="especialidade_id" id="especialidade_id" class="form-select" required>
        <option value="">Selecione uma especialidade</option>
        @foreach($especialidades as $especialidade)
        <option value="{{ $especialidade->id }}" {{ (old('especialidade_id', $consulta->especialidade_id ?? '') == $especialidade->id) ? 'selected' : '' }}>
            {{ $especialidade->nome }}
        </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="data" class="form-label">Data</label>
    <input type="date" name="data" id="data" class="form-control"
        value="{{ old('data', optional($consulta->data ?? null)->format('Y-m-d')) }}" required>
</div>

<div class="mb-3">
    <label for="hora" class="form-label">Hora</label>
    <input type="time" name="hora" id="hora" class="form-control"
        value="{{ old('hora', optional($consulta->hora ?? null)->format('H:i')) }}" required>
</div>

<div class="mb-3">
    <label for="status" class="form-label">Status</label>
    <select name="status" id="status" class="form-select" required>
        <option value="agendada" {{ (old('status', $consulta->status ?? '') == 'agendada') ? 'selected' : '' }}>Agendada</option>
        <option value="concluída" {{ (old('status', $consulta->status ?? '') == 'concluída') ? 'selected' : '' }}>Concluída</option>
        <option value="cancelada" {{ (old('status', $consulta->status ?? '') == 'cancelada') ? 'selected' : '' }}>Cancelada</option>
        <option value="faltou" {{ (old('status', $consulta->status ?? '') == 'faltou') ? 'selected' : '' }}>Faltou</option>
    </select>
</div>