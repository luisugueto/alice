<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.2/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use App\Estudiante;
use App\Inscripciones;
use DB;
use App\Seccion;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        $estudiante = Estudiante::all()->count();
        $capacidad = DB::select('SELECT sum(capacidad) as capacidad FROM secciones');
        foreach ($capacidad as $cap){ $suma = $cap->capacidad; }

        $activos = Inscripciones::where('id_periodo', Session::get('periodo'))->count();

        return view('home', compact('estudiante', 'suma', 'activos'));
    }

    public function usuarios()
    {
        return view('usuarios.usuario');
    }

}