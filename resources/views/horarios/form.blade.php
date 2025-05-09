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
    <label for="medico_id" class="form-label">Médico</label>
    <select name="medico_id" id="medico_id" class="form-select" required>
        <option value="">Selecione um médico</option>
        @foreach($medicos as $medico)
        <option value="{{ $medico->id }}" {{ (old('medico_id', $horario->medico_id ?? '') == $medico->id) ? 'selected' : '' }}>
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
        <option value="{{ $especialidade->id }}" {{ (old('especialidade_id', $horario->especialidade_id ?? '') == $especialidade->id) ? 'selected' : '' }}>
            {{ $especialidade->nome }}
        </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="dia_semana" class="form-label">Dia da Semana</label>
    <select name="dia_semana" id="dia_semana" class="form-select" required>
        <option value="">Selecione um dia</option>
        <option value="Segunda-feira" {{ (old('dia_semana', $horario->dia_semana ?? '') == 'Segunda-feira') ? 'selected' : '' }}>Segunda-feira</option>
        <option value="Terça-feira" {{ (old('dia_semana', $horario->dia_semana ?? '') == 'Terça-feira') ? 'selected' : '' }}>Terça-feira</option>
        <option value="Quarta-feira" {{ (old('dia_semana', $horario->dia_semana ?? '') == 'Quarta-feira') ? 'selected' : '' }}>Quarta-feira</option>
        <option value="Quinta-feira" {{ (old('dia_semana', $horario->dia_semana ?? '') == 'Quinta-feira') ? 'selected' : '' }}>Quinta-feira</option>
        <option value="Sexta-feira" {{ (old('dia_semana', $horario->dia_semana ?? '') == 'Sexta-feira') ? 'selected' : '' }}>Sexta-feira</option>
        <option value="Sábado" {{ (old('dia_semana', $horario->dia_semana ?? '') == 'Sábado') ? 'selected' : '' }}>Sábado</option>
        <option value="Domingo" {{ (old('dia_semana', $horario->dia_semana ?? '') == 'Domingo') ? 'selected' : '' }}>Domingo</option>
    </select>
</div>

<div class="mb-3">
    <label for="hora_inicio" class="form-label">Horário de Início</label>
    <input type="time" name="hora_inicio" id="hora_inicio" class="form-control"
        value="{{ old('hora_inicio', optional($horario->hora_inicio ?? null)->format('H:i')) }}" required>
</div>

<div class="mb-3">
    <label for="hora_fim" class="form-label">Horário de Término</label>
    <input type="time" name="hora_fim" id="hora_fim" class="form-control"
        value="{{ old('hora_fim', optional($horario->hora_fim ?? null)->format('H:i')) }}" required>
</div>

<div class="mb-3">
    <div class="form-check">
        <input type="checkbox" name="ativo" id="ativo" class="form-check-input" value="1"
            {{ old('ativo', $horario->ativo ?? true) ? 'checked' : '' }}>
        <label for="ativo" class="form-check-label">Ativo</label>
    </div>
</div>