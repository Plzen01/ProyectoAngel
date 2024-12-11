@extends("layouts.plantilla")
@section('titulo', 'Detalle de Profesor')
@section('profesor')

    <p></p>
    <div class="card" style="width: 18rem;">
        <div class="card-header">
            <h3>Datos de {{$proyecto->nombre}}</h3>
        </div>
        <h6>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>ID:</strong> {{$proyecto->id}}</li>
                <li class="list-group-item"><strong>Nombre:</strong> {{$proyecto->nombre}}</li>
                <li class="list-group-item"><strong>Descripción:</strong> {{$proyecto->descripcion}}</li>
                <li class="list-group-item"><strong>Estudiante_id:</strong> {{$proyecto->estudiantes_id}}</li>
                <li class="list-group-item"><strong>Profesor_id:</strong> {{$proyecto->profesor_id}}</li>
                <li class="list-group-item"><strong>Estado:</strong> {{$proyecto->estado}}</li>
                <li class="List-group-item"><strong>timestamps:</strong> {{$proyecto->updated_at}}</li>
            </ul>
        </h6>
    </div>

    <div class="comments mt-4">
        <h4>Comentarios:</h4>
        <ul class="list-group">
            @foreach($proyecto->comentarios as $comentario)
                <li class="list-group-item">
                    <strong>{{ $comentario->usuario->nombre }}:</strong>  <!-- Asegúrate de tener una relación para el usuario si es necesario -->
                    <p>{{ $comentario->contenido }}</p>
                    <small><i>{{ $comentario->created_at->format('d/m/Y H:i') }}</i></small>
                </li>
            @endforeach
        </ul>
    </div>

@endsection
