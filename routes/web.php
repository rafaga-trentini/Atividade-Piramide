<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return 'Digite /piramide/(h)/(ab)/(1 - 2 - 3 para o tipo de tinta)';
});

Route::get('/piramide/{h}/{ab}/{tipo}', function ($h, $ab, $tipo) {
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
})->where(['h' => '[0-9]+.*','ab' => '[0-9]+.*','tipo' => '[0-9]+']);
