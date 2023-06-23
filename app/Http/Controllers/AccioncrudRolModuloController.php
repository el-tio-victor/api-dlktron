<?php

namespace App\Http\Controllers;

use App\Models\AccioncrudRolModulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AccioncrudRolModuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = AccioncrudRolModulo::all();
        $model->each(function($model){
            $model->roles;
        });

        return [
            "model" => AccioncrudRolModulo::with('roles')->get()
        ];
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
        $inputs = $request->all();

        $validator = Validator::make($inputs,[
            'id_rol_accion-crud_rol_modulo' => 'required',
            'id_modulo_accion-crud_rol_modulo' => 'required',
            'id_accion-crud_accion-crud_rol_modulo' => 'required',
        ]);

        if($validator->fails()){
            return [
                "status" => 400,
                'msg' =>  "error validacion datos"
            ];
        }

        $mod = AccioncrudRolModulo::create($inputs); 
        return[
            "status" => 200,
            "msg" => "Elemento credo",
            "data" => [
                "modulo" => $mod
            ]
            ];

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AccioncrudRolModulo  $accioncrudRolModulo
     * @return \Illuminate\Http\Response
     */
    public function show(AccioncrudRolModulo $accioncrudRolModulo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AccioncrudRolModulo  $accioncrudRolModulo
     * @return \Illuminate\Http\Response
     */
    public function edit(AccioncrudRolModulo $accioncrudRolModulo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AccioncrudRolModulo  $accioncrudRolModulo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AccioncrudRolModulo $accioncrudRolModulo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AccioncrudRolModulo  $accioncrudRolModulo
     * @return \Illuminate\Http\Response
     */
    public function destroy(AccioncrudRolModulo $accioncrudRolModulo)
    {
        //
    }
}
