<?php

namespace App\Http\Controllers;

use App\Equipo;
use Illuminate\Http\Request;
use Response;
use Validator;

class EquipoController extends Controller
{
    /**
     * Metodo para retornar todos los registros.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipos = Equipo::all();
        return response()->json($equipos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Metodo para agregar un nuevo registro.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Codigo' => 'required|unique:equipos|min:1|max:10',
            'Nombre' => 'required|min:2|max:75',
            'Integrantes' => 'required|numeric',
            'Estado' => 'required'
        ]);

        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $equipo = new Equipo();
            $equipo->Codigo = $request->Codigo;
            $equipo->Nombre = $request->Nombre;
            $equipo->Integrantes = $request->Integrantes;
            $equipo->Estado = $request->Estado;
            $equipo->save();
            return response()->json($equipo);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function show(Equipo $equipo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipo $equipo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipo $equipo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function destroy($Codigo)
    {

        $equipo=Equipo::where('Codigo',$Codigo)->delete();
        return response()->json($equipo);
  

    }
}
