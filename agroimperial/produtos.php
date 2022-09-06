<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    echo '<script type="text/javascript">';
    echo 'alert("Login necessário");';
    echo 'window.location.href = "index.php";';
    echo '</script>';
    exit;
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

        <div class="tabela position-absolute top-0 start-50 translate-middle-x">


            <nav class="navbar bg-light border rounded">
                <form action="produtos.php" method='GET' class="container-fluid justify-content-start">
                    <div class="col-auto">
                        <button style="width:100px;" id="novo" type="button" class="botao btn " data-bs-toggle="modal" data-bs-target="#exampleModal1">
                            Adicionar
                        </button>
                    </div>
                    <div class="ms-2 col-auto">
                        <input style="width:125px;" class="form-control" name="buscacod" type="text" placeholder="Buscar código">
                    </div>
                    <div class="ms-2 col-auto">
                        <input class="buscar btn" name='buscar1' type="submit" value='Buscar'>
                    </div>
                    <div class="ms-2 col-auto">
                        <input style="width:125px;" class="form-control" name="busca" type="text" placeholder="Buscar nome">
                    </div>
                    <div class="ms-2 col-auto">
                        <input class="buscar btn" name='buscar2' type="submit" value='Buscar'>
                    </div>
                    <div class="ms-2 col-auto">
                        <select style="width:125px;" class="form-select" name="buscacat">
                            <option value="">Categoria</option>
                            <?php
                            require 'lib/conn.php';
                            $connection = DB::getInstance();
                            $stmt = $connection->query("SELECT * from categorias");
                            $stmt->setFetchMode(PDO::FETCH_ASSOC);
                            $cat = $stmt->fetchAll();
                            foreach ($cat as $cats) {
                            ?>
                                <option value="<?php echo $cats['id'] ?>"><?php echo $cats['nomec'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="ms-2 col-auto">
                        <input class="buscar btn" name='buscar3' type="submit" value='Buscar'>
                    </div>
                    <div class="ms-2 col-auto">
                        <input style="width:70px;" class="form-control" name="per" type="number" placeholder="De">
                    </div>
                    <div class="ms-2 col-auto">
                        <input style="width:70px;" class="form-control" name="per2" type="number" placeholder="Até">
                    </div>
                    <div class="ms-2 col-auto">
                        <input class="buscar btn" name='buscar5' type="submit" value='Buscar'>
                    </div>
                </form>
            </nav>
            <table class="table align-middle">
                <thead>
                    <tr class='text-center'>
                        <th scope="col">Código</th>
                        <th scope="col">Produto</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Estoque</th>
                        <th scope="col">Preço de custo</th>
                        <th scope="col">Preço de venda</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
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
                    if (isset($_GET['buscacod']) or isset($_GET['busca']) or isset($_GET['buscacat']) or isset($_GET['per']) or isset($_GET['per2'])) {
                        $b1 = $_GET['buscacod'];
                        $b2 = $_GET['busca'];
                        $b3 = $_GET['buscacat'];
                        $b4 = $_GET['per'];
                        $b5 = $_GET['per2'];
                        if ($b1 != '') {
                            $stmt = $connection->query("SELECT produtos.cod, produtos.nome, produtos.estoque, produtos.valor, produtos.valorv, categorias.nomec as cat from produtos, categorias where categorias.id=produtos.cat AND produtos.cod='$b1' ORDER BY produtos.cod DESC LIMIT $inicio,$total_reg");
                        } elseif ($b2 != '') {
                            $stmt = $connection->query("SELECT produtos.cod, produtos.nome, produtos.estoque, produtos.valor, produtos.valorv, categorias.nomec as cat from produtos, categorias where categorias.id=produtos.cat AND produtos.nome LIKE '%$b2%' ORDER BY produtos.cod DESC LIMIT $inicio,$total_reg");
                        } elseif ($b3 != '') {
                            $stmt = $connection->query("SELECT produtos.cod, produtos.nome, produtos.estoque, produtos.valor, produtos.valorv, categorias.nomec as cat from produtos, categorias where categorias.id=produtos.cat AND produtos.cat='$b3' ORDER BY produtos.cod DESC LIMIT $inicio,$total_reg");
                        } elseif ($b2 == '' & $b1 == '' & $b3 == '' & $b4 == '' & $b5 == '') {
                            $stmt = $connection->query("SELECT produtos.cod, produtos.nome, produtos.estoque, produtos.valor, produtos.valorv, categorias.nomec as cat from produtos, categorias where categorias.id=produtos.cat ORDER BY produtos.cod DESC LIMIT $inicio,$total_reg");
                        } elseif ($b4 != '' & $b5 != '') {
                            $stmt = $connection->query("SELECT produtos.cod, produtos.nome, produtos.estoque, produtos.valor, produtos.valorv, categorias.nomec as cat from produtos, categorias where categorias.id=produtos.cat AND produtos.cod BETWEEN $b4 AND $b5 ORDER BY produtos.cod DESC LIMIT $inicio,$total_reg");
                        }
                    } else {
                        $stmt = $connection->query("SELECT produtos.cod, produtos.nome, produtos.estoque, produtos.valor, produtos.valorv, categorias.nomec as cat from produtos, categorias where categorias.id=produtos.cat ORDER BY produtos.cod DESC LIMIT $inicio,$total_reg");
                    }
                    $stmt->setFetchMode(PDO::FETCH_ASSOC);
                    $dados11 = $stmt->fetchAll();
                    foreach ($dados11 as $loja) {
                    ?>
                        <tr class='text-center'>
                            <td><?php echo $loja['cod'] ?></td>
                            <td><?php echo $loja['nome'] ?></td>
                            <td><?php echo $loja['cat'] ?></td>
                            <td><?php echo $loja['estoque'] ?></td>
                            <td>R$<?php echo $loja['valor'] ?></td>
                            <td>R$<?php echo $loja['valorv'] ?></td>
                            <td>
                                <form action='edita.php' method='POST'><button class="btn btn-danger p-1" name="edit" id="edit" type='submit' value="<?php echo $loja['cod'] ?>">Editar</button></form>
                            </td>
                            <td>
                                <form action='lib/delprod.php' method='POST'><button class="btn btn-danger p-1" name="idprod" id="idprod" type='submit' value="<?php echo $loja['cod'] ?>">Deletar</button></form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <?php
                        $tr = $stmt->rowCount();
                        $tp = $tr / $total_reg;
                        $anterior = $pc - 1;
                        $proximo = $pc + 1;
                        if(isset($_GET['buscacod']) or isset($_GET['buscac']) or isset($_GET['buscacat']) or isset($_GET['per']) or isset($_GET['per2'])){
                            $buscacod = $_GET['buscacod'];
                            $busca = $_GET['busca'];
                            $buscacat = $_GET['buscacat'];
                            $per = $_GET['per'];
                            $per2 = $_GET['per2'];
                        }
                        if ($pc > 1) {
                            echo "<td class='fot' ></td>";
                            echo "<td class='fot' ></td>";
                            if(isset($_GET['buscacod']) or isset($_GET['buscac']) or isset($_GET['buscacat']) or isset($_GET['per']) or isset($_GET['per2'])){
                            echo "<td class='fot' ><a class='btn btn-success' href='?pagina=$anterior&buscacod=$buscacod&busca=$busca&buscacat=$buscacat&per=$per&per2=$per2'>Anterior</a></td>";
                            }else{
                                echo "<td class='fot' ><a class='btn btn-success' href='?pagina=$anterior'>Anterior</a></td>";
                            }
                        }
                        if ($pc < $tr) {
                            if(isset($_GET['buscacod']) or isset($_GET['buscac']) or isset($_GET['buscacat']) or isset($_GET['per']) or isset($_GET['per2'])){
                                echo "<td class='fot' ><a class='btn btn-success' href='?pagina=$proximo&buscacod=$buscacod&busca=$busca&buscacat=$buscacat&per=$per&per2=$per2'>Próxima</a></td>";
                            }else{
                                echo "<td class='fot' ><a class='btn btn-success' href='?pagina=$proximo'>Próxima</a></td>";   
                            }
                        }
                        ?>
                    <tr>
                </tfoot>
            </table>
        </div>

    </div>


    <!-- MODAL NOVO PRODUTO -->
    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Novo Produto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id" />

                    <div class="mb-3">
                        <label for="cod" class="form-label">Código do Produto</label>
                        <input type="text" class="form-control" id="cod" placeholder="Código do Produto">
                    </div>
                    <div class="mb-3">
                        <label for="nomeprod" class="form-label">Nome do Produto</label>
                        <input type="text" class="form-control" id="nomeprod" placeholder="Nome do Produto">
                    </div>
                    <div class="mb-3">
                        <label for="catprod" class="form-label">Categoria</label>
                        <select class="form-control" name="catprod" id="catprod">
                            <option value=''>Selecione uma categoria</option>
                            <?php
                            $connection = DB::getInstance();
                            $stmt2 = $connection->query("SELECT * FROM categorias");
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
                        <input type="number" class="form-control" id="estoque" placeholder="Quantidade em Estoque">
                    </div>
                    <div class="mb-3">
                        <label for="valorprod" class="form-label">Preço de custo</label>
                        <input type="number" step=0.01 class="form-control" id="valorprod" placeholder="Valor do Produto">
                    </div>
                    <div class="mb-3">
                        <label for="valorv" class="form-label">Preço de venda</label>
                        <input type="number" step=0.01 class="form-control" id="valorv" placeholder="Valor do Produto">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button id="salvar1" type="button" class="btn btn-success">Salvar</button>
                </div>

            </div>
        </div>
    </div>

    <script>
        const baseUrl = `//localhost/agroimperial/lib/`
        onload = async () => {
            modal1 = new bootstrap.Modal(document.getElementById('exampleModal1'))
            btnSalvar1 = document.getElementById("salvar1")
            btnSalvar1.addEventListener("click", async () => {

                const cod = document.getElementById("cod").value
                const nomeprod = document.getElementById("nomeprod").value
                const catprod = document.getElementById("catprod").value
                const estoque = document.getElementById("estoque").value
                const valorprod = document.getElementById("valorprod").value
                const valorv = document.getElementById("valorv").value

                const body = new FormData()
                body.append('cod', cod)
                body.append('nomeprod', nomeprod)
                body.append('catprod', catprod)
                body.append('estoque', estoque)
                body.append('valorprod', valorprod)
                body.append('valorv', valorv)

                const response = await fetch(`${baseUrl}addprod.php`, {
                    method: "POST",
                    body
                })
                modal1.hide();
                window.location.href = "produtos.php"
            })
        }
    </script>
</body>

</html>