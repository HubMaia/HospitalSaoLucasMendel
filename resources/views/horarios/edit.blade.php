@extends('layouts.app')

@section('title', 'Editar Horário')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Editar Horário</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('horarios.update', $horario) }}" method="POST">
            @csrf
            @method('PUT')
            @include('horarios.form')
            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('horarios.index') }}" class="btn btn-secondary">
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