
    <div class="form-group">
        {!! form::label('nombre', 'nombre', ['for' => 'nombre'] ) !!}
        {!! form::text('nombre', $producto->nombre  , ['class' => 'form-control', 'id' => 'nombre', 'placeholder' => 'escribe el nombre del producto...']  ) !!}
    </div>

    <div class="form-group">
        {!! form::label('clasificacion', 'clasificacion', ['for' => 'clasificacion'] ) !!}
        {!! Form::select('clasificacion_id', $clasificacion, $producto->clasificacion_id, ['class' => 'form-control', 'required' => 'required'])
      !!}
    </div>
    <div class="form-group">
        {!! form::label('marca', 'marca', ['for' => 'marca'] ) !!}

        {!! Form::select('marca_id', $marcas, $producto->marca_id, ['class' => 'form-control', 'required' => 'required']) !!}
    </div>

