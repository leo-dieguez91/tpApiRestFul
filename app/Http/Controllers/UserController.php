<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Traits\ApiTrait;


class UserController extends Controller
{
    use ApiTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {      
        $users = User::all();

        return $this->showAll($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data= request()->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'email' => 'required|email|unique:users',
            'usuario' => 'required|unique:users'
        ]);
        
        $user = User::create($request->all());

        return $this->showOne($user, 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

        return $this->showOne($user);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data= request()->validate([
            'nombre' => '',
            'apellido' => '',
            'email' => 'email',
            'usuario' => ''
        ]);

        if ($request->has('nombre') && $user->nombre != $request->nombre) {
            $user->nombre = $request->nombre;
        }

        if ($request->has('apellido') && $user->apellido != $request->apellido) {
            $user->apellido = $request->apellido;
        }

        if ($request->has('email') && $user->email != $request->email) {
            $user->email = $request->email;
        }

        if ($request->has('usuario') && $user->usuario != $request->usuario) {
            $user->usuario = $request->usuario;
        }

        if (!$user->isDirty()) {
            return $this->errorResponse('Se debe especificar al menos un valor diferente para actualizar', 422);
        }

        $user->save();

        return $this->showOne($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return $this->showOne($user);

    }
}
