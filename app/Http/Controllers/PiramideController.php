<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PiramideController extends Controller
{   

    public function index($h=1, $ab=1, $tipo=1) {
        return $this->piramide($h, $ab, $tipo);
    }

    public function piramide($h, $ab, $tipo) {
        $h = str_replace(',', '.', $h);
        $ab = str_replace(',', '.', $ab);
        $a1 = sqrt(pow($h, 2) + pow($ab, 2));
        $areaTriangulo = (($ab*2) * $h)/2;
        $areaBase = ($ab*2) * ($ab*2);
        $areaTotal = ($areaTriangulo*4) + $areaBase;
        $volume = ($areaBase*$h)/3;
        $litros = (($areaTriangulo * 4) + $areaBase)/4.76;
        $latas = ceil($litros/18);
        if ($tipo == 1) {
            $preco = $latas* 127.90;
        } else if ($tipo == 2) {
            $preco = 258.98 * $latas;
        } else if ($tipo == 3) {
            $preco = 344.34 * $latas;
        }
        echo "Controller<br>";
        return "ab: $ab </br>
                h: $h </br>
                a1: $a1 </br>
                Area Triangulo: $areaTriangulo </br>
                Area Base: $areaBase </br>
                Area Total: $areaTotal </br>
                Tipo de Tinta: $tipo </br>
                Litros: $litros </br>
                Latas: $latas </br>
                Preço: $preco </br>
                Volume: $volume </br>";
    }
}
