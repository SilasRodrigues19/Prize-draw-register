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
    <!-- Animate CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.0/animate.min.css">
    <link rel="stylesheet" href="css/table_style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Pesquisar</title>
    <link rel="shortcut icon" href="https://img.icons8.com/color/2x/search.png">
  </head>
  <body class="ex_highlight_row">

    <?php

      $pesquisa = $_POST['busca'] ?? '';


      require_once "connect.php";
      require_once "show_date.php";

      $sql = "SELECT * FROM ganhadores
      WHERE nick LIKE '%$pesquisa%'";

       $sql = "SELECT * FROM ganhadores
      WHERE premio LIKE '%$pesquisa%'";

      $dados = mysqli_query($connect, $sql);
      mysqli_close($connect);

      ?>

    <div class="container">
      <div class="row">
        <div class="col">
          <h1>Lista de Sorteios</h1>
          
          <table id="sorter" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th scope="col">Ganhador/Nick</th>
                <th scope="col">Prêmio(s)</th>
                <th scope="col">Preço</th>
                <th scope="col">Data de Sorteio</th>
                <th scope="col">Ações</th>
              </tr>
            </thead>
            <tbody>

                <?php 

                while ($linha = mysqli_fetch_assoc($dados)) 
                  {

                    $cod_ganhador = $linha['cod_ganhador'];
                    $nick = $linha['nick'];
                    $premio = $linha['premio'];
                    $preco = $linha['preco'];
                    $data_sorteio = $linha['data_sorteio'];
                    $data_sorteio = show_date($data_sorteio);

                    echo "<tr>
                            <th scope='row'>$nick</th>
                            <td>$premio</td>
                            <td>$preco</td>
                            <td>$data_sorteio</td>
                            <td><a href='editar-sorteios-da-stream?id=$cod_ganhador' class='btn'><img class='edit-btn' src='https://img.icons8.com/fluent-systems-filled/2x/edit-property.png' widht='25px' height='25px'></a>

                            </td>
                          </tr>";
                  }

              ?>

            </tbody>
          </table>
          
          <a href="home" class="btn btn-info">Início</a>
          <img src="<img src='https://img.icons8.com/officel/2x/pencil.png'>" width="" height="" alt="">
          <hr class="btn-hr">
        </div>
      </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.10.11/i18n/Portuguese-Brasil.json"></script>

    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

  </body>
</html>