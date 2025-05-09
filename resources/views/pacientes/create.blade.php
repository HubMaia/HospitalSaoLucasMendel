@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Cadastrar Paciente</h1>

    <form action="{{ route('pacientes.store') }}" method="POST">
        @csrf
        @include('pacientes.form')
        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('pacientes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection