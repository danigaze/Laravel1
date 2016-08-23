@extends('layout')

@section('content')

    @if(Session::has('messag'))
        <p class="alert alert-success">{{Session::get('messag')}}</p>
    @endif

    @if(Session::has('message'))
        <p class="alert alert-success">{{Session::get('message')}}</p>
    @endif
    @if(Session::has('messa'))
        <p class="alert alert-success">{{Session::get('messa')}}</p>
    @endif

    {!! Form::model(Request::all(),['url' => '/clasificacions/index/', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right','role' => 'search']) !!}
    <div class="form-group" style="float: right">

        {!! Form::text('clasificacion',null,['class' => 'form-control', 'placeholder' => 'Clasificacion']) !!}

    </div>
    <button type="submit" class="btn btn-default">Buscar</button>
    {!! Form::close() !!}

    @include('clasificacions.partials.table')
    <div class="container">
        <div class="row-fluid" style="margin-left: 300px">
            {!! $clasificacion->appends(Request::only(['clasificacion']))->render() !!}
        </div>
    </div>
@endsection