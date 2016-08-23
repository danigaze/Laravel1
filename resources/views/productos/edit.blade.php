@extends('layout')

@section('content')

    @if($errors->has())
        <div class="alert alert-warning" role="alert">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <h4 class="text-center">Editar Producto: {{ $producto->nombre  }}</h4>
    <a href="{{url('/productos/index')}}" class="btn btn-lg btn-link pull-right">volver</a>
    {!! Form::model($producto,[ 'method' => 'POST']) !!}

    @include('productos.partials.fields')

    <button type="submit" onclick="return confirm('¿Esta seguro que desea editar el producto?')" class="btn btn-success btn-block">Guardar cambios</button>

    {!! Form::close() !!}

    @include('productos.partials.delete')



@endsection