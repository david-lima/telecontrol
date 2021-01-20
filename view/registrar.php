<?php 
  require_once('../class/Login.php');
  
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

    <title>SB Admin - Register</title>

    <!-- Bootstrap core CSS-->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin.css" rel="stylesheet">

  </head>

  <body class="bg-dark">

    <div class="container">
    <?php
    if(isset($_POST["Enviar"]) && $_POST["Enviar"] == "Enviar"){
      $logar = $objLogin->registrarUsuario($_POST["nome"],$_POST['sobrenome'],$_POST['email'],$_POST['senha']);
    }
    ?>
    <br />
    <?php 
    if (isset($logar)){
     echo $logar ;
       } ?>
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Registrar uma conta</div>
        <div class="card-body">
          <form action="" method="POST">
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="text" id="firstName" class="form-control" name="nome" placeholder="Nome" required="required" autofocus="autofocus">
                    <label for="firstName">Nome</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="text" id="lastName" class="form-control" name="sobrenome" placeholder="Sobrenome" required="required">
                    <label for="lastName">Sobrenome</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="email" id="inputEmail" class="form-control" name="email" placeholder="E-mail" required="required">
                <label for="inputEmail">E-mail</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="password" id="inputPassword" class="form-control" name="senha" placeholder="Senha" required="required">
                    <label for="inputPassword">Senha</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="password" id="confirmPassword" class="form-control" name="confirmaSenha" placeholder="Confirmar Senha" required="required">
                    <label for="confirmPassword">Confirmar Senha</label>
                  </div>
                </div>
              </div>
            </div>
            <input name="Enviar" value="Enviar" type="submit" class="btn btn-primary btn-block">
          </form>
          <div class="text-center">
            <a class="d-block small mt-3" href="../../index.php">Pagina de Login</a>
            <a class="d-block small" href="forgot-password.html">Esqueceu a Senha?</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>

</html>
