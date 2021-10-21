<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use App\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

use App\Helpers\iterarSemanas;
use App\Helpers\iterarArchivo;

class AdminDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // guardar los nombres de las herramientas en un array
        $herras = Post::all()->where('is_post', false);
        $total = Post::all();

        $herramientas = [];

        for ($j=0; $j < count($total) ; $j++) { 
            if (isset($herras[$j])) {
                
                array_push($herramientas, $herras[$j]["slug"]);

            }
        }
        // ------------------
        
        // guardar los nombres de los posts en un array
        $post = Post::all()->where('is_post', true);
        $total = Post::all();

        $posts = [];

        for ($j=0; $j < count($total) ; $j++) { 
            if (isset($post[$j])) {
                
                array_push($posts, $post[$j]["slug"]);

            }
        }
        // ------------------

        // Definir Variables

        $fecha_actual = Carbon::now()->format('d-m-Y');
        $dia_actual = Carbon::now()->format('l');
        $semana_mes = Carbon::now()->weekOfMonth;
        $semana_ano = Carbon::now()->weekOfYear;
        
        $inicioMes = Carbon::now()->startOfMonth()->weekOfYear;
        $finalMes = Carbon::now()->endOfMonth()->weekOfYear;

        $baseHerramientas = "/estadisticas/herramientas/";
        $pathHerramientas = storage_path() . '/app'.$baseHerramientas;

        $basePosts = "/estadisticas/posts/";
        $pathPosts = storage_path() . '/app'.$basePosts;

        $filename = 'semana_'.$semana_ano.'.json';

        // ------------------
        
    /*Trabajando Herramientas*/
    
        //optener array del mes
        
        $arrayMes = [];

        for ($i=$inicioMes; $i < $finalMes ; $i++) { 
            $filenameMes = 'semana_'.$i.'.json';

            $iterarMes = new iterarArchivo(
                $filenameMes, $baseHerramientas, $pathHerramientas
            );

            $arrayPush = $iterarMes->iterarArchivo();


            if (!is_Null($arrayPush)) {
                array_push($arrayMes, $arrayPush);
            }
        }

        // ----------------------
    
        //optener array del semana

        $iterarSemanaActual = new iterarArchivo(
            $filename, $baseHerramientas, $pathHerramientas
        );

        $arraySemana = $iterarSemanaActual->iterarArchivo();

        if (is_Null($arraySemana)) {
            
            $arraySemana = [];
                
            }

        // ----------------------
    
        // buscar resultados por dia
        
        $resultadosDia = [];

        foreach ($herramientas as $key => $value) {
            
            $resultadosDia += [$value => 0];

            $key = array_search($fecha_actual, array_column($arraySemana, "date"));
            
            for ($i=0; $i < count($arraySemana) ; $i++) {
                

                if ($key !== false) {
                    
                    foreach ($arraySemana[$key]["tools"] as $clave => $valor) {

                        if ( $clave == $value) {
                            
                            $resultadosDia[$value] = $resultadosDia[$value]+$valor;
                            
                        }
                    }
                }
            }
        }

        arsort($resultadosDia);

        // ----------------------
     
        // buscar resultados por semana
        
        $resultadosSemana = [];
        
        foreach ($herramientas as $key => $value) {
            
            $resultadosSemana += [$value => 0];    
            
            for ($i=0; $i < count($arraySemana) ; $i++) {
                
                foreach ($arraySemana[$i]["tools"] as $clave => $valor) {


                   if ( $clave == $value) {
                        
                        $resultadosSemana[$value] = $resultadosSemana[$value]+$valor;
                        
                    }
                }
            }
        }

        arsort($resultadosSemana);


        // ----------------------
    
        // buscar resultados por Mes
        
        $resultadosMes = [];
        
        foreach ($herramientas as $key => $value) {
            
            $resultadosMes += [$value => 0];    
            
            for ($i=0; $i < count($arrayMes) ; $i++) {

                for ($j=0; $j < count($arrayMes[$i]) ; $j++) {

                    foreach ($arrayMes[$i][$j]["tools"] as $clave => $valor) {

                       if ( $clave == $value) {
                            
                            $resultadosMes[$value] = $resultadosMes[$value]+$valor;
                            
                        }
                    }
                }
            }
        }
        arsort($resultadosMes);
       

        // ----------------------
    /*Trabajando Herramientas*/

    /*Trabajando Posts*/
    
        //optener array del mes
        
        $arrayMesPosts = [];

        for ($i=$inicioMes; $i < $finalMes ; $i++) { 
            $filenameMesPosts = 'semana_'.$i.'.json';

            $iterarMesPosts = new iterarArchivo(
                $filenameMesPosts, $basePosts, $pathPosts
            );

            $arrayPushPosts = $iterarMesPosts->iterarArchivo();


            if (!is_Null($arrayPushPosts)) {
                array_push($arrayMesPosts, $arrayPushPosts);
            }
        }

        // ----------------------
    
        //optener array del semana

        $iterarSemanaActualPosts = new iterarArchivo(
            $filename, $basePosts, $pathPosts
        );

        $arraySemanaPosts = $iterarSemanaActualPosts->iterarArchivo();

        if (is_Null($arraySemanaPosts)) {
            
            $arraySemanaPosts = [];
                
            }
        // ----------------------
    
        // buscar resultados por dia
        
        $resultadosDiaPosts = [];
        
        foreach ($posts as $key => $value) {
            
            $resultadosDiaPosts += [$value => 0];    
            
            $key = array_search($fecha_actual, array_column($arraySemanaPosts, "date"));
            
            for ($i=0; $i < count($arraySemanaPosts) ; $i++) {
                
                if ($key !== false) {
                    foreach ($arraySemanaPosts[$key]["tools"] as $clave => $valor) {
                       if ( $clave == $value) {
                            
                            $resultadosDiaPosts[$value] = $resultadosDiaPosts[$value]+$valor;
                        }
                    }
                }
            }
        }

        arsort($resultadosDiaPosts);


        // ----------------------
     
        // buscar resultados por semana
        
        $resultadosSemanaPosts = [];
        
        foreach ($posts as $key => $value) {
            
            $resultadosSemanaPosts += [$value => 0];    
            
            for ($i=0; $i < count($arraySemanaPosts) ; $i++) {
                
                foreach ($arraySemanaPosts[$i]["tools"] as $clave => $valor) {


                   if ( $clave == $value) {
                        
                        $resultadosSemanaPosts[$value] = $resultadosSemanaPosts[$value]+$valor;
                        
                    }
                }
            }
        }

        arsort($resultadosSemanaPosts);

        // ----------------------
    
        // buscar resultados por Mes
        
        $resultadosMesPosts = [];
        
        foreach ($posts as $key => $value) {
            
            $resultadosMesPosts += [$value => 0];    
            
            for ($i=0; $i < count($arrayMesPosts) ; $i++) {

                for ($j=0; $j < count($arrayMesPosts[$i]) ; $j++) {

                    foreach ($arrayMesPosts[$i][$j]["tools"] as $clave => $valor) {

                       if ( $clave == $value) {
                            
                            $resultadosMesPosts[$value] = $resultadosMesPosts[$value]+$valor;
                            
                        }
                    }
                }
            }
        }
        arsort($resultadosMesPosts);
   

        // ----------------------
    /*Trabajando Posts*/

   
        return view('admin.dashboard', compact('resultadosDia', 'resultadosDiaPosts', 'resultadosSemana', 'resultadosSemanaPosts', 'resultadosMes', 'resultadosMesPosts'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}



  /*    
      $key = array_search($fecha_actual, array_column($archivo, "date"));
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
        
      }else{
        $arraicito= array(
          "date" => $fecha_actual,
          "tools" => array($slug => 1) 
        );

        array_push($archivo, $arraicito);

      }
    }else{
      $arraicito= array(
        array(
        "date" => $fecha_actual,
        "tools" => array($slug => 1) 
        )
      );
    }*/