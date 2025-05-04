@extends('layouts.app')

@section('content')
<h2>Editar Especialidade</h2>

<form action="{{ route('especialidades.update', $especialidade) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" name="nome" id="nome" class="form-control" value="{{ $especialidade->nome }}" required>
    </div>

    <div class="mb-3">
        <label for="descricao" class="form-label">Descrição</label>
        <textarea name="descricao" id="descricao" class="form-control" rows="3">{{ $especialidade->descricao }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Atualizar</button>
    <a href="{{ route('especialidades.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection