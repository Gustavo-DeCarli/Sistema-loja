<?php
require "funcoes.php";
try {
    $p = New Vendas;
    $p->setid($_POST['delven']);
    $p->remover();
    print $p;
    header('Location: ../vendas.php');
}catch(Exception $e){
    print json_encode([
        "error" => true,
        "message" => $e->getMessage()
    ]);
}