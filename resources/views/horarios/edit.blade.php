@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Horário</h1>

    <form action="{{ route('horarios.update', $horario->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('horarios.form')
        <button type="submit" class="btn btn-success">Atualizar</button>
        <a href="{{ route('horarios.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection