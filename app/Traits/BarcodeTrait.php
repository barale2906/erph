<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Picqer\Barcode\BarcodeGeneratorHTML;
use Picqer\Barcode\BarcodeGeneratorPNG;

trait BarcodeTrait
{
    public $resultado;
    public $nombre;
    public $val;

    public function elimina(){
        $ubica='barcodes/'.Auth::user()->id.'/*';
        $files = glob($ubica); //obtenemos todos los nombres de los ficheros
        foreach($files as $file){
            if(is_file($file))
            unlink($file); //elimino el fichero
        }
    }

    public function codigo($valor){


        $generator = new BarcodeGeneratorHTML();
        $this->resultado = $generator->getBarcode($valor, $generator::TYPE_CODE_128);
    }

    public function imagen($valor){
        $generator = new BarcodeGeneratorPNG();
        $image = $generator->getBarcode($valor, $generator::TYPE_CODE_128);
        $this->nombre='barcodes/'.Auth::user()->id.'/'.$valor.'-codigo.png';
        $this->val=$valor;

        Storage::put($this->nombre, $image);

        return response($image)->header('Content-type','image/png');
    }
}
