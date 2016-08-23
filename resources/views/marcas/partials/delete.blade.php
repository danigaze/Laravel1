{!! Form::open([ 'url' => '/marcas/destroy', 'method' => 'POST']) !!}
<input type="hidden" name="id" value="{{ $marca->id  }}" />
<button type="submit" onclick="return confirm('¿Esta seguro que desea eliminar esta marca?')" class="btn btn-danger btn-block">Eliminar</button>
{!! Form::close() !!}