<?php
require "conn.php";
date_default_timezone_set('America/Sao_Paulo');
$mesat=date('Y/m');
$mesp = $mesat;
$mesat=explode("/",$mesat);
list($ano1, $mes1) = $mesat;

$mesp = explode("/",$mesp);
list($ano2, $mes2) = $mesp;
$mes2 = $mes2-1;

$connection = DB::getInstance();
$consulta = $connection->prepare("SELECT COUNT(id) as vendas FROM vendas WHERE data between ('$ano1/$mes1/01') AND ('$ano1/$mes1/31')");
$consulta->execute();
$dados = $consulta->fetch();
$valor1 = $dados['vendas'];

$connection = DB::getInstance();
$consulta2 = $connection->prepare("SELECT COUNT(id) as vendas FROM vendas WHERE data between ('$ano2/$mes2/01') AND ('$ano2/$mes2/31')");
$consulta2->execute();
$dados2 = $consulta2->fetch();
$valor2 = $dados2['vendas'];

$connection = DB::getInstance();
$consulta3 = $connection->prepare("SELECT COUNT(cod) as produtos FROM produtos");
$consulta3->execute();
$dados3 = $consulta3->fetch();
$prods = $dados3['produtos'];

$connection = DB::getInstance();
$consulta4 = $connection->prepare("SELECT COUNT(id) as cats FROM categorias");
$consulta4->execute();
$dados4 = $consulta4->fetch();
$cats = $dados4['cats'];

?>
