@extends('layout.master')

@section('content')
Vista detalle película {{ $id }}
<div class="row">
    <div class="col-sm-4">
        <img src="{{$pelicula['poster']}}" class="img-responsive" style="max-width: 100%" />
    </div>
    <div class="col-sm-8">
        <h2>{{$pelicula['title']}}</h2>
        <p><strong>Año:</strong> {{$pelicula['year']}}</p>
        <p><strong>Director:</strong> {{$pelicula['director']}}</p>
        <p><strong>Resumen:</strong> {{$pelicula['synopsis']}}</p>
        <p><strong>Estado:</strong>
            @if($pelicula['rented'])
                Película actualmente alquilada
            @else
                Película disponible
            @endif
        </p>

        @if($pelicula['rented'])
            <a class="btn btn-danger" href="#">Devolver película</a>
        @else
            <a class="btn btn-primary" href="#">Alquilar película</a>
        @endif

        <a class="btn btn-warning" href="{{ url('/catalog/edit/' . $id) }}">
            <span class="glyphicon glyphicon-pencil" area-hidden="true"></span>
            ✏️ Editar película
        </a>
        <a class="btn btn-default" href="{{ url('/catalog') }}">
            <span class="glyphicon glyphicon-chevron-left" area-hidden="true"></span>
            Volver al listado
        </a>
    </div>
</div>
@stop