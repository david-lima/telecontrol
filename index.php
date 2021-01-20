<?php	
	require_once(__DIR__.'/class/Login.php');
	
	$objConnection = new Connection();
	$objLogin = new Login();

?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Login</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body class="bg-dark">
  
    <div class="container">
    <?php
		if(isset($_POST["Enviar"]) && $_POST["Enviar"] == "Enviar"){
			$logar = $objLogin->Logar($_POST["email"],$_POST['senha']);
		}
		?>
		<br />
		<?php 
		if (isset($logar)){
		?>
			<div class="alert alert-danger">
				<?php echo $logar ?>
			</div>
		<?php } ?>
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Login</div>
        <div class="card-body">
          <form action="" method="POST">
            <div class="form-group">
              <div class="form-label-group">
                <input type="email" id="inputEmail" class="form-control" name="email" placeholder="E-mail" required="required" autofocus="autofocus">
                <label for="inputEmail">E-mail</label>
              </div>
            </div> 
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" id="inputPassword" name="senha" class="form-control" placeholder="Senha" required="required">
                <label for="inputPassword">Senha</label>
              </div>
            </div>
            <div class="form-group">
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="remember-me">
                  Remember Password
                </label>
              </div>
            </div>
            <input type="submit" value="Enviar" name="Enviar" class="btn btn-primary btn-block">
          </form>
          <div class="text-center">
            <a class="d-block small mt-3" href="/view/registrar.php">Quero me Cadastrar</a>
            <a class="d-block small" href="forgot-password.html">Esqueceu a Senha?</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>
</html>