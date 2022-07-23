<?php
require "funcoes.php";
try {
    $s = new Vendas();
    date_default_timezone_set('America/Sao_Paulo');
    $s->setcodprod($_POST['codprod']);
    $s->setnfe($_POST['nfe']);
    $s->setquantidade($_POST['quantidade']);
    $s->setData(date('Y/m/d'));
    $s->inserir();
}catch(Exception $e){
    print json_encode([
        "error" => true,
        "message" => $e->getMessage()
    ]);
}?>