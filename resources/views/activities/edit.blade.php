@extends('layout')

@section('content')
    <div class="row mb-3">
        <div class="col-md-12">
            <h4>Editar Actividad</h4>
            <a href="{{ route('subjects.show', $activity->subject_id) }}" class="btn btn-secondary btn-sm">Volver</a>
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

    <form action="{{ route('activities.update', $activity->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="type">Tipo de actividad:</label>
            <input type="text" name="type" class="form-control" value="{{ $activity->type }}" required>
        </div>
        
        <div class="form-group">
            <label for="grade">Calificación:</label>
            <input type="number" step="0.01" name="grade" class="form-control" value="{{ $activity->grade }}">
        </div>
        
        <div class="form-group">
            <label for="date">Fecha:</label>
            <input type="date" name="date" class="form-control" value="{{ $activity->date }}" required>
        </div>
        
        <div class="form-group">
            <label for="notes">Notas (Opcional):</label>
            <textarea name="notes" class="form-control" rows="3">{{ $activity->notes }}</textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Actualizar Actividad</button>
    </form>
@endsection