@if ($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="mb-3">
    <label for="medico_id" class="form-label">Médico</label>
    <select class="form-select @error('medico_id') is-invalid @enderror" id="medico_id" name="medico_id" required>
        <option value="">Selecione um médico</option>
        @foreach($medicos as $medico)
        <option value="{{ $medico->id }}" {{ old('medico_id', $horario->medico_id ?? '') == $medico->id ? 'selected' : '' }}>
            {{ $medico->nome }}
        </option>
        @endforeach
    </select>
    @error('medico_id')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="especialidade_id" class="form-label">Especialidade</label>
    <select class="form-select @error('especialidade_id') is-invalid @enderror" id="especialidade_id" name="especialidade_id" required disabled>
        <option value="">Selecione primeiro um médico</option>
    </select>
    @error('especialidade_id')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="dia_semana" class="form-label">Dia da Semana</label>
    <select class="form-select @error('dia_semana') is-invalid @enderror" id="dia_semana" name="dia_semana" required>
        <option value="">Selecione um dia</option>
        <option value="Segunda-feira" {{ old('dia_semana', $horario->dia_semana ?? '') == 'Segunda-feira' ? 'selected' : '' }}>Segunda-feira</option>
        <option value="Terça-feira" {{ old('dia_semana', $horario->dia_semana ?? '') == 'Terça-feira' ? 'selected' : '' }}>Terça-feira</option>
        <option value="Quarta-feira" {{ old('dia_semana', $horario->dia_semana ?? '') == 'Quarta-feira' ? 'selected' : '' }}>Quarta-feira</option>
        <option value="Quinta-feira" {{ old('dia_semana', $horario->dia_semana ?? '') == 'Quinta-feira' ? 'selected' : '' }}>Quinta-feira</option>
        <option value="Sexta-feira" {{ old('dia_semana', $horario->dia_semana ?? '') == 'Sexta-feira' ? 'selected' : '' }}>Sexta-feira</option>
        <option value="Sábado" {{ old('dia_semana', $horario->dia_semana ?? '') == 'Sábado' ? 'selected' : '' }}>Sábado</option>
        <option value="Domingo" {{ old('dia_semana', $horario->dia_semana ?? '') == 'Domingo' ? 'selected' : '' }}>Domingo</option>
    </select>
    @error('dia_semana')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="hora_inicio" class="form-label">Horário de Início</label>
    <input type="time" class="form-control time-mask @error('hora_inicio') is-invalid @enderror" id="hora_inicio" name="hora_inicio" value="{{ old('hora_inicio', $horario->hora_inicio ?? '') }}" required>
    @error('hora_inicio')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="hora_fim" class="form-label">Horário de Término</label>
    <input type="time" class="form-control time-mask @error('hora_fim') is-invalid @enderror" id="hora_fim" name="hora_fim" value="{{ old('hora_fim', $horario->hora_fim ?? '') }}" required>
    @error('hora_fim')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <div class="form-check">
        <input type="checkbox" class="form-check-input @error('ativo') is-invalid @enderror" id="ativo" name="ativo" value="1" {{ old('ativo', $horario->ativo ?? true) ? 'checked' : '' }}>
        <label class="form-check-label" for="ativo">Ativo</label>
        @error('ativo')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const medicoSelect = document.getElementById('medico_id');
        const especialidadeSelect = document.getElementById('especialidade_id');

        // Armazenar as especialidades de cada médico
        const medicosEspecialidades = @json($medicosEspecialidades);

        function atualizarEspecialidades() {
            const medicoId = medicoSelect.value;
            especialidadeSelect.innerHTML = '<option value="">Selecione uma especialidade</option>';

            if (medicoId) {
                const especialidades = medicosEspecialidades[medicoId];
                if (especialidades) {
                    Object.entries(especialidades).forEach(([nome, id]) => {
                        const option = document.createElement('option');
                        option.value = id;
                        option.textContent = nome;
                        especialidadeSelect.appendChild(option);
                    });
                    especialidadeSelect.disabled = false;
                }
            } else {
                especialidadeSelect.disabled = true;
            }
        }

        medicoSelect.addEventListener('change', atualizarEspecialidades);

        // Inicializar especialidades se um médico já estiver selecionado
        if (medicoSelect.value) {
            atualizarEspecialidades();
        }
    });
</script>
@endpush