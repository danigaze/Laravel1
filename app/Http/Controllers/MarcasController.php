<?php

namespace App\Http\Controllers;

use App\Marca;
use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class MarcasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex(Request $request)
    {
        if( ! Auth::guest() ) {

            $marca = Marca::filterAndPaginate($request->get('marca'));
            return view('marcas.index', compact('marca'));
            

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
            return view('marcas.create');
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
        $marca = new Marca();
        $v = \Validator::make($request->all(),[
            'marca'         => 'required'

        ]);

        if ($v->fails()){
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        $marca->marca = $request->input('marca');

        $marca->save();

        Session::flash('messag','La marca '. $marca->marca.' fue creada correctamente');

        return redirect('/marcas/index/');
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
            $marca = Marca::find($id);
            return view('marcas.edit')->with('marca',$marca);
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
        $marca = Marca::find($id);
        $v = \Validator::make($request->all(),[
            'marca'           => 'required',

        ]);

        if ($v->fails()){
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        $marca->marca  = $request->input('marca');

        $marca->save();
        Session::flash('messa','la marca '. $marca->marca.' fue editada correctamente');
        return redirect('/marcas/index/'. $id);
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

        $marca = Marca::find($id);

        if( $marca ) {
            $marca->delete();
        }

        Session::flash('message','La marca '. $marca->marca.' fue eliminado');


        return redirect('/marcas/index/');
    }
}
