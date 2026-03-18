@extends('layout')

@section('content')
    <div class="row mb-3">
        <div class="col-md-12">
            <h4>Agregar Nueva Materia</h4>
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

    <form action="{{ route('subjects.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nombre de la materia:</label>
            <input type="text" name="name" class="form-control" placeholder="Ej. Diseño de aplicaciones web">
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
@endsection