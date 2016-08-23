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

            {!! Form::open([ 'method' => 'POST', 'novalidate']) !!}

            <div class="form-group">
                <label class="col-md-4 control-label">Marcas</label>
                <input type="text" class="form-control" name="marca" value="{{ old('marca') }}" >
            </div>



            <button type="submit" class="btn btn-success btn-block">Guardar</button>

            {!! Form::close() !!}
    </div>
@endsection