<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Personal;
use App\Http\Requests;
use Auth;
use Session;
use Storage;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();
     
        return view('perfils.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('perfils.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request->all();
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
        $user = User::where('id', Auth::user()->id)->first();
     
        return view('perfils.edit', compact('user'));
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
        $fotoBorrar = User::where('id', $id)->first();
        $personal = Personal::where('correo', $fotoBorrar->email)->first();
        $foto = $request->file('foto');
        #Storage::delete('file.jpg');
        #$name = $request->file('foto');
            if($request['verificar'] == 'on')
            {
                if($request['nueva'] == $request['confirmar'])
                {
                    if(count($personal)>0){
                        $persona = Personal::find($personal->id);
                        $persona->correo = $request['email'];
                        $persona->save();
                    }
                    Storage::delete($fotoBorrar->foto);
                    $user = User::find($id);
                    $user->name = $request['name'];
                    $user->email = $request['email'];
                    $user->password = bcrypt($request['nueva']);
                    $user->foto = $foto;
                    $user->save();
                    
                }
                else{
                    Session::flash('message-error', 'CONTRASEÑA INCORRECTA');
                    return redirect()->action('PerfilController@index');
                }
            }
            else
            {
                if(count($personal)>0){
                        $persona = Personal::find($personal->id);
                        $persona->correo = $request['email'];
                        $persona->save();
                    }
                Storage::delete($fotoBorrar->foto);
                $user = User::find($id);
                $user->name = $request['name'];
                $user->email = $request['email'];
                $user->foto = $foto;
                $user->save();
                
            }
            Session::flash('message', 'PERFIL EDITADO CORRECTAMENTE');
            return redirect()->action('PerfilController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
