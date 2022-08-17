<?php
require "conn.php";

class Produtos
{
    private $id = "";
    private $nome = "";
    private $estoque = "";
    private $cod = "";
    private $cat = "";
    private $valor = "";
    private $codid = "";

    function __toString(){
        return json_encode([
            "id" => $this->id,
            "nome" => $this->nome,
            "estoque" => $this->estoque,
            "cod" => $this->cod,
            "cat" => $this->cat,
            "valor" => $this->valor,
            "codid" => $this->codid
        ]);
    }

    function setid($v) {$this->id = $v;}
    function setNome($v) {$this->nome = $v;}
    function setestoque($v){$this->estoque = $v;}
    function setcod($v){$this->cod = $v;}
    function setcat($v){$this->cat = $v;}
    function setvalor($v){$this->valor = $v;}
    function setcodid($v){$this->codid = $v;}

    function inserir()
    {
        $connection = DB::getInstance();
        try{
            $consulta = $connection->prepare("START TRANSACTION;");
            $consulta->execute();
            $consulta = $connection->prepare("INSERT INTO produtos(nome,estoque,cod,cat,valor) VALUES(:nome,:estoque,:cod,:cat,:valor)");
            $consulta->execute([
                ':nome' => $this->nome,
                ':estoque' => $this->estoque,
                ':cod' => $this->cod,
                ':cat' => $this->cat,
                ':valor' => $this->valor
            ]);
            $consulta = $connection->prepare("COMMIT;");
            $consulta->execute();
        }catch(Exception $e){
            $consulta = $connection->prepare("ROLLBACK;");
            $consulta->execute();
            die($e->getMessage());
        }
        
    }
    function remover()
    {
        $connection = DB::getInstance();
        $consulta = $connection->prepare("DELETE FROM produtos WHERE cod = :cod");
        $consulta->execute([':cod' => $this->cod]);
    }

    function update()
    {
        $connection = DB::getInstance();
        try{
            $consulta = $connection->prepare("START TRANSACTION;");
            $consulta->execute();
            $consulta = $connection->prepare("UPDATE produtos SET nome=:nome, estoque=:estoque, cod=:cod, cat=:cat, valor=:valor WHERE cod = :codid");
            $consulta->execute([
                ':nome' => $this->nome,
                ':estoque' => $this->estoque,
                ':cod' => $this->cod,
                ':cat' => $this->cat,
                ':valor' => $this->valor,
                ':codid' => $this->codid
            ]);
            $consulta = $connection->prepare("COMMIT;");
            $consulta->execute();
            
        }catch(Exception $e){
            $consulta = $connection->prepare("ROLLBACK;");
            $consulta->execute();
            die($e->getMessage());
        }
}
}

class Categorias
{
    private $id = "";
    private $nome = "";

    function __toString(){
        return json_encode([
            "id" => $this->id,
            "nome" => $this->nome,
        ]);
    }

    function setid($v) {$this->id = $v;}
    function setNome($v) {$this->nome = $v;}

    function inserir()
    {
        $connection = DB::getInstance();
        try{
            $consulta = $connection->prepare("START TRANSACTION;");
            $consulta->execute();
            $consulta = $connection->prepare("INSERT INTO categorias(nomec) VALUES (:nome)");
            $consulta->execute([
                ':nome' => $this->nome
            ]);
            $consulta = $connection->prepare("COMMIT;");
            $consulta->execute();
        }catch(Exception $e){
            $consulta = $connection->prepare("ROLLBACK;");
            $consulta->execute();
            die($e->getMessage());
        }
    }

    function remover()
    {
        $connection = DB::getInstance();
        $consulta = $connection->prepare("DELETE FROM categorias WHERE id = :id");
        $consulta->execute([':id' => $this->id]);
    }
}



class Vendas
{
    private $id = "";
    private $codprod = "";
    private $nfe = "";
    private $quantidade = "";
    private $valort = "";
    private $data = "";
    private $valor = "";

    function __toString(){
        return json_encode([
            "id" => $this->id,
            "codprod" => $this->codprod,
            "nfe" => $this->nfe,
            "quantidade" => $this->quantidade,
            "valort" => $this->valort,
            "data" => $this->data,
            "valor" => $this->valor
        ]);
    }

    function setid($v) {$this->id = $v;}
    function setcodprod($v) {$this->codprod = $v;}
    function setnfe($v) {$this->nfe = $v;}
    function setquantidade($v) {$this->quantidade = $v;}
    function setvalort($v) {$this->valort = $v;}
    function setdata($v) {$this->data = $v;}

    function inserir()
    {
        $connection = DB::getInstance();
        try{
            $consulta = $connection->prepare("START TRANSACTION;");
            $consulta->execute();
            
            $consulta = $connection->prepare("SELECT SUM(valor*:quantidade) as valor FROM produtos WHERE cod=:codprod");
            $dados = $consulta->execute([
                ':codprod' => $this->codprod,
                ':quantidade' => $this->quantidade
            ]);
            $dados = $consulta->fetch();
            $valor = $dados['valor'];

            $consulta = $connection->prepare("INSERT INTO vendas (id,codprod, notafisc, quantidade, valort, data) VALUES (null,:codprod,:notafisc,:quantidade,$valor, :data)");
            $consulta->execute([
                ':codprod' => $this->codprod,
                ':notafisc' => $this->nfe,
                ':quantidade' => $this->quantidade,
                ':data' => $this->data
            ]);

            $consulta = $connection->prepare("UPDATE produtos SET estoque=estoque-:quantidade WHERE cod=:codprod");
            $consulta->execute([
                ':quantidade' => $this->quantidade,
                ':codprod' => $this->codprod
            ]);

            $consulta = $connection->prepare("COMMIT;");
            $consulta->execute();
        }catch(Exception $e){
            $consulta = $connection->prepare("ROLLBACK;");
            $consulta->execute();
            die($e->getMessage());
        }
    }

    function remover()
    {
        $connection = DB::getInstance();
        $consulta = $connection->prepare("SELECT quantidade, codprod FROM vendas WHERE id = :id");
        $consulta->execute([':id' => $this->id]);
        $q = $consulta->fetch();
        $quant = $q['quantidade'];
        $p = $q['codprod'];

        $connection = DB::getInstance();
        $consulta = $connection->prepare("UPDATE produtos SET estoque=estoque+$quant WHERE cod = $p");
        $consulta->execute();

        $connection = DB::getInstance();
        $consulta = $connection->prepare("DELETE FROM vendas WHERE id = :id");
        $consulta->execute([':id' => $this->id]);
    }
}