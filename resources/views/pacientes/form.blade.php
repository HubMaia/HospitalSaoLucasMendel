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
    <label for="nome" class="form-label">Nome</label>
    <input type="text" name="nome" id="nome" class="form-control"
        value="{{ old('nome', $paciente->nome ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="cpf" class="form-label">CPF</label>
    <input type="text" name="cpf" id="cpf" class="form-control"
        value="{{ old('cpf', $paciente->cpf ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="telefone" class="form-label">Telefone</label>
    <input type="text" name="telefone" id="telefone" class="form-control"
        value="{{ old('telefone', $paciente->telefone ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="endereco" class="form-label">Endereço</label>
    <input type="text" name="endereco" id="endereco" class="form-control"
        value="{{ old('endereco', $paciente->endereco ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="data_nascimento" class="form-label">Data de Nascimento</label>
    <input type="date" name="data_nascimento" id="data_nascimento" class="form-control"
        value="{{ old('data_nascimento', optional($paciente->data_nascimento ?? null)->format('Y-m-d')) }}" required>
</div>

<div class="mb-3">
    <div class="form-check">
        <input type="checkbox" name="status_cadastro" id="status_cadastro" class="form-check-input" value="1"
            {{ old('status_cadastro', $paciente->status_cadastro ?? true) ? 'checked' : '' }}>
        <label for="status_cadastro" class="form-check-label">Cadastro Ativo</label>
    </div>
</div>