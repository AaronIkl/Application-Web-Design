@extends('layout')

@section('content')
    <div class="row mb-3">
        <div class="col-md-12">
            <h2>Materia: {{ $subject->name }}</h2>
            <a href="{{ route('subjects.index') }}" class="btn btn-secondary mt-2 mb-3">Volver a Materias</a>
            
            <a href="{{ route('activities.create', ['subject_id' => $subject->id]) }}" class="btn btn-success mt-2 mb-3 ml-2">Agregar Actividad</a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h4 class="mb-3">Actividades Evaluables</h4>
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Tipo</th>
                <th>Calificación</th>
                <th>Fecha</th>
                <th>Notas</th>
                <th width="150px">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($subject->activities as $activity)
            <tr>
                <td>{{ $activity->type }}</td>
                <td>{{ $activity->grade ?? 'Sin calificar' }}</td>
                <td>{{ $activity->date }}</td>
                <td>{{ $activity->notes }}</td>
                <td>
                    <form action="{{ route('activities.destroy', $activity->id) }}" method="POST">
                        <a class="btn btn-primary btn-sm" href="{{ route('activities.edit', $activity->id) }}">Editar</a>
                        
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar esta actividad?')">Borrar</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">No hay actividades registradas aún para esta materia.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
@endsection