<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Alert;
use Artisan;
use Log;
use Storage;
use Response;
use Session;

class RespaldosController extends Controller
{
    public function index(){

        $disk = Storage::disk('backup');
        $files = Storage::disk('backup')->allFiles();

        $backups = [];

        foreach ($files as $k => $f) {

            if (substr($f, -4) == '.zip' && $disk->exists($f)) {

                $e = explode('/', $f);
        
                $backups[] = [
                    'file_path' => $f,
                    'file_name' => $e[1],
                    'file_size' => $disk->size($f),
                    'last_modified' => $disk->lastModified($f),
                ];
            }
        }

        $backups = array_reverse($backups);

        return view('respaldos.index', compact('backups'));
    }

    public function create(){

        try {

            Artisan::call("backup:run");

            $output = Artisan::output();

            Log::info("Backpack\BackupManager -- new backup started from admin interface \r\n" . $output);

            Session::flash('message', 'SE A CREADO UN NUEVO RESPALDO CORRECTAMENTE.');

            return redirect()->back();

        } catch (Exception $e) {

            Session::flash('message-error', 'ERROR AL PROCESAR LA SOLICITUD '. $e .' VUELVA A INTENTARLO.');

            return redirect()->back();
        }

    }

    public function download($file_name){
     
        if ($disk =  Storage::disk('backup')->exists('http---localhost/' . $file_name)) {

            $fs = "../storage/laravel-backups/http---localhost/" . $file_name;
    
            return response()->download($fs);

        } else {

            abort(404, "The backup file doesn't exist.");
        }

    }

    public function destroy(Request $request)
    {	
    	$fs = "http---localhost/" . $request->file_name;
    
    	if($disk =  Storage::disk('backup')->exists('http---localhost/' . $request->file_name))
    	{
    		$delete = Storage::disk('backup')->delete($fs);

    		if($delete){

    			Session::flash('message', 'SE A ELIMINADO EL RESPALDO CORRECTAMENTE.');

    			return redirect()->back();	

    		} else {

	    		Session::flash('message-error', 'ERROR AL ELIMINAR RESPALDO A OCURRIDO UN ERROR, EL ARCHIVO A ELIMINAR NO SE ENCUENTRA VUELVA A INTENTARLO.');

	    		return redirect()->back();
    			
    		}

    	} else {

    		Session::flash('message', 'ERROR AL ELIMINAR RESPALDO A OCURRIDO UN ERROR, EL ARCHIVO A ELIMINAR NO SE ENCUENTRA VUELVA A INTENTARLO.');

    		return redirect()->back();
    		
    	}
    }

    public function vistaRestore(){  return view('respaldos.restore');   }

    public function restore(Request $request){
        $file = $request->file('file');
 
       //obtenemos el nombre del archivo
       $nombre = $file->getClientOriginalName();

        try {

            Artisan::call("db:restore ".$nombre);


            Session::flash('message', 'SE A CREADO UN NUEVO RESPALDO CORRECTAMENTE.');

            return redirect()->back();

        } catch (Exception $e) {

            Session::flash('message-error', 'ERROR AL PROCESAR LA SOLICITUD '. $e .' VUELVA A INTENTARLO.');

            return redirect()->back();
        }

    }
}
