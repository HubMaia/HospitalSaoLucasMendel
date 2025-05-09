@extends('layouts.app')

@section('title', 'Nova Consulta')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Nova Consulta</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('consultas.store') }}" method="POST">
            @csrf
            @include('consultas.form')
            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('consultas.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Cancelar
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Salvar
                </button>
            </div>
        </form>
    </div>
</div>
@endsection