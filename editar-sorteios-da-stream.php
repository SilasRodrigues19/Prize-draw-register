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
    <link rel="stylesheet" href="css/style.css">
    <title>Editar Cadastro</title>
    <link rel="shortcut icon" href="https://image.flaticon.com/icons/svg/1159/1159633.svg">
    <!-- JQuery Plugin Script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <!-- JQuery Compatible with JQuery Mask-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!-- JQuery Validator -->
    <script src="js/jquery.validate.min.js"></script>
    <!-- Mask Plugin JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <!-- Validator Messages -->
    <script src="js/localization/messages_pt_BR.js"></script>

      <script>
    jQuery(function ($) {

          $.validator.addMethod("alphabetsnspace", function(value, element) {
                return this.optional(element) || /^[a-zA-ZÀ-ú' ]*$/.test(value);
            });
          $.validator.addMethod("nicknspace", function(value, element) {
              return this.optional(element) || /^[a-zA-Z0-9 _]*$/.test(value);
          });
          $.validator.addMethod("sorter", function(value, element) {
              return this.optional(element) || /^[a-zA-ZÀ-ú +]*$/.test(value);
          });


        $("#formSorteios").validate({
          rules: {
             nick: {
              nicknspace: true,
              minlength: 2,
              maxlength: 15,
              required: true            

             },
             premio: {
              required: true,
              minlength: 3,
              maxlength: 25,
              sorter: true
             },
             preco: {
              required: true,
              maxlength: 4
             },
             data_sorteio: {
              required: true,
             }
          },
          messages:{
             nick: {
              required:"Por favor, informe o nick do ganhador",
              nicknspace: "Não faça uso de acentos nem símbolos (somente letras e underline)"
             },
             premio: {
              required:"Por favor, informe o(s) prêmio(s) ganho(s)",
              sorter: "Não faça uso de símbolos (somente sinal de + e letras)"
             },
             preco: {
              required:"Por favor, informe o preço dos prêmios",
              maxlength:"Valor de prêmio com mais de 4 dígitos?"
             },
             data_sorteio: {
              required:"Por favor, informe a data do sorteio"
             },
     
            }
        })
      });
  </script>

  </head>
  <body>

    <?php

      require_once "connect.php";
      $id = $_GET['id'] ?? '';
      $sql = "SELECT * FROM ganhadores
      WHERE cod_ganhador = $id";

      $dados = mysqli_query($connect, $sql);
      $linha = mysqli_fetch_assoc($dados);
      mysqli_close($connect);

    ?>

    <div class="container">
      <div class="row">
        <div class="col">
          <h1>Cadastros</h1>
          <form action="edit" method="POST" id="formSorteios">
            <div class="form-group">
                <label for="nick">Nickname</label>
                <input type="text" class="form-control" id="nick" name="nick" value="<?php echo $linha['nick']; ?>">
            </div>
            <div class="form-group">
                <label for="premio">Prêmio</label>
                <input type="text" class="form-control" id="premio" name="premio" value="<?php echo $linha['premio']; ?>">
            </div>
            <div class="form-group">
                <label for="preco">Preço</label>
                <input type="text" class="form-control" id="preco" name="preco" value="<?php echo $linha['preco']; ?>">
            </div>
            <div class="form-group">
                <label for="nome">Data do sorteio</label>
                <input type="date" class="form-control" id="data_sorteio" name="data_sorteio" value="<?php echo $linha['data_sorteio']; ?>" min="2020-01-01" max="2020-12-31">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success" value="Salvar">
                <input type="hidden" name="id" value="<?php echo $linha['cod_ganhador']; ?>">
                <a href="home" class="btn btn-info">Início</a>
            </div>
          </form>
        
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="js/script.js"></script>
  </body>
</html>