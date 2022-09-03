<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  echo '<script type="text/javascript">';
  echo 'alert("Login necessário");';
  echo 'window.location.href = "index.php";';
  echo '</script>';
  exit;
}
if (!isset($_POST['edit'])){
    header('Location: produtos.php');
}else{
    $codid = $_POST['edit'];
}
?>
<!DOCTYPE html>
<html lang="PT-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="script.js" type="text/javascript"></script>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="images/nav.png">
    <title>Agro Imperial</title>
</head>

<body>

    <div class="area"></div>
    <?php include 'navbar.html' ?>
    <div class='inicio'>
        <div class='edit'>
            <form class='editaform p-3' action='lib/editarp.php' method="POST">
                <h2 class='text-center'>Editar produto</h2>
                <?php
                require 'lib/conn.php';
                $connection = DB::getInstance();
                $stmt = $connection->query("SELECT *, categorias.id as catid FROM produtos INNER JOIN categorias ON categorias.id=produtos.cat WHERE cod=$codid");
                $dados = $stmt->fetchAll();
                foreach ($dados as $d) {
                }
                $idc= $d['catid'];
                ?>
                <input type='hidden' name='codid' id='codid' value='<?php echo $codid ?>'>
                <div class="mb-3">
                    <label for="cod" class="form-label">Código do Produto</label>
                    <input type="text" class="form-control" name='cod' id="cod" placeholder="Código do Produto" value='<?php echo $d['cod']?>'>
                </div>
                <div class="mb-3">
                    <label for="nomeprod" class="form-label">Nome do Produto</label>
                    <input type="text" class="form-control" name='nomeprod' id="nomeprod" placeholder="Nome do Produto" value='<?php echo $d['nome']?>'>
                </div>
                <div class="mb-3">
                    <label for="catprod" class="form-label">Categoria</label>
                    <select class="form-control" name="catprod" id="catprod">
                        <option value='<?php echo $d['catid']?>'><?php echo $d['nomec']?></option>
                        <?php
                        $connection = DB::getInstance();
                        $stmt2 = $connection->query("SELECT * FROM categorias where id!=$idc ");
                        $dadoscat = $stmt2->fetchAll();
                        foreach ($dadoscat as $cat2) {
                            $select = "<option value='{$cat2['id']}'>{$cat2['nomec']}</option>";
                            echo $select;
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="estoque" class="form-label">Quantidade em Estoque</label>
                    <input type="number" class="form-control" name='estoque' id="estoque" placeholder="Quantidade em Estoque" value='<?php echo $d['estoque']?>'>
                </div>
                <div class="mb-3">
                    <label for="valorprod" class="form-label">Preço de Custo</label>
                    <input type="number" step=0.01 class="form-control" name='valorprod' id="valorprod" placeholder="Valor do Produto" value='<?php echo $d['valor']?>'>
                </div>
                <div class="mb-3">
                    <label for="valorv" class="form-label">Preço de Venda</label>
                    <input type="number" step=0.01 class="form-control" name='valorv' id="valorv" placeholder="Valor do Produto" value='<?php echo $d['valorv']?>'>
                </div>
                <div class="mb-3">
                    <button class="btn btn-success p-2" ><a href='produtos.php' class='text-light text-decoration-none'>Voltar</a></button>
                    <input id="salvar1" type="submit" class="btn btn-success p-2" value='Salvar'>
                </div>
        </form>
    </div>
    </div>
</body>

</html>