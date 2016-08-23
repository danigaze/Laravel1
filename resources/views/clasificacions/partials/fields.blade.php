
<div class="form-group">
    {!! form::label('clasificaciones', 'clasificaciones', ['for' => 'clasificaciones'] ) !!}
    {!! form::text('clasificacion', $clasificacion->clasificacion  , ['class' => 'form-control', 'id' => 'clasificacion', 'placeholder' => 'escribe una clasificacion..']  ) !!}
</div>
