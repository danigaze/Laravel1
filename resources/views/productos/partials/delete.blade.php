{!! Form::open([ 'url' => '/productos/destroy', 'method' => 'POST']) !!}
<input type="hidden" name="id" value="{{ $producto->id  }}" />
<button type="submit" onclick="return confirm('¿Esta seguro que desea eliminar el producto?')" class="btn btn-danger btn-block">Eliminar</button>
{!! Form::close() !!}