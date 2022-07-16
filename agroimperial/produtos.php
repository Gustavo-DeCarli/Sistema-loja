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

        <div class="tabela position-absolute top-0 start-50 translate-middle-x">


            <nav class="navbar bg-light border rounded">
                <form action="admin.php" method='POST' class="container-fluid justify-content-start">
                    <div class="col-auto">
                        <button id="novo" type="button" class="botao btn " data-bs-toggle="modal" data-bs-target="#exampleModal3">
                            Novo cardápio
                        </button>
                    </div>
                    <div class="ms-5 col-auto">
                        <input class="form-control" name="busca" type="text" placeholder="Buscar por nome">
                    </div>
                    <div class="ms-2 col-auto">
                        <input class="buscar btn" name='buscar' type="submit" value='Buscar'>
                    </div>
                </form>
            </nav>
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th scope="col">Código</th>
                        <th scope="col">Produto</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Estoque</th>
                        <th scope="col">Valor</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                require "lib/conn.php";
                if (isset($_GET['pagina'])) {
                  $pagina = $_GET['pagina'];
                  $pc = $pagina;
                } else {
                  $pc = 1;
                }
                $total_reg = "10";
                $inicio = $pc - 1;
                $inicio = $inicio * $total_reg;
                $connection = DB::getInstance();
                $stmt = $connection->query("SELECT produtos.cod, produtos.nome, produtos.estoque, produtos.valor, categorias.nome as cat from produtos, categorias where categorias.id=produtos.cat LIMIT $inicio,$total_reg");
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $dados11 = $stmt->fetchAll();
                foreach ($dados11 as $loja) {
                ?>
                    <tr>
                        <td><?php echo $loja['cod']?></td>
                        <td><?php echo $loja['nome']?></td>
                        <td><?php echo $loja['cat']?></td>
                        <td><?php echo $loja['estoque']?></td>
                        <td>R$<?php echo $loja['valor']?></td>
                        <td><input class="btn btn-danger p-1" type='submit' value="Deletar"></td>
                    </tr>
                    <?php }?>
                </tbody>
                <tfoot>
        <tr>
          <?php
            $tr = $stmt->rowCount();
            $tp = $tr / $total_reg;
            $anterior = $pc - 1;
            $proximo = $pc + 1;
            if ($pc > 1) {
              echo "<td colspan='9'><a class='btn btn-success' href='?pagina=$anterior'>Anterior</a></td>";
            }
            if ($pc < $tr) {
              echo "<td colspan='9'><a class='btn btn-success' href='?pagina=$proximo'>Próxima</a></td>";
            }
            ?>
            <tr>
        </tfoot>
            </table>
        </div>

    </div>
</body>

</html>