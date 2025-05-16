@if ($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="row">
    <div class="col-md-6 mb-3">
        <label for="paciente_id" class="form-label">Paciente</label>
        <select class="form-select @error('paciente_id') is-invalid @enderror" id="paciente_id" name="paciente_id" required>
            <option value="">Selecione um paciente</option>
            @foreach($pacientes as $paciente)
            <option value="{{ $paciente->id }}" {{ old('paciente_id', $consulta->paciente_id ?? '') == $paciente->id ? 'selected' : '' }}>
                {{ $paciente->nome }}
            </option>
            @endforeach
        </select>
        @error('paciente_id')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label for="medico_id" class="form-label">Médico</label>
        <select class="form-select @error('medico_id') is-invalid @enderror" id="medico_id" name="medico_id" required>
            <option value="">Selecione um médico</option>
            @foreach($medicos as $medico)
            <option value="{{ $medico->id }}" {{ old('medico_id', $consulta->medico_id ?? '') == $medico->id ? 'selected' : '' }}>
                {{ $medico->nome }}
            </option>
            @endforeach
        </select>
        @error('medico_id')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label for="especialidade_id" class="form-label">Especialidade</label>
        <select class="form-select @error('especialidade_id') is-invalid @enderror" id="especialidade_id" name="especialidade_id" required disabled>
            <option value="">Selecione primeiro um médico</option>
        </select>
        @error('especialidade_id')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label for="data" class="form-label">Data da Consulta</label>
        <input type="date" class="form-control @error('data') is-invalid @enderror" id="data" name="data" value="{{ old('data', optional($consulta->data ?? null)->format('Y-m-d')) }}" required>
        @error('data')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label for="hora" class="form-label">Horário da Consulta</label>
        <input type="time" class="form-control time-mask @error('hora') is-invalid @enderror" id="hora" name="hora" value="{{ old('hora', optional($consulta->hora ?? null)->format('H:i')) }}" required>
        @error('hora')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label for="status" class="form-label">Status</label>
        <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
            <option value="agendada" {{ old('status', $consulta->status ?? '') == 'agendada' ? 'selected' : '' }}>Agendada</option>
            <option value="realizada" {{ old('status', $consulta->status ?? '') == 'realizada' ? 'selected' : '' }}>Realizada</option>
            <option value="cancelada" {{ old('status', $consulta->status ?? '') == 'cancelada' ? 'selected' : '' }}>Cancelada</option>
        </select>
        @error('status')
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
        const medicosEspecialidades = @json($medicos - > mapWithKeys(function($medico) {
            return [$medico - > id => $medico - > especialidades - > pluck('id', 'nome')];
        }));

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