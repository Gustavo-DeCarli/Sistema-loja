<?php
require "funcoes.php";
try {
    $s = new Produtos();
    $s->setNome($_POST['nomeprod']);
    $s->setestoque($_POST['estoque']);
    $s->setcod($_POST['cod']);
    $s->setcat($_POST['catprod']);
    $s->setvalor($_POST['valorprod']);
    $s->setvalorv($_POST['valorv']);
    $s->inserir();
    var_dump($s);
}catch(Exception $e){
    print json_encode([
        "error" => true,
        "message" => $e->getMessage()
    ]);
}?>