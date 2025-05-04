<div class="mb-3">
    <label>Nome</label>
    <input type="text" name="nome" class="form-control" value="{{ old('nome', $medico->nome ?? '') }}" required>
</div>

<div class="mb-3">
    <label>CPF</label>
    <input type="text" name="cpf" class="form-control" value="{{ old('cpf', $medico->cpf ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Gênero</label>
    <input type="text" name="genero" class="form-control" value="{{ old('genero', $medico->genero ?? '') }}">
</div>

<div class="mb-3">
    <label>Idade</label>
    <input type="number" name="idade" class="form-control" value="{{ old('idade', $medico->idade ?? '') }}">
</div>

<div class="mb-3">
    <label>Data de Nascimento</label>
    <input type="date" name="data_nascimento" class="form-control" value="{{ old('data_nascimento', optional($medico->data_nascimento ?? null)->format('Y-m-d')) }}">
</div>

<div class="mb-3">
    <label>Endereço</label>
    <input type="text" name="endereco" class="form-control" value="{{ old('endereco', $medico->endereco ?? '') }}">
</div>

<div class="mb-3">
    <label>Telefone</label>
    <input type="text" name="telefone" class="form-control" value="{{ old('telefone', $medico->telefone ?? '') }}">
</div>

<div class="mb-3">
    <label>Matrícula</label>
    <input type="text" name="matricula" class="form-control" value="{{ old('matricula', $medico->matricula ?? '') }}">
</div>

<div class="mb-3">
    <label>Data de Admissão</label>
    <input type="date" name="data_admissao" class="form-control" value="{{ old('data_admissao', optional($medico->data_admissao ?? null)->format('Y-m-d')) }}">
</div>

<div class="mb-3">
    <label>Data de Demissão</label>
    <input type="date" name="data_demissao" class="form-control" value="{{ old('data_demissao', optional($medico->data_demissao ?? null)->format('Y-m-d')) }}">
</div>

<div class="mb-3">
    <label>Necessidades Especiais</label>
    <select name="necessidades_especiais" class="form-control">
        <option value="0" {{ old('necessidades_especiais', $medico->necessidades_especiais ?? 0) == 0 ? 'selected' : '' }}>Não</option>
        <option value="1" {{ old('necessidades_especiais', $medico->necessidades_especiais ?? 0) == 1 ? 'selected' : '' }}>Sim</option>
    </select>
</div>

<div class="mb-3">
    <label>Ativo</label>
    <select name="ativo" class="form-control">
        <option value="1" {{ old('ativo', $medico->ativo ?? 1) == 1 ? 'selected' : '' }}>Sim</option>
        <option value="0" {{ old('ativo', $medico->ativo ?? 1) == 0 ? 'selected' : '' }}>Não</option>
    </select>
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