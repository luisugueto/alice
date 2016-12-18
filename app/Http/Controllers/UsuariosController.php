<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UsuarioRequest;
use App\User;
use App\Personal;
use App\Roles;
use Session;
use Response;
use Redirect;

class UsuariosController extends Controller
{
    public function __construct(){
        $this->middleware('administrador');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('usuarios.usuario', compact('user'));
    }
    public function nuevo(){
        //$roles = Roles::lists('nombre', 'id');
        $roles = Roles::all();
        return view('usuarios.nuevousuario', compact('roles'));
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
    public function store(UsuarioRequest $request)
    {
        $user = new User();
        $user->name = strtoupper($request['nombre']);
        $user->email = strtolower($request['email']);
        $user->password = bcrypt($request['contraseña']);
        $user->roles_id = $request['roles'];
        $user->remember_token = Session::token();
        $user->save();
        Session::put('message', 'Usuario Creado Correctamente');
        $user = User::all();
        return view('usuarios.usuario', compact('user'));
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
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Roles::lists('nombre', 'id');
        return view('usuarios.edit', ['user'=>$user, 'roles'=>$roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $user = User::find($id);
         $user->name = strtoupper($request['name']);
         $user->email = strtolower($request['email']);
         $user->roles_id = $request['roles_id'];
         
        #$user->fill($request->all());
        $user->save();
        Session::put('message', 'Usuario Editado Correctamente');

        return redirect::to('/usuarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        Session::put('message', 'Usuario Eliminado Correctamente');

        return redirect::to('/usuarios');
    }
}
