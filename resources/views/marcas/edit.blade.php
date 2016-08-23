@extends('layout')

@section('content')

    @if($errors->has())
        <div class="alert alert-warning" role="alert">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <h4 class="text-center">Editar Marcas: {{ $marca->marca }}</h4>
    <a href="{{url('/marcas/index')}}" class="btn btn-lg btn-link pull-right">volver</a>
    {!! Form::model($marca,[ 'method' => 'POST']) !!}

    @include('marcas.partials.fields')

    <button type="submit" onclick="return confirm('¿Esta seguro que desea editar esta marca?')" class="btn btn-success btn-block">Guardar cambios</button>

    {!! Form::close() !!}

    @include('marcas.partials.delete')



@endsection