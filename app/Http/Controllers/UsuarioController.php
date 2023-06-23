<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return [
            "status" => 200,
            "data" => [
                "usuarios" => Usuario::with('rol')
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
        $validate = Validator::make($inputs,[
            "nombre_usuario" => "required|min:2",
            "paterno_usuario" => "required|min:2",
            "materno_usuario" => "required|min:2",
            "correo_usuario" => "required|min:2",
            "id_rol_usuario" => "required",
        ]);

        if($validate->fails()){
            return [
                'status' => 400,
                "msg" => "Error validacion de datos"
            ];
        }

        $usuario = Usuario::create($inputs);

        return [
            "status" => 200,
            'msg' => 'Elemento creado.',
            "data" => [
                "usuario" => $usuario
            ]
        ];

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
        return [
            "status" => 200,
            'msg' => 'Elemento creado.',
            "data" => [
                "usuario" => $usuario
            ]
        ];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        $inputs = $request->all();
         $validate = Validator::make($inputs,[
            "nombre_usuario" => "required|min:2",
            "paterno_usuario" => "required|min:2",
            "materno_usuario" => "required|min:2",
            "correo_usuario" => "required|min:2",
            "id_rol_usuario" => "required",
        ]);

        if($validate->fails()){
            return [
                'status' => 400,
                "msg" => "Error validacion de datos"
            ];
        }

        $usuario->update($inputs);

        return [
            "status" => 200,
            'msg' => "Elemento editado.",
            "data" => [
                'usuario' => $usuario
            ]
            ];

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return [
            "status" => 200,
            'msg' => 'Elemento eliminado.',
            'data' => [
                "usuario"  => $usuario
            ]
        ];
    }
}
