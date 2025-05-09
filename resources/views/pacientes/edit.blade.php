@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Paciente</h1>

    <form action="{{ route('pacientes.update', $paciente->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('pacientes.form')
        <button type="submit" class="btn btn-success">Atualizar</button>
        <a href="{{ route('pacientes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection