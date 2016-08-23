{!! Form::open([ 'url' => '/clasificacions/destroy', 'method' => 'POST']) !!}
<input type="hidden" name="id" value="{{ $clasificacion->id  }}" />
<button type="submit" onclick="return confirm('¿Esta seguro que desea eliminar esta clasificación?')" class="btn btn-danger btn-block">Eliminar</button>
{!! Form::close() !!}