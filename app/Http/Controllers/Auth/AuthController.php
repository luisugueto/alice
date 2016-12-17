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
        $periodos = Periodos::lists('nombre', 'id');
        return view('auth.login', ['periodos' => $periodos]);
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

            $mes = date('m');
            $prestamo = DB::select('SELECT p.*, pr.*, SUM(pr.monto) as suma, r.*, (r.sueldo_mens+r.bono_responsabilidad) as totales FROM datos_generales_personal as p INNER JOIN prestamos as pr ON p.id = pr.id_personal INNER JOIN remuneracion as r ON r.id_personal=p.id WHERE MONTH(pr.fecha)= $mes GROUP BY p.id');
            foreach ($prestamo as $per) {
                $totales = $per->totales;
                $suma = $per->suma;
                $i = 0;
                if($suma>0) $i++;
            }

            Session::put('valor', $i);
            Session::flash('message', 'Bienvenido');
            Session::put('periodo', $request['periodo']);
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
