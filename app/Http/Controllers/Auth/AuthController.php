<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Redirect;
use Session;
use App\Periodos;
use App\Prestamo;
use DB;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'terms' => 'required',
        ]);
    }

    public function showLoginForm()
    {
        $user = DB::select('SELECT u.*, r.*, count(roles_id) as suma FROM users as u INNER JOIN roles as r ON r.id = u.roles_id WHERE r.id=1');
        foreach ($user as $key) { $suma = $key->suma; }
        if($suma>0) {Session::flash('message-error', 'ERROR');}
        else{
            $user = new User();
            $user->name = strtoupper('ADMIN');
            $user->email = strtolower('admin@system.com');
            $user->password = bcrypt('1234');
            $user->roles_id = '1';
            $user->remember_token = Session::token();
            $user->save();
        }

        $user = DB::select('SELECT u.*, r.*, count(roles_id) as suma FROM users as u INNER JOIN roles as r ON r.id = u.roles_id WHERE r.id=5');
        foreach ($user as $key) { $suma = $key->suma; }
        if($suma>0) {Session::flash('message-error', 'ERROR');}
        else{
            $user = new User();
            $user->name = strtoupper('ADMIN DACE');
            $user->email = strtolower('dace@system.com');
            $user->password = bcrypt('1234');
            $user->roles_id = '5';
            $user->remember_token = Session::token();
            $user->save();
        }
       /* $year = date("Y");

        $periodoActivo = Periodos::where('nombre', $periodoActivo)->first();
        if($periodoActivo->status == 'inactivo'){
            $periodoActivo->status = 'activo';
            $periodoActivo->save();
        }*/


        /*  

        MOROSOS

        */

        $sql = DB::select("SELECT *, ru.fecha as fecha_calcular, fa_ru.id as id_fa_ru FROM facturas_rubros as fa_ru LEFT JOIN facturacion as fa ON fa.id = fa_ru.id_factura LEFT JOIN rubros as ru ON fa_ru.id_rubro = ru.id");

            foreach ($sql as $key) {
                $fechaActual = Carbon::now();
                $fechaCalcular = new Carbon($key->fecha_calcular);
                $difference = $fechaCalcular->diff($fechaActual)->days;
                $id_factura = $key->id_factura;
                $id_estudiante = $key->id_estudiante;

                if($difference>5)
                {
                    $facturacion = DB::select("SELECT * FROM morosos WHERE id_factura = '".$id_factura."'");
                    $contadorFacturacion = count($facturacion);
                    $rubros_realizados = DB::select("SELECT * FROM rubros_realizados WHERE id_factura_rubro = ".$key->id_fa_ru." ORDER BY id DESC LIMIT 1");
                    if(count($rubros_realizados)>0){
                        foreach ($rubros_realizados as $key2) {
                            $monto_adeudado = $key2->monto_adeudado;
                        }

                        if($monto_adeudado > 0){
                            if($contadorFacturacion==0)
                            {
                                $sql2 = DB::insert("INSERT INTO morosos (id_estudiante, id_factura, fecha) VALUES(".$id_estudiante.", ".$id_factura.", now())");
                            }
                        }
                        
                    }else{

                        $monto_adeudado = $key->total_pago;

                        if($monto_adeudado > 0){
                            if($contadorFacturacion==0)
                            {
                                $sql2 = DB::insert("INSERT INTO morosos (id_estudiante, id_factura, fecha) VALUES(".$id_estudiante.", ".$id_factura.", now())");
                            }
                        }
                    }
                    

                }
            }

            /* 
    
            FIN DE MOROSOS
            
            */



        $periodos = Periodos::lists('nombre', 'id');
        $periodos2= Periodos::where('status','activo')->first();
        return view('auth.login', ['periodos' => $periodos,'periodos2' => $periodos2]);
    }

    public function login(LoginRequest $request)
    {
        if(Auth::check())
        {
            Session::flash('message-error', 'Usuario ya conectado.');
            return Redirect::to('/home');
        }
        if(Auth::attempt(['email' => $request['email'], 'password' => $request['password']]))
        {

            // define('mes', date('m'));
            // $prestamo = DB::select('SELECT p.*, pr.*, r.*, pa.*, SUM(pr.monto) as suma, (r.sueldo_mens+r.bono_responsabilidad) as totales, SUM(pa.monto_pagado) as pagado FROM datos_generales_personal as p INNER JOIN prestamos as pr ON pr.id_personal=p.id INNER JOIN remuneracion as r ON r.id_personal=p.id INNER JOIN pagos_realizados as pa ON pa.id_prestamo=pr.id  WHERE MONTH(pr.fecha)= '.mes.' AND pr.tipo = "Prestamo" AND pr.id_personal = p.id');
            // foreach ($prestamo as $per) {
            //     $totales = $per->totales;
            //     $suma = $per->suma;
            //     $pagado = $per->pagado;
            //     $i = 0;
            //     if($pagado<$suma) $i++;
            // }

            $prestamo = Prestamo::all();
            $suma = 0;
            foreach($prestamo as $per){
                $i = 0; $monto = 0;
                foreach ($per->pagosrealizados as $key) {
                    $i += $key->monto_pagado;
                    $monto = $key->monto_adeudado;
                }                    
                $per->fecha;
                $per->personal->nombres;                
                $per->tipo;
                $per->monto;
                $per->monto-$i;
                if($per->tipo == 'Prestamo')
                {
                    if(($per->monto-$i)==0 || ($per->monto-$i)<=0)
                    {

                    }
                    else $suma++;
                }                
            }

            Session::put('valor', $suma);
            Session::flash('message', 'Bienvenido');
            Session::put('periodo', $request['periodos']);
            return Redirect::to('/home');
        }
        Session::flash('message-error', 'Datos incorrectos');
        return Redirect::to('/');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
