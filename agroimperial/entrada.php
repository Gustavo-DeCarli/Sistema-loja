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
    <nav class="main-menu">
        <ul class="mt-5">
            <li>
                <img src="images/logo.png">
            </li>
            <li>
                <a href="">
                    <i class="fa fa-home fa-2x mt-2"></i>
                    <span class="nav-text">
                        Dashboard
                    </span>
                </a>

            </li>
            <li class="has-subnav mt-2">
                <a href="#">
                    <i class="fa fa-laptop fa-2x mt-2"></i>
                    <span class="nav-text">
                        Stars Components
                    </span>
                </a>

            </li>
            <li class="has-subnav mt-2">
                <a href="#">
                    <i class="fa fa-list fa-2x mt-2"></i>
                    <span class="nav-text">
                        Forms
                    </span>
                </a>

            </li>
            <li class="has-subnav mt-2">
                <a href="#">
                    <i class="fa fa-folder-open fa-2x mt-2"></i>
                    <span class="nav-text">
                        Pages
                    </span>
                </a>

            </li>
            <li class='mt-2'>
                <a href="#">
                    <i class="fa fa-bar-chart-o fa-2x mt-2"></i>
                    <span class="nav-text">
                        Estatísticas
                    </span>
                </a>
            </li>
            <li class='mt-2'>
                <a href="#">
                    <i class="fa fa-font fa-2x mt-2"></i>
                    <span class="nav-text">
                        Quotes
                    </span>
                </a>
            </li>
            <li class='mt-2'>
                <a href="#">
                    <i class="fa fa-table fa-2x mt-2"></i>
                    <span class="nav-text">
                        Tables
                    </span>
                </a>
            </li>
            <li class='mt-2'>
                <a href="#">
                    <i class="fa fa-map-marker fa-2x mt-2"></i>
                    <span class="nav-text">
                        Maps
                    </span>
                </a>
            </li>
            <li class='mt-2'>
                <a href="#">
                    <i class="fa fa-info fa-2x mt-2"></i>
                    <span class="nav-text">
                        Documentation
                    </span>
                </a>
            </li>
        </ul>

        <ul class="logout">
            <li>
                <a href="#">
                    <i class="fa fa-power-off fa-2x mt-2"></i>
                </a>
            </li>
        </ul>
    </nav>


    <div class='inicio'>

        <div class="tabela position-absolute top-0 start-50 translate-middle-x">
            <nav class="navbar bg-light border rounded">
                <form action="admin.php" method='POST' class="container-fluid justify-content-start">
                    <div class="col-auto">
                        <select class="form-select" name="status">
                            <option value='' selected>Selecione o status</option>
                            <option value="Em Aberto">Em Aberto</option>
                            <option value="Em andamento">Em andamento</option>
                            <option value="Finalizado">Finalizado</option>
                        </select>
                    </div>
                    <div class="ms-2 col-auto">
                        <a>De:</a>
                    </div>
                    <div class="ms-2 col-auto">
                        <input class="form-control" name="data" type="date">
                    </div>
                    <div class="ms-2 col-auto">
                        <a>Até:</a>
                    </div>
                    <div class="ms-2 col-auto">
                        <input class="form-control" name="data2" type="date">
                    </div>
                    <div class="ms-2 col-auto">
                        <input class="btn btn-success" type="submit" value='Filtrar'>
                    </div>
                </form>
            </nav>
            <table class="table">
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
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>Mark</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                        <td>Mark</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="fixed-bottom rodape text-center p-0">
            © 2022 Copyright Gustavo de Carli
        </div>
    </div>
</body>

</html>