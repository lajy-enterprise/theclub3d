<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use App\User;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Console\Command;

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
        /////separar las claves
        $keys = array_keys($datos);
        /////separar los valores
        $value = array_values($datos);
        $variables = "";
        
        for($i=0; $i < count($datos); $i++) {
            if(is_numeric($value[$i])) {
                $variables .= "-D'".$keys[$i]."=".$value[$i]."' ";
            }else{
                $variables .= "-D'".$keys[$i]."='".$value[$i]."'' ";
            }
        };
        
        $filenameEn= $post->scad;
        $pathEn = public_path('storage') . '/herramientas/' . $filenameEn;

        $filenameSal= $post->slug.".stl";
        $pathSal = public_path('storage') . '/herramientas/render/' . $filenameSal;
        

        $cmd = "openscad  ".$variables." -o ".$pathSal." ".$pathEn;

        //$cmd = "openscad -D'name='Paulina'' -D'height=50' -D'long=20' -D'thicknessb= 7' -o ".$pathSal." ".$pathEn;
        
        shell_exec($cmd);
        
        //echo $cmd;

        return view('descarga-lista', compact('filenameSal'));

    }
}