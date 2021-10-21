<?php
namespace App\Helpers;


use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class iterarArchivo
{
    private $filename;
    private $base;
    private $path;
        
    public function __construct($filename=null, $base=null, $path=null)
    {
        $this->filename = $filename;
        $this->base = $base;
        $this->path = $path;
    }

    public function iterarArchivo()
    {
        $filename = $this->filename;
        $base = $this->base;
        $path = $this->path;


        if(Storage::disk('local')->exists($base.$filename)){
        
            $json = File::get($path.$filename);
            $archivo = json_decode($json, true);

        }else{
            //$archivo = [];
        }
        if (isset($archivo)) {
            return $archivo;
        }
        
    }
}
