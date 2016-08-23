@extends('layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-">
                    <div class="panel-heading">
                        <h1 style="text-align: center">Bienvenid@ {{ Auth::user()->name  }}</h1>
                        <a href="{{url('/productos/index')}}" class="btn btn-lg btn-link ">Productos</a>
                        <a href="{{url('/clasificacions/index')}}" class="btn btn-lg btn-link ">Clasificaciones</a>
                        <a href="{{url('/marcas/index')}}" class="btn btn-lg btn-link ">Marcas</a>

                    </div>
                            </div>
                    </div>
            </div>
        </div>
    </div>
@endsection

