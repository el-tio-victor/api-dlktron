<?php

namespace App\Http\Controllers;

use App\Models\Modulos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ModulosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * >
     */
    public function index()
    {
        $modulos = Modulos::all();
        return response()->json([
            "status" => 200,
            "data" => [
                "modulos" => $modulos
            ]
        ]);
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $inputs = $request->all();
        $validator = Validator::make($inputs,[
            "nombre_modulo" => "required"
        ]);

        if($validator->fails()){
            return response()->json([
                "status" => 400,
                "msg" => "Error validacion request"
            ]);
        }

        $model = Modulos::create($inputs);

        return  response()->json([
            "status" => 200,
            "modulo" => $model
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Modulos  $modulos
     * @return \Illuminate\Http\Response
     */
    public function show(Modulos $modulos)
    {
        //
        return [
            "status" => 200,
            "data"=>[
                "modulo" => $modulos
            ]
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Modulos  $modulos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Modulos $modulos)
    {
        //
        $inputs = $request->all();

        $validate = Validator::make($inputs,[
            "nombre_modulo" => "required|min:2"
        ]);

        if($validate->fails()){
            return[
                "status" => 400,
                "msg" => "Error en validacion de datos"
            ];
        }

        $modulos->nombre_modulo = $inputs["nombre_modulo"];

        return [
            "status" => 200,
            "msg" => "item editado"
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Modulos  $modulos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modulos $modulos)
    {
        //
        $modulos->delete();
        return [
            "status"=> 200,
            "msg" => "Item eliminado."
        ];
    }
}
