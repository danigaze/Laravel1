<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Clasificacion extends Model
{
    protected $table = 'clasificaciones';
    protected $fillable = ['clasificacion'];

    public function scopeClasificacion($query, $clasificacion)
    {

        if (trim($clasificacion) != "") {

            $query->where('clasificacion', "LIKE", "%$clasificacion%");

        }


    }



    public static function filterAndPaginate($clasificacion){

        return Clasificacion::clasificacion($clasificacion)
            ->orderBy('updated_at','DESC')
            ->paginate(15);

    }

  


}