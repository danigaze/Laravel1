
<div class="form-group">
    {!! form::label('marcas', 'marcas', ['for' => 'marcas'] ) !!}
    {!! form::text('marca', $marca->marca  , ['class' => 'form-control', 'id' => 'marca', 'placeholder' => 'escribe una marca..']  ) !!}
</div>