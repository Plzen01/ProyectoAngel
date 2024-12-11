@extends('layouts.plantilla')

@section('titulo', 'Archivos del Proyecto')

@section('profesor')
    <h3>Archivos del Proyecto</h3>


    <form action="{{ route('archivos.store', $id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="archivo" class="form-label">Cargar archivo</label>
            <input type="file" class="form-control" name="archivo" id="archivo" required>
        </div>
        <button type="submit" class="btn btn-primary">Cargar archivo</button>
    </form>

    <hr>


    <h4>Archivos cargados:</h4>
    @if($archivos->isEmpty())
        <p>No hay archivos cargados aún.</p>
    @else
        <ul class="list-group">
            @foreach($archivos as $archivo)
                <li class="list-group-item">
                    <strong>{{ $archivo->nombre }}</strong>
                    <a href="{{ route('archivos.download', $archivo->id) }}" class="btn btn-sm btn-success float-end">Descargar</a>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
