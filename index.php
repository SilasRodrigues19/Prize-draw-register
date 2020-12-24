<?php session_start();?> 
<!DOCTYPE html>
<html lang="en">
<?php
ob_start();
	
	require_once 'connect.php';

	if (isset($_POST['btn-submit'])):

		$erros = array();
		$login = mysqli_escape_string($connect, $_POST['user']);
		$senha = mysqli_escape_string($connect, $_POST['password']);

		if (empty($login) or empty($senha)):
			$erros[] = "<li> O campo login/senha precisa ser preenchido </li>";
		else:
			$sql = "SELECT login FROM usuarios
			WHERE login = '$login'";
			$resultado = mysqli_query($connect, $sql);

			if(mysqli_num_rows($resultado) > 0):

				$senha = md5($senha);
				$sql = "SELECT * FROM usuarios
				WHERE login = '$login' AND senha = '$senha'";
				$resultado = mysqli_query($connect, $sql);
				mysqli_close($connect);

					if (mysqli_num_rows($resultado) == 1): 
						$dados = mysqli_fetch_array($resultado);
						$_SESSION['logado'] = true;
						$_SESSION['id_usuario'] = $dados['id'];
                        ?>
                        <script>
                            window.location.href = 'home';
                        </script>
                        <?php
						
						

					else:
						$erros[] = "<li> Usuário e senha não conferem </li>";
					endif;

			else:
				$erros[] = "<li> Usuário não consta na base de dados </li>";
			endif;
		endif;
	endif;
	if (!isset($_POST['btn-submit'])):
        session_unset();
        session_destroy();
    endif;
	ob_end_flush();
?>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
	<link rel="stylesheet" href="css/login.css">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<title>Login</title>
	<link rel="shortcut icon" href="img/login.png">
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
               user: {
                minlength: 5,
                maxlength: 25,
                nameValidator: true,
                required: true            
               },
               password: {
                required: true,
                minlength: 6,
                maxlength: 25
               }
            },
            messages:{
             user: {
              required:"Informe seu usuário por gentileza",
              nameValidator:"Apenas letras e acentos"
             },
             password: {
              required:"Informe sua senha por gentileza"
             },
     
            }
        })
      });
  </script>


</head>
<body>
	<?php

	if(!empty($erros)):
		foreach ($erros as $erro):

		?>
			<div class="erroPHP"><?php echo "$erro"; ?></div>
		<?php
		endforeach;
	endif;

	?>
	<img src="img/task.svg" alt="Tasks" class="tasks">
	<div class="container">
		<div class="img">
			<img src="img/cel.svg" alt="Avatar">
		</div>
		<div class="login-container">
		    <div class="CapsLock"></div>
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" id="formLogin" method="POST">
				<img class="avatar" src="img/avatar.jpg" alt="Avatar">
				<h2>Welcome</h2>
				<div class="input-div one">
					<div class="i">
						<i class="fas fa-user"></i>
					</div>
					<div>
						<h5>User</h5>
						<input type="text" class="input" name="user" id="user">
					</div>
				</div>

				<div class="input-div two">
					<div class="i">
						<i class="fas fa-lock"></i>
					</div>
					<div>
						<h5>Password</h5>
						<input type="password" class="input" name="password" id="password" onkeypress="capLock(event)">
						<div class="error" id="divMayus" style="visibility:hidden">O CAPSLOCK foi ativado.</div> 
					</div>
				</div>

				<input type="submit" name="btn-submit" class="btn" value="Login">
				<!--<button class="btn" id="btn"><a href="#">Login</a></button>-->
				<a href="recuperar_senha" class="forgotPass" target="_blank">Forgot Password</a>
			</form>
		</div>
	</div>
	 <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="js/login.js"></script>
</body>
</html>