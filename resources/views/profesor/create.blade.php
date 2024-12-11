@extends("layouts.plantilla")
@section('titulo', 'Crear')
@section('profesor')


    <form method="post" action="{{ route('profesor.store') }}">
        @csrf
        @if(isset($proyecto))
            @method('put')
        @endif
        <div class="row g-3">
            <div class="col-md-5">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre" value="{{ isset($proyecto) ? $proyecto->nombre : old('nombre') }}">
                    <label for="nombre">Nombre</label>
                </div>
            </div>

            <div class="col-md-7">
                <div class="form-floating">
                    <input type="text" class="form-control" id="descripcion" placeholder="descripcion" name="descripcion" value="{{ isset($proyecto) ? $proyecto->descripcion : old('descripcion') }}">
                    <label for="descripcion">Descripción</label>
                </div>
            </div>
        </div>

        <div class="row g-3">
            <div class="col">
                <div class="form-floating">
                    <input type="integer" class="form-control" id="estudiante_id" placeholder="Estudiante_id" name="estudiante_id" value="{{ isset($proyecto) ? $proyecto->estudiante_id : old('estudiante_id') }}">
                    <label for="estado">Estudiante_id</label>
                </div>
            </div>
        </div>

        <div class="row g-3">
            <div class="col">
                <div class="form-floating">
                    <input type="integer" class="form-control" id="profesor_id" placeholder="Profesor_id" name="profesor_id" value="{{ isset($proyecto) ? $proyecto->profesor_id : old('profesor_id') }}">
                    <label for="estado">Profesor_id</label>
                </div>
            </div>
        </div>

        <div class="row g-3">
            <div class="col">
                <div class="form-floating">
                    <input type="text" class="form-control" id="estado" placeholder="Estado" name="estado" value="{{ isset($proyecto) ? $proyecto->estado : old('estado') }}">
                    <label for="estado">Estado</label>
                </div>
            </div>
        </div>



        <input class="btn btn-primary" type="submit" value="Guardar">
    </form>




@endsection
