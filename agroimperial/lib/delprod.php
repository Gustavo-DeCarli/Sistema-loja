<?php
require "funcoes.php";
try {
    $p = New Produtos;
    $p->setcod($_POST['idprod']);
    $p->remover();
    print $p;
    header('Location: ../produtos.php');
}catch(Exception $e){
    print json_encode([
        "error" => true,
        "message" => $e->getMessage()
    ]);
}