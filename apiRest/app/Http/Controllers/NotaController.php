<?php

namespace App\Http\Controllers;

use App\Nota;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos=Nota::all();
        return  response()->json(['datos'=>$datos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request,[ 'titulo'=>'required', 'descripcion'=>'required', 'fecha'=>'required', 'prioridad'=>'required']);
            Nota::create($request->all());
            return response()->json(['success'=>'Registro creado satisfactoriamente']);
          } catch (\Throwable $th) {
            return response()->json(['error'=>'Registro  no guardado']);
          }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function show(Nota $nota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dato=Nota::find($id);
        return response()->json(['dato'=>$dato]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $this->validate($request,[ 'titulo'=>'required', 'descripcion'=>'required', 'fecha'=>'required', 'prioridad'=>'required']);
            Nota:find($id)->update($request->all());
            return response()->json(['success'=>'Registro actualizado satisfactoriamente']);
          } catch (\Throwable $th) {
            return response()->json(['error'=>'Error al actualizar el registro']);
          }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nota $nota)
    {
        try {
            Nota::find($id)->delete();
            return response()->json(['success'=>'Registro eliminado con exito']);
          } catch (\Throwable $th) {
            return response()->json(['error'=>'Error al eliminar el registro']);
          }
        
        
    }
}
