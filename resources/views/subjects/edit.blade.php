@extends('layout')

@section('content')
    <div class="row mb-3">
        <div class="col-md-12">
            <h4>Editar Materia</h4>
            <a href="{{ route('subjects.index') }}" class="btn btn-secondary btn-sm">Volver</a>
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

    <form action="{{ route('subjects.update', $subject->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nombre de la materia:</label>
            <input type="text" name="name" class="form-control" value="{{ $subject->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
@endsection