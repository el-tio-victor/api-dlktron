<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AccionesCrud;
use Illuminate\Support\Facades\Validator; 

class AccionesCrudController extends Controller
{
    public function index(){
        return response()->json([
            "status"=> 200,
            "data" => ["acciones" => AccionesCrud::All()]
        ]) ;
    }

    public function store( Request $request){
        $input = $request->all();

        $validator = Validator::make($input,[
            'nombre_accion-crud' => 'required'
        ]);

        if($validator->fails()){
            return response()->json([
                "status"=> 400,
                "msg" => 'Error en validacion de datos'
            ]) ;
        }

        $model = AccionesCrud::create($input);

        return response()->json([
            "status"=> 200,
            "data" => [
                "accion" => $model
            ]
        ]) ;

    }

    public function update(Request $request, AccionesCrud $accion){
        $input = $request->all();

        $validator = Validator::make($input, [
            "nombre_accionCrud" => "required"
        ]);

        if($validator->fails()){
            return  $this->sendError('Errors...',$validator->errors());
        }

        $accion->nombre_accionCrud = $input['nombre_accionCrud'];
    }

    public function destroy(AccionesCrud $accion){
        $accion->delete();
        return response()->json([
            "status"=> 200,
            "msg" => 'Item eliminado.'
        ]) ;

    }
}
