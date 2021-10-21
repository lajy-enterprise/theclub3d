<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use App\User;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Console\Command;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use MartinButt\Laravel\Adsense\Facades\AdsenseFacade;

use Adsense;

class ConvertController extends Controller
{

    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function index(Request $data, $slug)
    {
        $post = Post::where('slug', $slug)
                  ->where('is_post', false)
                  ->where('slug', $slug)
                  ->first();

        $datos = $data->all();
        unset($datos['_token']);
        $userid = Auth::id();

        //dd($datos);
        
        $variables = "";

        foreach ($datos as $keys => $value) {

            if(is_numeric($value)){
              $variables .= "-D'".$keys."=".$value."' ";
            }elseif(!empty($data->file($keys))) {

              $fileth = $data->file($keys);
              $file = $data->file($keys)->getClientOriginalName();
              $extension = pathinfo($file, PATHINFO_EXTENSION);
              //$filename = pathinfo($file, PATHINFO_FILENAME);
              $pathfile = 'render/' .$userid. '/';
              
              $namefile = "archivoUser".$userid.".".$extension;
              
              Storage::put('/public/herramientas/' . $pathfile . $namefile, \File::get($fileth));
             
              $variables .= "-D'".$keys.'="'. $pathfile . $namefile.'"'."' ";
              
            }elseif(!is_numeric($value)){
                $value = strtoupper($value);
                $variables .= "-D'".$keys.'="'.$value.'"'."' ";
            }
        };
        
        
        $filenameEn= $post->scad;
        $pathEn = storage_path() . '/app/public/herramientas/' . $filenameEn;

        $filenameSal= $post->slug.".stl";
        $pathSal = storage_path() . '/app/public/herramientas/render/' . $userid . "/" . $filenameSal;
        
        $filefront = $userid . "/" . $filenameSal;

        $cmd = "openscad -o ".$pathSal." ".$pathEn." ".$variables;

        //$cmd = "openscad -D'name='Paulina'' -D'height=50' -D'long=20' -D'thicknessb= 7' -o ".$pathSal." ".$pathEn;
        
       /* echo "<br>";
        echo "<br>";
        echo $cmd;
        echo "<br>";
        echo "<br>";*/

        $respuestaShell = shell_exec("$cmd 2>&1");

        //echo $respuestaShell;

        $creado = Str::contains($respuestaShell, 'object is a 3D object');

        $noCreado = Str::contains($respuestaShell, 'object is empty');


       /*while (@ ob_end_flush()); // end all output buffers if any

        $proc = popen("$cmd 2>&1 ; echo Exit status : $?", 'r');

        $live_output     = "";
        $complete_output = "";

        while (!feof($proc))
        {
            $live_output     = fread($proc, 4096);
            $complete_output = $complete_output . $live_output;
            echo "$live_output";
            @ flush();
        }

        pclose($proc);

        // get exit status
        preg_match('/[0-9]+$/', $complete_output, $matches);

        // return exit status and intended output
        return array (
                        'exit_status'  => intval($matches[0]),
                        'output'       => str_replace("Exit status : " . $matches[0], '', $complete_output)
                     );
        */

            $dia_actual = Carbon::now()->format('d-m-Y');
            $semana_ano = Carbon::now()->weekOfYear;
            $filename= 'semana_'.$semana_ano.'.json';
            $path = storage_path() . '/app/estadisticas/herramientas/';

            if(Storage::disk('local')->exists('/estadisticas/herramientas/'.$filename)){
              $json = File::get($path.$filename);
              $archivo = json_decode($json, true);
              $key = array_search($dia_actual, array_column($archivo, "date"));
              if ($key !== false) {
                $buscar = $archivo[$key]["tools"];
                if (empty($archivo[$key]["tools"][$slug])) {
                  $archivo[$key]["tools"] += [ $slug => 1 ];
                }else{
                  foreach ($buscar as $clave => $valor) {
                    if ($clave === $slug) {
                      $archivo[$key]["tools"][$clave]=$valor+1;
                    }
                  }
                }
                $jsito = json_encode($archivo);
                $fp = fopen($path.$filename, "w");
                fwrite($fp, $jsito);
                fclose($fp);
              }else{
                $arraicito= array(
                  "date" => $dia_actual,
                  "tools" => array($slug => 1) 
                );

                //$archivo += [ "date" => $dia_actual, "tools" => array($slug => 1) ];

                array_push($archivo, $arraicito);

                $jsito = json_encode($archivo);
                $fp = fopen($path.$filename, "w");
                fwrite($fp, $jsito);
                fclose($fp);
              }
            }else{
              $arraicito= array(
                array(
                "date" => $dia_actual,
                "tools" => array($slug => 1) 
                )
              );

              $jsiton = json_encode($arraicito);
              Storage::put('/estadisticas/herramientas/'.$filename, $jsiton);
            }
            
          //  echo $cmd;
        
        $mostrar = false;
        
        if ($creado == true) {

          $mostrar = true;
          echo 'se creo el archivo, todo ok';
          return view('descarga-lista', compact('filefront', 'mostrar'));

        }elseif ($noCreado == true) {

          $mostrar = false;
          return view('descarga-lista', compact('filefront', 'mostrar', 'respuestaShell'));
          
        }

        

       // 
    }
}