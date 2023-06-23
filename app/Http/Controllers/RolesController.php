<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Roles::find(1);
        $roles->each(function($rol){
            $rol->acciones;
        });
        //dd( $roles->get());
        return [
            'status' => 200,
            "data" => [
                "roles" => Roles::with('acciones')->get()
            ]
        ];
        
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
        $inputs = $request->all();
        $validator = Validator::make($inputs, [
            "nombre_rol" => 'required|min:3'
        ]);

        if($validator->fails()){
            return [
                "status" => 400,
                "msg" => "Error validacion de datos"
            ];
        }

        $rol = Roles::create($inputs);
        return [
            "status" => 200,
            "data"  => [
                "rol" => $rol
            ]
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function show(Roles $roles)
    {
        return [
            "status" => 200,
            "data"  => [
                "rol" => $roles
            ]
        ];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function edit(Roles $roles)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Roles $roles)
    {
        //
        $inputs = $request->all();

        $validator = Validator::make($inputs,[
            "nombre_rol" => "required|min:3"
        ]);

        if($validator->fails()){
            return[
                "status" => 400,
                'msg'    => "Error validacion de datos"
            ];
        }

        $roles->update($inputs['nombre_rol']);
        return [
            'status' => 200,
            'data' => [
                'rol' => $roles,
                'msg' => "Actualizado correctamente"
            ]
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function destroy(Roles $roles)
    {
        $roles->delete();
        return [
            'status' => 200,
            'data' => [
                'rol' => $roles,
            ],
            'msg' => "elemento eliminado correctamente"
        ];
    }
}
