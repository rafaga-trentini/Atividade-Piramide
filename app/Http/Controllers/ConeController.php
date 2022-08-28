<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConeController extends Controller
{   

    public function index($z=1, $r=1, $tipo=1) {
        return $this->cone($z, $r, $tipo);
    }

    public function cone($z, $r, $tipo) {
        $z = str_replace(',', '.', $z);
        $r = str_replace(',', '.', $r);
        $AreaCirculo = 3.14*(pow($r, 2));
        $g = sqrt(pow($z, 2) + pow($r, 2));
        $AreaTotalCone = 3.14*$r*($r+$g);
        $AreaLateral = $AreaTotalCone - $AreaCirculo;
        $litros = $AreaTotalCone*3.45;
        $latas = ceil($litros/18);
        if ($tipo == 1) {
            $preco = $latas* 238.90;
        } else if ($tipo == 2) {
            $preco = 467.98 * $latas;
        } else if ($tipo == 3) {
            $preco = 758.34 * $latas;
        }
        echo "Controller<br>";
        return "-Cone
                Raio: $r </br>
                Altura: $z </br>
                Nivel: $tipo </br>
                ---------------</br>
                Geratriz: $g </br>
                ---------------</br>
                Area do Fundo: $AreaCirculo </br>
                Area Lateral Cone: $AreaLateral </br>
                Area Total: $AreaTotalCone </br>
                ---------------</br>
                Litros: $litros </br>
                Latas: $latas </br>
                ---------------</br>
                Preço: $preco </br>";
    }
}
