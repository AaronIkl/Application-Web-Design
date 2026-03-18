@extends('layout')

@section('content')
    <div class="row mb-3">
        <div class="col-md-12">
            <a href="{{ route('subjects.create') }}" class="btn btn-success">Agregar Materia</a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Nombre de la Materia</th>
                <th width="280px">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subjects as $subject)
            <tr>
                <td>{{ $subject->id }}</td>
                <td>{{ $subject->name }}</td>
                <td>
                    <form action="{{ route('subjects.destroy', $subject->id) }}" method="POST">
                        <a class="btn btn-info btn-sm" href="{{ route('subjects.show', $subject->id) }}">Ver</a>
                        <a class="btn btn-primary btn-sm" href="{{ route('subjects.edit', $subject->id) }}">Editar</a>
                        
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar esta materia?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection