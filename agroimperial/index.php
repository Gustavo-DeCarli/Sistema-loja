<?php
session_start();
require 'lib/conn.php';
$connection = DB::getInstance();
if (isset($_POST['login'])) {
  $user = $_POST['user'];
  $pass = $_POST['pass'];
  $query = $connection->prepare("SELECT * FROM login WHERE user=:user");
  $query->bindParam(":user", $user, PDO::PARAM_STR);
  $query->execute();
  $result = $query->fetch(PDO::FETCH_ASSOC);
  if (!$result) {
    echo '<p class="alert alert-warning text-center error">Usuário Inválido!</p>';
  } else {
    if ($pass == $result['pass']) {
      $_SESSION['user_id'] = $result['id'];
      header('Location: painel.php');
      echo '<html> </html>';
    } else {
      echo '<p class="alert alert-warning text-center error">Senha ou usuário incorreto!</p>';
    }
  }
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
    <title>Agro Imperial</title>
</head>

<body class="backgr">
        <div class="container-fluid login-reg-panel bg-dark">
            <div class="register-info-box mt-5 textolado">
                <a class="text-light">Agro Imperial Casa Agrícola</a>
            </div>

            <div class="white-panel">
                <div class="login-show mt-5">
                    <form action="index.php" method="POST">
                    <h2>Login</h2>
                    <input type="text" name='user' id="user" placeholder="Usuário">
                    <input type="password" name='pass' id="pass" placeholder="Senha">
                    <input class='login' name='login' id="login" type="submit" value="Entrar">
                    </form>
                </div>
            </div>
        </div>
</body>

</html>