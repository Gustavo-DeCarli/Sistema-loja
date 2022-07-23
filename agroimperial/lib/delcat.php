<?php
require "funcoes.php";
try {
    $p = New Categorias;
    $p->setid($_POST['idcat']);
    $p->remover();
    print $p;
    header('Location: ../categorias.php');
}catch(Exception $e){
    print json_encode([
        "error" => true,
        "message" => $e->getMessage()
    ]);
}