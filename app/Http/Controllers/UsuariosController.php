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
use DB;
use Auth;

class UsuariosController extends Controller
{
    public function __construct(){
       /* if(Auth::user()->roles_id == 4){
            $this->middleware('recursohumano');
        }
        else{
            $this->middleware('administrador');
        }*/
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
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Roles::where('id', '!=', '1')->get();
        
        return view('usuarios.nuevousuario', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuarioRequest $request)
    {
        

        if($request->roles == 1){
            $user = DB::select('SELECT u.*, r.*, count(roles_id) as suma FROM users as u INNER JOIN roles as r ON r.id = u.roles_id WHERE r.id=1');
            foreach ($user as $key) { $suma = $key->suma; }
            
            if($suma>0) {
                Session::flash('message-error', 'ERROR: NO PUEDE EXISTIR MÁS DE UN USUARIO ADMINISTRADOR');
                $user = User::all();
                
                return view('usuarios.usuario', compact('user'));
            }else{
            
            $user = new User();
            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->password = bcrypt($request['password']);
            $user->roles_id = $request['roles_id'];
            $user->remember_token = Session::token();
            $user->save();

            Session::flash('message', 'USUARIO REGISTRADO CORRECTAMENTE');

           }
        }
        elseif($request->roles == 5){
            $user = DB::select('SELECT u.*, r.*, count(roles_id) as suma FROM users as u INNER JOIN roles as r ON r.id = u.roles_id WHERE r.id=5');
            foreach ($user as $key) { $suma = $key->suma; }

            if($suma>0) {
                Session::flash('message-error', 'ERROR: NO PUEDE EXISTIR MÁS DE UN USUARIO DACE');
                $user = User::all();
                return view('usuarios.usuario', compact('user'));
            }
            else{
            $user = new User();
            $user->name = strtoupper($request['name']);
            $user->email = strtolower($request['email']);
            $user->password = bcrypt($request['password']);
            $user->roles_id = $request['roles_id'];
            $user->remember_token = Session::token();
            $user->save();
            Session::flash('message', 'USUARIO REGISTRADO CORRECTAMENTE');
           }
       
        }else{

            $user = new User();
            $user->name = strtoupper($request['name']);
            $user->email = strtolower($request['email']);
            $user->password = bcrypt($request['password']);
            $user->roles_id = $request['roles_id'];
            $user->remember_token = Session::token();
            $user->save();
            Session::flash('message', 'USUARIO REGISTRADO CORRECTAMENTE');
        }

        return redirect('usuarios');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
        $roles = Roles::where('id', '!=', '1')->get();
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
        if($request['roles_id']==1)
        {
            $user = DB::select('SELECT u.*, r.*, count(roles_id) as suma FROM users as u INNER JOIN roles as r ON r.id = u.roles_id WHERE r.id=1');
            foreach ($user as $key) { $suma = $key->suma; }
            if($suma>0) {
                Session::flash('message-error', 'ERROR: DISCULPE.');
                return redirect()->action('UsuariosController@index');
            }
            else{
                $user = User::find($id);
                $user->name = strtoupper($request['name']);
                $user->email = strtolower($request['email']);
                $user->roles_id = $request['roles_id'];
                 
                $user->save();
                Session::flash('message', 'USUARIO EDITADO CORRECTAMENTE');
                return redirect()->action('UsuariosController@index');
            }
        }
        if($request['roles_id']==2)
        {
            $user = DB::select('SELECT u.*, r.*, count(roles_id) as suma FROM users as u INNER JOIN roles as r ON r.id = u.roles_id WHERE r.id=2');
            foreach ($user as $key) { $suma = $key->suma; }
            if($suma>0) {
                Session::flash('message-error', 'ERROR: DISCULPE.');
                return redirect()->action('UsuariosController@index');
            }
            else{
                $user = User::find($id);
                $user->name = strtoupper($request['name']);
                $user->email = strtolower($request['email']);
                $user->roles_id = $request['roles_id'];
                 
                $user->save();
                Session::flash('message', 'USUARIO EDITADO CORRECTAMENTE');
                return redirect()->action('UsuariosController@index');
            }
        }
        elseif($request['roles_id']==5)
        {
            $user = DB::select('SELECT u.*, r.*, count(roles_id) as suma FROM users as u INNER JOIN roles as r ON r.id = u.roles_id WHERE r.id=5');
            foreach ($user as $key) { $suma = $key->suma; }
            

            if($suma>0){
                Session::flash('message-error', 'ERROR: DISCULPE.');
                return redirect()->action('UsuariosController@index');
            }
            else{
                $user = User::find($id);
                $user->name = strtoupper($request['name']);
                $user->email = strtolower($request['email']);
                $user->roles_id = $request['roles_id'];
                 
                $user->save();
                Session::flash('message', 'USUARIO EDITADO CORRECTAMENTE');
                return redirect()->action('UsuariosController@index');
            }
        }
        else{
            $user = User::find($id);
            $user->name = strtoupper($request['name']);
            $user->email = strtolower($request['email']);
            $user->roles_id = $request['roles_id'];
             
            $user->save();
            Session::flash('message', 'USUARIO EDITADO CORRECTAMENTE');
            return redirect()->action('UsuariosController@index');
        }
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
        Session::flash('message', 'USUARIO ELIMINADO CORRECTAMENTE');

        return redirect::to('/usuarios');
    }
}
