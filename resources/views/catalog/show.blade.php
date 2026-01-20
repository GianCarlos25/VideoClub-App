@extends('layout.master')

@section('content')
Vista detalle película {{ $id }}
<div class="row">
    <div class="col-sm-4">
        <img src="{{$movie->poster}}" class="img-responsive" style="max-width: 100%" />
    </div>
    <div class="col-sm-8">
        <h2>{{$movie->title}}</h2>
        <p><strong>Año:</strong> {{$movie->year}}</p>
        <p><strong>Director:</strong> {{$movie->director}}</p>
        <p><strong>Resumen:</strong> {{$movie->synopsis}}</p>
        <p><strong>Estado:</strong>
            @if($movie->rented)
                Película actualmente alquilada
            @else
                Película disponible
            @endif
        </p>

        @if($movie->rented)
            <form action="{{ route('catalog.return', $movie->id) }}" method="POST" style="display:inline">
                @method('PUT')
                @csrf
                <button type="submit" class="btn btn-danger" style="display:inline">
                    Devolver película
                </button>
            </form>
        @else
            <form action="{{ route('catalog.rent', $movie->id) }}" method="POST" style="display:inline">
                @method('PUT')
                @csrf
                <button type="submit" class="btn btn-primary" style="display:inline">
                    Alquilar película
                </button>
            </form>
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