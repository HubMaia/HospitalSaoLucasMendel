@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Agendar Consulta</h1>

    <form action="{{ route('consultas.store') }}" method="POST">
        @csrf
        @include('consultas.form')
        <button type="submit" class="btn btn-success">Agendar</button>
        <a href="{{ route('consultas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection