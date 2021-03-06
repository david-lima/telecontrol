<?php
require_once('../class/Pecas.php');

$objPecas = new Pecas();
if (isset($_POST["Enviar"]) && $_POST["Enviar"] == "Cadastrar") {
  $msg = $objPecas->VincularPeca();
}
$cliente = $objPecas->getRequisicaes();
$pecas = $objPecas->getPecas();
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Telecontrol - Mini ERP</title>

  <!-- Bootstrap core CSS-->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="telaInicio.php">Telecontrol</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">

    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      < <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">

          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
        </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="telaInicio.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Tela Inicial</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Paginas</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Clientes:</h6>
          <a class="dropdown-item" href="listaClientes.php">Pesquisar Cliente</a>
          <a class="dropdown-item" href="cadastrarCliente.php">Cadastrar Cliente</a>

          <div class="dropdown-divider"></div>
          <h6 class="dropdown-header">Requisição:</h6>
          <a class="dropdown-item" href="telaInicio.php">Pesquisar Requisição</a>
          <a class="dropdown-item" href="cadastrarRequisicao.php">Cadastrar Requisição</a>
          <a class="dropdown-item" href="vincularMDOCliente.php">Vincula Mão de Obra</a>
          <a class="dropdown-item" href="vincularPecaCliente.php">Vincula Peças</a>
          <a class="dropdown-item" href="cadastrarMDO.php">Cadastrar Mão de Obra</a>
          <a class="dropdown-item" href="cadastrarPecas.php">Cadastrar Peças</a>

          <div class="dropdown-divider"></div>
          <h6 class="dropdown-header">Usuarios:</h6>
          <a class="dropdown-item" href="listaUsuarios.php">Pesquisar Usuarios</a>
          <a class="dropdown-item" href="cadastrarUsuarios.php">Cadastrar Usuarios</a>

        </div>
      </li>
      <li class="nav-item active">

      </li>

    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">
        <?php
        if (isset($msg)) {
          echo $msg;
        } ?>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="telaInicio.php">Pagina Principal</a>
          </li>
          <li class="breadcrumb-item active">Cadastro de Pecas</li>
        </ol>

        <!-- Area Chart Example-->
        <div class="card mx-auto">
          <div class="card-header">Cadastro de Peças</div>
          <div class="card-body">
            <form action="" method="POST">

              <div class="form-row">
        
              <div class="form-group col-md-6">
                  <label for="cliente">Requisicao</label>
                  <select id="cliente" name="req" disabled class="form-control">
                    <option value="0" selected>Selecione</option>
                    <?php foreach ($cliente  as  $row) {
                      if (!empty($row['id'])) {
                    ?>
                        <option <?= ($_GET['id'] == $row['id'] ? 'selected' : '') ?> value="<?= $row['id']; ?>"><?= $row['descricao']; ?></option>

                    <?php
                      }
                    } ?>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="peca">Peças</label>
                  <select id="peca" name="peca" class="form-control">
                    <option value="0" selected>Selecione</option>
                    <?php foreach ($pecas as  $row) {
                      if (!empty($row['id'])) {
                    ?>
                        <option value="<?= $row['id']; ?>"><?= $row['descricao']; ?></option>

                    <?php
                      }
                    } ?>
                  </select>
                </div>

              </div>

              <button type="reset" class="btn btn-danger">Cancelar</button>
              <input type="submit" name="Enviar" class="btn btn-primary" value="Cadastrar">

            </form>
          </div>
        </div>

       

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Teste  Telecontrol</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Você quer sair?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Você quer realmente sair do sistema?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-primary" href="../../logout.php">Quero Sair</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="../vendor/datatables/jquery.dataTables.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="../js/demo/datatables-demo.js"></script>

</body>

</html>