<?php
namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;

use Auth;
use App\Marca;
use App\Clasificacion;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex(Request $request)
    {
        if( ! Auth::guest() ) {
            $productos = Producto::filterAndPaginate($request->get('nombre'), $request->get('marca_id'));
            $marcas = Marca::lists('marca','id');
            return view('productos.index')
                ->with('productos', $productos)
                ->with('marcas', $marcas);

        }else {

            return redirect('login');
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {
        if( ! Auth::guest() ) {
            
            $marcas = Marca::lists('marca','id');
            $clasificacion = Clasificacion::lists('clasificacion','id');

            return view('productos.create') 
                ->with('marcas', $marcas)
                ->with('clasificacion', $clasificacion);
        }else {

            return redirect('login');
        }
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postCreate(Request $request)
    {

        $producto = new Producto;
        $v = \Validator::make($request->all(),[
            'nombre'           => 'required',
            'clasificacion_id' => 'required',
            'marca_id'         => 'required'

        ]);

        if ($v->fails()){
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        $producto->nombre = $request->input('nombre');
        $producto->clasificacion_id  = $request->input('clasificacion_id');
        $producto->marca_id = $request->input('marca_id');
        
        $producto->save();

        Session::flash('messag','El producto '. $producto->nombre.' fue creado correctamente');

        return redirect('/productos/index/');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getEdit($id)
    {
        if( ! Auth::guest() ) {
            
            $producto = Producto::find($id);
            
            $marcas = Marca::lists('marca','id');
            $clasificacion = Clasificacion::lists('clasificacion','id');
            
            return view('productos.edit')
                ->with('producto',$producto)
                ->with('marcas', $marcas)
                ->with('clasificacion', $clasificacion);
        }else {

            return redirect('login');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postEdit(Request $request, $id)
    {
        $producto = Producto::find($id);
        $v = \Validator::make($request->all(),[
            'nombre'           => 'required',

        ]);

        if ($v->fails()){
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        $producto->nombre = $request->input('nombre');
        $producto->clasificacion_id  = $request->input('clasificacion_id');
        $producto->marca_id  = $request->input('marca_id');


        $producto->save();
        Session::flash('messa','El producto '. $producto->nombre.' fue editado correctamente');
        return redirect('/productos/index/'. $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postDestroy(Request $request)
    {
        $id = $request->input('id');

        $producto = Producto::find($id);

        if( $producto ) {
            $producto->delete();
        }

        Session::flash('message','El producto '. $producto->nombre.' fue eliminado');


        return redirect('/productos/index/');
    }
}