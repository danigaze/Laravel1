@extends('layout')

@section('content')
    <div class="container">
        @if($errors->has())
            <div class="alert alert-warning" role="alert">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
            @endif </br>
            <a href="{{url('/productos/index')}}" class="btn btn-lg btn-link pull-right">volver</a>

            {!! Form::open([ 'method' => 'POST', 'novalidate']) !!}
            <div class="form-group">
                <label class="col-md-4 control-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" >
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Clasificación</label>


                {!! Form::select('clasificacion_id',$clasificacion,null,['class' => 'form-control chosen-type', 'placeholder' => 'Elija una opción...', 'required' => 'required'])
            !!}
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Seleccione una Marca</label>
                {!! Form::select('marca_id',$marcas, null,  ['class' => 'form-control chosen-type', 'placeholder' => 'Elija una opción...', 'required' => 'required']) !!}

            </div>

             <button type="submit" class="btn btn-success btn-block">Guardar</button>

      {!! Form::close() !!}
    </div>



@endsection

