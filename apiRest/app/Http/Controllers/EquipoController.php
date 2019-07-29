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
     * FUncion para cargar los datos de un registro a editar
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function edit($Codigo)
    {
        $equipo=Equipo::where('Codigo',$Codigo)->first();
        return response()->json($equipo);
  
    }

    /**
     * Funcion par actualizar un registro.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Codigo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Codigo)
    {
        $validator = Validator::make($request->all(), [
            'Codigo' => 'required|min:1|max:10',
            'Nombre' => 'required|min:2|max:75',
            'Integrantes' => 'required|numeric',
            'Estado' => 'required'
        ]);

        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            //Si la validación pasa se procede a realizar la actualización.
            $equipo = Equipo::where('Codigo',$Codigo)->update(array(
                //'Codigo'=>$request->Codigo,
                'Nombre'=>$request->Nombre,
                'Integrantes'=>$request->Integrantes,
                'Estado'=>$request->Estado
                
            ));
            return response()->json($equipo);
        }
    }

    /**
     * Función para eliminar un registro.
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
