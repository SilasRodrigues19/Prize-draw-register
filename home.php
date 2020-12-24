<?php 
require_once 'connect.php';

session_start();

if (!isset($_SESSION['logado'])):
    header('Location: index');
    
endif;


$id = $_SESSION['id_usuario'];

$sql = "SELECT * FROM usuarios
WHERE id = '$id'";
$resultado = mysqli_query($connect, $sql);
$dados = mysqli_fetch_array($resultado);
mysqli_close($connect);
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <link rel="stylesheet" href="css/style.css">
    <title>Inicio</title>
    <link rel="shortcut icon" href="https://img.icons8.com/flat_round/2x/home.png">
  </head>
  <body>
    <p class="lead text-center"><strong>Olá, <span class="user-logado"><?php echo $dados['nome']; ?></span><br> Bem vindo ao gerenciador de sorteios.</strong></p>
    <a class="btn btn-primary btn-lg flex-center" href="logout">Deslogar</a>
    <div class="container-fluid">
         <div class="jumbotron flex-center">
           <h1 class="display-4">Cadastro de sorteios</h1>
           <p class="lead">Este é um sistema para gerenciar as skins sorteadas na live</p>
           <hr class="my-4">
           <a class="btn btn-primary btn-lg mb-2" href="cadastrar-sorteios-da-stream" role="button">Cadastrar Sorteio</a>
           <a class="btn btn-primary btn-lg mb-2" href="pesquisar-sorteios" role="button">Pesquisar Sorteios</a>
         </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
     
  </body>
</html>