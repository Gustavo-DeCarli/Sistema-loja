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
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js" integrity="sha256-cHVO4dqZfamRhWD7s4iXyaXWVK10odD+qp4xidFzqTI=" crossorigin="anonymous"></script>
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
        <div class="painel">
            <h1 class="titulo">Painel de controle</h1>
            <div class="teste">
                <?php
                include 'lib/stats.php'
                ?>
                <h4>Produtos X Categorias</h4>
                <h5>Produtos Cadastrados: <?php echo $prods ?> </h5>
                <h5>Categorias Cadastradas: <?php echo $cats ?> </h5>
            </div>
            <div class="grafchart">
                <h5>Mês Anterios X Mês Atual</h5>
                <canvas id="myChart">
                    <script>
                        let ctx = document.getElementById('myChart').getContext('2d');
                        let chart = new Chart(ctx, {
                            type: 'doughnut',
                            data: {
                                labels: ['Vendas mês anterior', 'Vendas mês atual'],
                                datasets: [{
                                    label: 'Nº de chamados',
                                    data: [<?php echo $valor2 ?>, <?php echo $valor1 ?>],
                                    backgroundColor: [
                                        'rgba(26, 150, 37, 1)',
                                        'rgba(202, 108, 0, 1)',
                                    ],
                                    borderColor: [
                                        'rgba(0,0,0, 1)'
                                    ],
                                    borderWidth: 0.5
                                }]
                            },
                            options: {
                                elements: {
                                    line: {
                                        tension: 0
                                    }
                                }
                            }
                        });
                    </script>
                </canvas>
            </div>
        </div>
    </div>
</body>

</html>