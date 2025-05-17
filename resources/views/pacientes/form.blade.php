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
        <input type="text" class="form-control @error('nome') is-invalid @enderror" id="nome" name="nome" value="{{ old('nome', $paciente->nome ?? '') }}" required>
        @error('nome')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label for="cpf" class="form-label">CPF</label>
        <input type="text" class="form-control cpf-mask @error('cpf') is-invalid @enderror" id="cpf" name="cpf" value="{{ old('cpf', $paciente->cpf ?? '') }}" placeholder="000.000.000-00" required>
        @error('cpf')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label for="telefone" class="form-label">Telefone</label>
        <input type="text" class="form-control phone-mask @error('telefone') is-invalid @enderror" id="telefone" name="telefone" value="{{ old('telefone', $paciente->telefone ?? '') }}" placeholder="(00) 00000-0000" required>
        @error('telefone')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label for="data_nascimento" class="form-label">Data de Nascimento</label>
        <input type="date" class="form-control @error('data_nascimento') is-invalid @enderror" id="data_nascimento" name="data_nascimento" value="{{ old('data_nascimento', optional($paciente->data_nascimento ?? null)->format('Y-m-d')) }}" required>
        @error('data_nascimento')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label for="genero" class="form-label">Gênero</label>
        <select class="form-select @error('genero') is-invalid @enderror" id="genero" name="genero" required>
            <option value="">Selecione o gênero</option>
            <option value="Masculino" {{ old('genero', $paciente->genero ?? '') == 'Masculino' ? 'selected' : '' }}>Masculino</option>
            <option value="Feminino" {{ old('genero', $paciente->genero ?? '') == 'Feminino' ? 'selected' : '' }}>Feminino</option>
            <option value="Outro" {{ old('genero', $paciente->genero ?? '') == 'Outro' ? 'selected' : '' }}>Outro</option>
        </select>
        @error('genero')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label for="tipo_sanguineo" class="form-label">Tipo Sanguíneo</label>
        <select class="form-select @error('tipo_sanguineo') is-invalid @enderror" id="tipo_sanguineo" name="tipo_sanguineo" required>
            <option value="">Selecione o tipo sanguíneo</option>
            <option value="A+" {{ old('tipo_sanguineo', $paciente->tipo_sanguineo ?? '') == 'A+' ? 'selected' : '' }}>A+</option>
            <option value="A-" {{ old('tipo_sanguineo', $paciente->tipo_sanguineo ?? '') == 'A-' ? 'selected' : '' }}>A-</option>
            <option value="B+" {{ old('tipo_sanguineo', $paciente->tipo_sanguineo ?? '') == 'B+' ? 'selected' : '' }}>B+</option>
            <option value="B-" {{ old('tipo_sanguineo', $paciente->tipo_sanguineo ?? '') == 'B-' ? 'selected' : '' }}>B-</option>
            <option value="AB+" {{ old('tipo_sanguineo', $paciente->tipo_sanguineo ?? '') == 'AB+' ? 'selected' : '' }}>AB+</option>
            <option value="AB-" {{ old('tipo_sanguineo', $paciente->tipo_sanguineo ?? '') == 'AB-' ? 'selected' : '' }}>AB-</option>
            <option value="O+" {{ old('tipo_sanguineo', $paciente->tipo_sanguineo ?? '') == 'O+' ? 'selected' : '' }}>O+</option>
            <option value="O-" {{ old('tipo_sanguineo', $paciente->tipo_sanguineo ?? '') == 'O-' ? 'selected' : '' }}>O-</option>
        </select>
        @error('tipo_sanguineo')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="mb-3">
    <label for="endereco" class="form-label">Endereço</label>
    <input type="text" class="form-control @error('endereco') is-invalid @enderror" id="endereco" name="endereco" value="{{ old('endereco', $paciente->endereco ?? '') }}" required>
    @error('endereco')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" id="status_cadastro" name="status_cadastro" value="1" {{ old('status_cadastro', $paciente->status_cadastro ?? true) ? 'checked' : '' }}>
        <label class="form-check-label" for="status_cadastro">Ativo</label>
    </div>
</div>