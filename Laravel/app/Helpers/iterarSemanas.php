<?php
namespace App\Helpers;


use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class iterarSemanas
{
    private $inicio_semana_f;
    private $final_semana_f;
    private $mes_ano;
    private $archivo;
    
    public function __construct($inicio_semana_f=null, $final_semana_f=null, $mes_ano=null, $archivo=null)
    {
        $this->inicio_semana_f = $inicio_semana_f;
        $this->final_semana_f = $final_semana_f;
        $this->mes_ano = $mes_ano;
        $this->archivo = $archivo;
    }

    public function iterarSemanas()
    {
        $array1 = [];
        for ($i=$this->inicio_semana_f; $i < $this->final_semana_f; $i++) {
        $cosa = $i."-".$this->mes_ano;
        $key = array_search($cosa, array_column($this->archivo, "date"));

            if ($key !== false) {

                $buscar = $this->archivo[$key];

                //var_dump($buscar);

                array_push($array1, $buscar);
                
            }
        }

        return $array1;
    }
}
