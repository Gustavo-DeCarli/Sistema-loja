<?php
require "funcoes.php";
try {
    $s = new Produtos();
    $s->setNome($_POST['nomeprod']);
    $s->setestoque($_POST['estoque']);
    $s->setcod($_POST['cod']);
    $s->setcat($_POST['catprod']);
    $s->setvalor($_POST['valorprod']);
    $s->setcodid($_POST['codid']);
    $s->update();
    header('Location: ../produtos.php');
}catch(Exception $e){
    print json_encode([
        "error" => true,
        "message" => $e->getMessage()
    ]);
}?>