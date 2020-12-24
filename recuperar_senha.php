<!DOCTYPE html>
<html lang="pt_BR">
<?php
    if (isset($_POST['forgotPass'])):
    echo "<div class='flex-center'>Desculpe, essa função ainda não foi implementada.</div>";
    echo "<div class='flex-center'>Contate um administrador.</div>";
    endif;
?>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
	<link rel="stylesheet" href="css/login.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<title>Recuperar Senha</title>
	<link rel="shortcut icon" href="img/forgotpass.png">
	<!-- JQuery Plugin Script -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
	<!-- JQuery Validator -->
	<script src="js/jquery.validate.min.js"></script>
	<!-- Validator Messages -->
	<script src="js/localization/messages_pt_BR.js"></script>

	<script>
      jQuery(function ($) {

            $.validator.addMethod("nameValidator", function(value, element) {
                return this.optional(element) || /^[a-zA-ZÀ-ú]*$/.test(value);
            });


          $("#formLogin").validate({
            rules: {
               email: {
               	email: true,
                required: true            
               }
            },
            messages:{
             email: {
              required:"Informe seu email para receber a nova senha"
             },
     
            }
        })
      });
  </script>


</head>

<body>
	<img src="img/forgot.svg" alt="Tasks" class="tasks">
	<div class="container">
		<div class="img">
			<img src="img/tree.svg" alt="Avatar">
		</div>
		<div class="login-container">
			<form id="formLogin" method="POST">
				<img class="avatar" src="img/recover.svg" alt="Avatar">
				<h2>Type ur e-mail</h2><br>
				<div class="input-div one">
					<div class="i">
						<i class="fas fa-user"></i>
					</div>
					<div>
						<h5>Email</h5>
						<input type="text" class="input" name="email" id="email">
					</div>
				</div>

				<input type="submit" name="forgotPass" class="btn" value="Request Password Reset">
				<!--<button class="btn" id="btn"><a href="#">Login</a></button>-->
			</form>
		</div>
	</div>
	 <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="js/login.js"></script>
</body>
</html>