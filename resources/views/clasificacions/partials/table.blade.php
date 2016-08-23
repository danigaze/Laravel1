
<h1 class="text-primary">Control de Clasificaciones</h1>

<table class="table table-bordered table-hover"  id="MyTable" style="background: whitesmoke">
    <thead>
    <tr>
        <th class="text-center">ID</th>
        <th class="text-center">clasificacion</th>
        <th class="text-center">Fecha</th>
        <th class="text-center">Acciones</th>
        <th>

            <a title="agregar" href="{{ url('/clasificacions/create/') }}" class="btn btn-success btn-xs">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </a>
        </th>
    </tr>
    </thead>
    <tbody>
    @foreach($clasificacion as $clasificacions)
        <tr>
            <td class="text-center">{{ $clasificacions->id }}</td>
            <td class="text-center">{{ $clasificacions->clasificacion }}</td>
            <td class="text-center">{{ $clasificacions->created_at }}</td>


            <td class="text-center">

                <a title="editar" href="{{ url('/clasificacions/edit/'.$clasificacions->id) }}" class="btn btn-info btn-xs">
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                </a>
            </td>
            <td></td>


        </tr>
    @endforeach

    </tbody>
    <tfoot>
    <tr>
        <th class="text-center">ID</th>
        <th class="text-center">clasificacion</th>
        <th class="text-center">Fecha</th>
        <th class="text-center">Acciones</th>
    </tr>
    </tfoot>
</table>
