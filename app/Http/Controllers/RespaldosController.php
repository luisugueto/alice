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
use File;
use Carbon\Carbon;
use BackupManager\Filesystems\Destination;

class RespaldosController extends Controller
{
    public function index(){

        $files = Storage::disk('backup')->allFiles();
        $storage = Storage::disk('backup');
        $backups = [];

        foreach ($files as $k => $f) {
            if (substr($f, -3) == '.gz' && $storage->exists($f)) {

                $e = explode('/', $f);
                
                $backups[] = [
                    'file_path' => $f,
                    'file_name' => $e[0],
                    'file_size' => $storage->size($f),
                    'last_modified' => $storage->lastModified($f),
                ];
            }
        }

        $backups = array_reverse($backups);
        return view('respaldos.index', compact('backups'));
    }

    public function create(){

        $date = Carbon::now()->toW3cString();
        $environment = env('APP_ENV');

        try {

            Artisan::call("db:backup", [
                "--database"        => "mysql",
                "--destination"     => "local",
                "--destinationPath" => "/{$environment}/montessori_{$environment}_{$date}",
                "--compression"     => "gzip"
 
            ]);

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
        if ($disk =  Storage::disk('backup')->exists($file_name)) {

            $fs = "../storage/backups/local/" . $file_name;
    
            return response()->download($fs);

        } else {

            abort(404, "The backup file doesn't exist.");
        }

    }

    public function destroy(Request $request)
    {	    
    	if($disk =  Storage::disk('backup')->exists($request->file_name))
    	{
    		$delete = Storage::disk('backup')->delete($request->file_name);

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

  

    public function restore($file_name){

        if($disk = Storage::disk('backup')->exists($file_name)){

            Artisan::call("db:restore", [
                "--source"      => "s3",
                "--sourcePath"  => $file_name,
                "--database"    => "mysql",
                "--compression" => "gzip"
            ]);

            Session::flash('message', 'SE HA REALIZADO LA RESTAURACION DE LA BASE DE DATOS EXITOSAMENTE.');

            return redirect()->back();

        } else {

             Session::flash('message-error', 'DISCULPE A OCURRIDO UN ERROR EN LA RESTAURACION DE LA BASE DE DATOS (ARCHIVO CORRUPTO).');

            return redirect()->back();
        }
        
    }
        
}
