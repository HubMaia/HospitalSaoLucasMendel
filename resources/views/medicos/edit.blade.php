@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Médico</h1>

    <form action="{{ route('medicos.update', $medico->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('medicos.form', ['medico' => $medico])
        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('medicos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection