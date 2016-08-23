<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $table = 'marcas';
    protected $fillable = ['marca'];

    public function scopeMarca($query, $marca)
    {

        if (trim($marca) != "") {

            $query->where('marca', "LIKE", "%$marca%");

        }


    }



    public static function filterAndPaginate($marca){

        return Marca::marca($marca)
            ->orderBy('updated_at','DESC')
            ->paginate(15);

    }

    public  function scopeFilter($marca){

        return Marca::marca($marca)
            ->orderBy('marcas','ASC')
            ->get();

    }


}