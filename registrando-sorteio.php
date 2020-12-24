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
    <title>Cadastrando...</title>
    <link rel="shortcut icon" href="https://www.flaticon.com/br/premium-icon/icons/svg/3230/3230467.svg">
  </head>
  <style>
    body {
      background-image: linear-gradient(to top, #c1dfc4 0%, #deecdd 100%);
      height: 100vw;
      overflow: hidden;
    }
    .img {
      background: url(https://cdn.pixabay.com/photo/2013/07/13/12/15/hand-159474_1280.png);
      background-repeat: no-repeat;
      position: relative;
      background-size: contain;
      height: 500px;
      left: 26%;
    }
  </style>
  </style>
  <body>

    <div class="container">
        <div class="img"></div>
      <div class="row">
        <?php

          require_once "connect.php";

          $nick = $_POST['nick'];
          $premio = $_POST['premio'];
          $preco = $_POST['preco'];
          $date = $_POST['data_sorteio'];

          $sql = "INSERT INTO `ganhadores`
          (`nick`, `premio`, `preco`, `data_sorteio`) 
          VALUES ('$nick', '$premio', '$preco', '$date')";

        
        ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

        <?php

        if(mysqli_query($connect, $sql)) 
        {

          ?>
          <script>
            swal("Muito bem!", "Registro de sorteio cadastrado com sucesso\nVocê será redirecionado para página inicial", "success");
            setTimeout(function(){location.href="home"} , 7000);
          </script>
          <?php
        } 
        else
        {
          ?>
          <script>
            sweetAlert("Eita...", "Ocorreu um erro durante o cadastro\nVocê será redirecionado para página inicial", "error");
            setTimeout(function(){location.href="home"} , 7000);
          </script>
          <?php
        }
          mysqli_close($connect);
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