@extends('layout')

@section('content')
    <div class="row mb-3">
        <div class="col-md-12">
            <h4>Agregar Actividad para: {{ $subject->name }}</h4>
            <a href="{{ route('subjects.show', $subject->id) }}" class="btn btn-secondary btn-sm">Volver</a>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('activities.store') }}" method="POST">
        @csrf
        <input type="hidden" name="subject_id" value="{{ $subject->id }}">
        
        <div class="form-group">
            <label for="type">Tipo de actividad (Tarea, Examen rápido, Proyecto, etc.):</label>
            <input type="text" name="type" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="grade">Calificación (0 a 100):</label>
            <input type="number" step="0.01" name="grade" class="form-control">
        </div>
        
        <div class="form-group">
            <label for="date">Fecha:</label>
            <input type="date" name="date" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="notes">Notas (Opcional):</label>
            <textarea name="notes" class="form-control" rows="3"></textarea>
        </div>
        
        <button type="submit" class="btn btn-success">Guardar Actividad</button>
    </form>
@endsection