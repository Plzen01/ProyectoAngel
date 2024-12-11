@extends('layouts.plantilla')
@section('titulo', 'Proyectos')
@section('profesor')

    <h1>Proyectos
        <a class="btn btn-primary" href="{{ route('profesor.create') }}" style="margin-left: 45rem;">Crear Proyecto</a>
    </h1>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripción</th>
            <th scope="col">Estudiante ID</th>
            <th scope="col">Profesor ID</th>
            <th scope="col">Estado</th>
            <th scope="col">Timestamps</th>
            <th scope="col">Calificación</th>
            <th scope="col">Progreso</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($proyectos as $proyecto)
            <tr>
                <td>{{ $proyecto->id }}</td>
                <td>{{ $proyecto->nombre }}</td>
                <td>{{ $proyecto->descripcion }}</td>
                <td>{{ $proyecto->estudiante_id }}</td>
                <td>{{ $proyecto->profesor_id }}</td>
                <td>{{ $proyecto->estado }}</td>
                <td>{{ $proyecto->timestamps }}</td>

                <!-- Calificación -->
                <td>
                    <form method="POST" action="{{ route('profesor.index', ['id' => $proyecto->id]) }}">
                        @csrf
                        <input type="number" name="calificacion" min="0" max="10" step="0.1"
                               value="{{ old('calificacion', $proyecto->calificacion) }}" class="form-control"
                               style="width: 80px;">
                        <button type="submit" class="btn btn-info btn-sm mt-2">Guardar Calificación</button>
                    </form>
                </td>

                <!-- Barra de progreso -->
                <td>
                    <form method="POST" action="{{ route('profesor.index', ['id' => $proyecto->id]) }}">
                        @csrf
                        <input type="number" name="progreso" min="0" max="100" step="1"
                               value="{{ old('progreso', $proyecto->progreso) }}" class="form-control"
                               style="width: 80px;">
                        <button type="submit" class="btn btn-info btn-sm mt-2">Actualizar Progreso</button>
                    </form>
                    <div class="progress mt-2">
                        <div class="progress-bar" role="progressbar" style="width: {{ $proyecto->progreso ?? 0 }}%"
                             aria-valuenow="{{ $proyecto->progreso ?? 0 }}" aria-valuemin="0" aria-valuemax="100">
                            {{ $proyecto->progreso ?? 0 }}%
                        </div>
                    </div>
                </td>

                <td>
                    <a href="{{ route('profesor.show', ['id' => $proyecto->id]) }}" class="btn btn-success btn-sm">Detalles</a>
                    <a href="{{ route('profesor.edit', ['id' => $proyecto->id]) }}" class="btn btn-warning btn-sm">Editar</a>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                            data-bs-target="#modalEliminar{{$proyecto->id}}">
                        Eliminar
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="modalEliminar{{$proyecto->id}}" tabindex="-1"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                                        Eliminar {{$proyecto->nombre}}</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ¿Quiere eliminar el proyecto {{$proyecto->nombre}}?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar
                                    </button>
                                    <form method="POST" action="{{ route('profesor.delete', ['id' => $proyecto->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="Eliminar" class="btn btn-danger">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </td>

            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
