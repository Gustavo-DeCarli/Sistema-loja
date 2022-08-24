<?php
require "funcoes.php";
try {
    $p = New Produtos;
    $p->setporc($_POST['porcentagem']);
    $p->aumentar();
    header('Location: ../painel.php');
}catch(Exception $e){
    print json_encode([
        "error" => true,
        "message" => $e->getMessage()
    ]);
}