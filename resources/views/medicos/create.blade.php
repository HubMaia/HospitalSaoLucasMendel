@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Cadastrar Médico</h1>

    <form action="{{ route('medicos.store') }}" method="POST">
        @csrf
        @include('medicos.form') <!-- Aqui o formulário de especialidades será carregado -->
        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('medicos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection