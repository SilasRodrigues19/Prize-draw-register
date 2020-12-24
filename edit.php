<?php 
require_once 'connect.php';
session_start();
if (!isset($_SESSION['logado'])):
    header('Location: index');
endif;
$id = $_SESSION['id_usuario'];

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Editando Cadastro...</title>
    <link rel="shortcut icon" href="https://image.flaticon.com/icons/svg/181/181540.svg">
  </head>
   <style>
    body {
      background: linear-gradient(to bottom, rgba(255,255,255,0.15) 0%, rgba(0,0,0,0.15) 100%), radial-gradient(at top center, rgba(255,255,255,0.40) 0%, rgba(0,0,0,0.40) 120%) #989898;
 background-blend-mode: multiply,multiply;
      height: 100vw;
      overflow: hidden;
    }
    .img {
      background: url(https://cdn.pixabay.com/photo/2017/01/13/15/39/boredom-1977519_1280.png);
      position: relative;
      background-size: contain;
      height: 500px;
    }

  </style>
  <body>

    <div class="container">
          <div class="img"></div>
      <div class="row">
        <?php

          require_once "connect.php";
          $id = $_POST['id'];
          $nick = $_POST['nick'];
          $premio = $_POST['premio'];
          $preco = $_POST['preco'];
          $date = $_POST['data_sorteio'];

          $sql = "UPDATE `ganhadores`
          SET `nick` = '$nick', `premio` = '$premio', `preco` = '$preco', `data_sorteio` = '$date'
          WHERE cod_ganhador = $id";

        ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

        <?php

        if(mysqli_query($connect, $sql)) 
        {

          ?>
          <script>
            swal("Muito bem!", "Registro de sorteio alterado com sucesso\nVocê será redirecionado para página de listagem", "success");
            setTimeout(function(){location.href="pesquisar-sorteios"} , 7000);
          </script>
          <?php
        } 
        else
        {
          ?>
          <script>
            sweetAlert("Eita...", "Ocorreu um erro durante a alteração\nVocê será redirecionado para página de listagem", "error");
            setTimeout(function(){location.href="pesquisar-sorteios"} , 7000);
          </script>
          <?php
        }

        ?>

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