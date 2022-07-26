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
                <form action="categorias.php" method='POST' class="container-fluid justify-content-start">
                    <div class="col-auto">
                        <button id="novo" type="button" class="botao btn " data-bs-toggle="modal" data-bs-target="#exampleModal2">
                            Adicionar Produto 
                        </button>
                    </div>
                    <div class="ms-5 col-auto">
                        <input class="form-control" id='busca' name="busca" type="text" placeholder="Buscar por nome">
                    </div>
                    <div class="ms-2 col-auto">
                        <input class="buscar btn" name='buscar2' type="submit" value='Buscar'>
                    </div>
                    <div class="ms-2 col-auto">
                        <button class="buscar btn" name='limpa' type="button" value='Buscar'><a class='buscar' href='categorias.php'>Limpar Busca</a></button>
                    </div>
                </form>
            </nav>
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Categoria</th>
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
                    if (isset($_POST['busca'])) {
                    $b1 = $_POST['busca'];
                    if($_POST['busca'] == ''){
                        $stmt = $connection->query("SELECT * FROM categorias LIMIT $inicio,$total_reg");
                    }else{
                        $stmt = $connection->query("SELECT * FROM categorias WHERE nome='$b1' LIMIT $inicio,$total_reg");
                    }
                    }else{
                    $stmt = $connection->query("SELECT * FROM categorias LIMIT $inicio,$total_reg");
                    }
                    $stmt->setFetchMode(PDO::FETCH_ASSOC);
                    $dados11 = $stmt->fetchAll();
                    foreach ($dados11 as $cat) {
                    ?>
                        <tr>
                            <td><?php echo $cat['id'] ?></td>
                            <td><?php echo $cat['nomec'] ?></td>
                            <td><form action='lib/delcat.php' method='POST'><button id='idcat' name='idcat' class="btn btn-danger p-1" type='submit' value="<?php echo $cat['id']?>">Deletar</button></form></td>
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
                        if ($pc > 1) {
                            echo "<td class='fot' ></td>";
                            echo "<td class='fot' ></td>";
                            echo "<td class='fot' ><a class='btn btn-success' href='?pagina=$anterior'>Anterior</a></td>";
                        }
                        if ($pc < $tr) {
                            echo "<td class='fot' ><a class='btn btn-success' href='?pagina=$proximo'>Próxima</a></td>";
                        }
                        ?>
                    <tr>
                </tfoot>
            </table>
        </div>

    </div>

                            <!-- MODAL NOVA CATEGORIA -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nova Categoria</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="id"/>
          <div class="mb-3">
            <label for="cod" class="form-label">Nome da Categoria</label>
            <input type="text" class="form-control" id="nomecat" placeholder="Nome da Categoria">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
          <button id="salvar2" type="button" class="btn btn-success">Salvar</button>
        </div>

      </div>
    </div>
  </div>
  <script>
    const baseUrl = `//192.168.0.29/lib/`
    onload = async () => {
    modal2 = new bootstrap.Modal(document.getElementById('exampleModal2'))
    btnSalvar2 = document.getElementById("salvar2")
    btnSalvar2.addEventListener("click", async () => {

        const nomecat = document.getElementById("nomecat").value

        const body = new FormData()
        body.append('nomecat', nomecat)

        const response = await fetch(`${baseUrl}addcat.php`, {
            method: "POST",
            body
        })
        modal2.hide();
        window.location.href = "categorias.php"
    })}
  </script>
</body>
</html>