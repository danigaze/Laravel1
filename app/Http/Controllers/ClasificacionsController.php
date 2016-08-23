<?php

namespace App\Http\Controllers;

use App\Clasificacion;
use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;


use App\Marca;
use Illuminate\Support\Facades\Validator;
class ClasificacionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex(Request $request)
    {
        if( ! Auth::guest() ) {

            $clasificacion = Clasificacion::filterAndPaginate($request->get('clasificacion'));
            return view('clasificacions.index', compact('clasificacion'));

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
            return view('clasificacions.create');
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
        $clasificacion = new Clasificacion;
        $v = \Validator::make($request->all(),[
            'clasificacion' => 'required',


        ]);

        if ($v->fails()){
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $clasificacion->clasificacion  = $request->input('clasificacion');


        $clasificacion->save();

        Session::flash('messag','La Clasificación '. $clasificacion->clasificaciones .' fue creada correctamente');

        return redirect('/clasificacions/index/');
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
            $clasificacion = Clasificacion::find($id);
            return view('clasificacions.edit')->with('clasificacion',$clasificacion);
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
        $clasificacion = Clasificacion::find($id);
        $v = \Validator::make($request->all(),[
            'clasificacion'           => 'required',

        ]);

        if ($v->fails()){
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        $clasificacion->clasificacion  = $request->input('clasificacion');
        

        $clasificacion->save();
        Session::flash('messa','la clasificacion '. $clasificacion->clasificacion.' fue editada correctamente');
        return redirect('/clasificacions/index/'. $id);
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

        $clasificacion = Clasificacion::find($id);

        if( $clasificacion ) {
            $clasificacion->delete();
        }

        Session::flash('message','La clasificación '. $clasificacion->clasificacion.' fue eliminada correctamente');


        return redirect('/clasificacions/index/');
    }
}
