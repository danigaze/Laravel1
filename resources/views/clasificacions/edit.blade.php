@extends('layout')

@section('content')

    @if($errors->has())
        <div class="alert alert-warning" role="alert">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <h4 class="text-center">Editar Clasificación: {{ $clasificacion->clasificacion }}</h4>
    <a href="{{url('/clasificacions/index')}}" class="btn btn-lg btn-link pull-right">volver</a>
    {!! Form::model($clasificacion,[ 'method' => 'POST']) !!}

    @include('clasificacions.partials.fields')

    <button type="submit" onclick="return confirm('¿Esta seguro que desea editar esta clasificación?')" class="btn btn-success btn-block">Guardar cambios</button>

    {!! Form::close() !!}

    @include('clasificacions.partials.delete')



@endsection


