@extends('layouts.app')

@section('title', 'Editar Especialidade')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Editar Especialidade</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('especialidades.update', $especialidade) }}" method="POST">
            @csrf
            @method('PUT')
            @include('especialidades.form')
            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('especialidades.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Cancelar
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Atualizar
                </button>
            </div>
        </form>
    </div>
</div>
@endsection