@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Consulta</h1>

    <form action="{{ route('consultas.update', $consulta->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('consultas.form')
        <button type="submit" class="btn btn-success">Atualizar</button>
        <a href="{{ route('consultas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection