<?php
require "funcoes.php";
try {
    $s = new Categorias();
    $s->setnome($_POST['nomecat']);
    $s->inserir();
}catch(Exception $e){
    print json_encode([
        "error" => true,
        "message" => $e->getMessage()
    ]);
}?>