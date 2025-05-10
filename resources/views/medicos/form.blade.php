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
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome', $medico->nome ?? '') }}" required>
    </div>

    <div class="col-md-6 mb-3">
        <label for="cpf" class="form-label">CPF</label>
        <input type="text" class="form-control cpf-mask @error('cpf') is-invalid @enderror" id="cpf" name="cpf" value="{{ old('cpf', $medico->cpf ?? '') }}" placeholder="000.000.000-00" required>
        @error('cpf')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label for="genero" class="form-label">Gênero</label>
        <input type="text" class="form-control" id="genero" name="genero" value="{{ old('genero', $medico->genero ?? '') }}" required>
    </div>

    <div class="col-md-6 mb-3">
        <label for="idade" class="form-label">Idade</label>
        <input type="number" class="form-control" id="idade" name="idade" value="{{ old('idade', $medico->idade ?? '') }}" readonly required>
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label for="data_nascimento" class="form-label">Data de Nascimento</label>
        <input type="date" class="form-control @error('data_nascimento') is-invalid @enderror" id="data_nascimento" name="data_nascimento" value="{{ old('data_nascimento', optional($medico->data_nascimento ?? null)->format('Y-m-d')) }}" required onchange="calcularIdade()">
        @error('data_nascimento')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label for="telefone" class="form-label">Telefone</label>
        <input type="text" class="form-control phone-mask @error('telefone') is-invalid @enderror" id="telefone" name="telefone" value="{{ old('telefone', $medico->telefone ?? '') }}" placeholder="(00) 00000-0000" required>
        @error('telefone')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="mb-3">
    <label for="endereco" class="form-label">Endereço</label>
    <input type="text" class="form-control" id="endereco" name="endereco" value="{{ old('endereco', $medico->endereco ?? '') }}" required>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label for="matricula" class="form-label">Matrícula</label>
        <input type="text" class="form-control" id="matricula" name="matricula" value="{{ old('matricula', $medico->matricula ?? '') }}" required>
    </div>

    <div class="col-md-6 mb-3">
        <label for="data_admissao" class="form-label">Data de Admissão</label>
        <input type="date" class="form-control @error('data_admissao') is-invalid @enderror" id="data_admissao" name="data_admissao" value="{{ old('data_admissao', optional($medico->data_admissao ?? null)->format('Y-m-d')) }}" required>
        @error('data_admissao')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label for="data_demissao" class="form-label">Data de Demissão</label>
        <input type="date" class="form-control @error('data_demissao') is-invalid @enderror" id="data_demissao" name="data_demissao" value="{{ old('data_demissao', optional($medico->data_demissao ?? null)->format('Y-m-d')) }}">
        @error('data_demissao')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label for="necessidades_especiais" class="form-label">Necessidades Especiais</label>
        <select class="form-select" id="necessidades_especiais" name="necessidades_especiais">
            <option value="0" {{ old('necessidades_especiais', $medico->necessidades_especiais ?? 0) == 0 ? 'selected' : '' }}>Não</option>
            <option value="1" {{ old('necessidades_especiais', $medico->necessidades_especiais ?? 0) == 1 ? 'selected' : '' }}>Sim</option>
        </select>
    </div>
</div>

<div class="mb-3">
    <label for="especialidades" class="form-label">Especialidades</label>
    <select name="especialidades[]" id="especialidades" class="form-control" multiple required>
        @foreach($especialidades as $especialidade)
        <option value="{{ $especialidade->id }}"
            @if(isset($medico) && $medico->especialidades->contains($especialidade->id)) selected @endif>
            {{ $especialidade->nome }}
        </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" id="ativo" name="ativo" value="1" {{ old('ativo', $medico->ativo ?? true) ? 'checked' : '' }}>
        <label class="form-check-label" for="ativo">Ativo</label>
    </div>
</div>

@push('scripts')
<script>
    function calcularIdade() {
        const dataNascimento = document.getElementById('data_nascimento').value;
        if (dataNascimento) {
            const hoje = new Date();
            const nascimento = new Date(dataNascimento);
            let idade = hoje.getFullYear() - nascimento.getFullYear();
            const mesAtual = hoje.getMonth();
            const mesNascimento = nascimento.getMonth();

            if (mesAtual < mesNascimento || (mesAtual === mesNascimento && hoje.getDate() < nascimento.getDate())) {
                idade--;
            }

            document.getElementById('idade').value = idade;
        }
    }

    // Calcular idade ao carregar a página se houver data de nascimento
    document.addEventListener('DOMContentLoaded', function() {
        if (document.getElementById('data_nascimento').value) {
            calcularIdade();
        }
    });
</script>
@endpush
</div>