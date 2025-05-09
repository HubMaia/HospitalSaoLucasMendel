@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Cadastrar Horário</h1>

    <form action="{{ route('horarios.store') }}" method="POST">
        @csrf
        @include('horarios.form')
        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('horarios.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection