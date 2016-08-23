<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
class Producto extends Model
{
    protected $table = 'productos';
    protected $fillable = ['nombre', 'clasificacion_id', 'marca_id'];

    public function scopeNombre($query, $nombre)
    {

        if (trim($nombre) != "") {

            $query->where('nombre', "LIKE", "%$nombre%");

        }


    }

    public function scopeMarca($query, $marca)
    {
        

        $marcas = Marca::lists('marca','id');

        if ($marca != "" && isset($marcas[$marca])) {
            $query
                ->where('marca_id', $marca)
                ->orderBy('marca_id', 'ASC');
        }
    }

    public static function filterAndPaginate($nombre, $marca)
    {


        $row = self::join('marcas', 'marcas.id', '=', 'productos.marca_id')
            ->join('clasificaciones', 'clasificaciones.id', '=', 'productos.clasificacion_id')
            ->orderBy('productos.updated_at', 'DESC')
            ->nombre($nombre)
            ->marca($marca)
            ->paginate(15, ['productos.*', 'marcas.marca', 'clasificaciones.clasificacion']);

        return $row;


    }

    public function alphMarcas()
    {
    }
    
}