<?php
require_once('../class/Requisicao.php');

$objRequisicao = new Requisicao();
if (isset($_POST["Enviar"]) && $_POST["Enviar"] == "Cadastrar") {
  $resposta = $objRequisicao->AlteraRequisicao($_POST['cliente'], $_POST['responsavel'], $_POST['urgencia'], $_POST['situacao'], $_POST['data'], $_POST['descricao'], $_GET['id']);
}
$situacoes = $objRequisicao->getSituacoes();
$prioridade = $objRequisicao->getPrioridade();
$clientes = $objRequisicao->getClientes();
$usuarios = $objRequisicao->getUsuarios();
$requisicao = $objRequisicao->getOneRequisicao();
$MDO = $objRequisicao->getMDOVinculada();
$pecas = $objRequisicao->getPecasVinculada();



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
        if (isset($resposta)) {
          echo $resposta;
        } ?>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="telaInicio.php">Pagina Principal</a>
          </li>
          <li class="breadcrumb-item active">Requisição</li>
        </ol>

        <!-- Area Chart Example-->
        <div class="card mx-auto">
          <div class="card-header">Alteração de Requisições</div>
          <div class="card-body">
            <form action="" method="POST">

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="cliente">Cliente</label>
                  <select id="cliente" name="cliente" class="form-control">
                    <option value="0" selected>Selecione</option>
                    <?php foreach ($clientes  as  $row) {
                      if (!empty($row['id'])) {
                    ?>
                        <option <?= ($requisicao[0]['id_cliente'] == $row['id'] ? 'selected' : '') ?> value="<?= $row['id']; ?>"><?= $row['nome_social']; ?></option>

                    <?php
                      }
                    } ?>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="responsavel">Responsavel</label>
                  <select id="responsavel" name="responsavel" class="form-control">
                    <option value="0" selected>Selecione</option>
                    <?php foreach ($usuarios as  $row) {
                      if (!empty($row['id'])) {
                    ?>
                        <option <?= ($requisicao[0]['id_responsavel'] == $row['id'] ? 'selected' : '') ?> value="<?= $row['id']; ?>"><?= $row['nome']; ?></option>

                    <?php
                      }
                    } ?>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label for="urgencia">Urgencia</label>
                  <select id="urgencia" name="urgencia" class="form-control">
                    <option value="0" selected>Selecione</option>
                    <?php foreach ($prioridade as  $row) {
                      if (!empty($row['id'])) {
                    ?>
                        <option <?= ($requisicao[0]['id_prioridade'] == $row['id'] ? 'selected' : '') ?> value="<?= $row['id']; ?>"><?= $row['descricao']; ?></option>

                    <?php
                      }
                    } ?>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label for="situacao">Situação</label>
                  <select id="situacao" name="situacao" class="form-control">
                    <option value="0" selected>Selecione</option>
                    <?php foreach ($situacoes as  $row) {
                      if (!empty($row['id'])) {
                    ?>
                        <option <?= ($requisicao[0]['id_situacao'] == $row['id'] ? 'selected' : '') ?> value="<?= $row['id']; ?>"><?= $row['descricao']; ?></option>

                    <?php
                      }
                    } ?>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <label for="data">Data Prazo</label>
                  <input type="text" class="form-control" value='<?= date('d/m/Y', strtotime($requisicao[0]['data_cadastro'])) ?>' id="data" placeholder="Data Prazo" name="data">
                </div>
                <div class="form-group col-md-12">
                  <label for="descricao">Descrição</label>
                  <textarea style="min-height: 150px;" type="text" class="form-control" id="descricao" placeholder="Descrição" name="descricao"><?= $requisicao[0]['descricao'] ?></textarea>
                </div>
                <hr>
                <div class="table-responsive">
                  <table class="table table-bordered" id="" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Mão de Obra</th>
                        <th>Valor</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Mão de Obra</th>
                        <th>Valor</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php foreach ($MDO as  $row) {
                        if (!empty($row['descricao'])) {
                      ?>
                          <tr>
                            <td><?= $row['descricao']; ?></td>
                            <td>R$ <?= number_format($row['valor'], 2, ',', '.'); ?></td>
                          </tr>
                      <?php
                        }
                      } ?>
                    </tbody>
                  </table>
                </div>
                <hr>
                <div class="table-responsive">
                  <table class="table table-bordered" id="" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Peças Utilizadas</th>
                        <th>Nota Fiscal</th>
                        <th>Data Compra</th>
                        <th>Tensão</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Peças Utilizadas</th>
                        <th>Nota Fiscal</th>
                        <th>Data Compra</th>
                        <th>Tensão</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php foreach ($pecas as  $row) {
                        if (!empty($row['descricao'])) {
                      ?>
                          <tr>
                            <td><?= $row['descricao']; ?></td>
                            <td><?= $row['nota_fiscal']; ?></td>
                            <td><?= date('d/m/Y',strtotime($row['data_compra'])); ?></td>
                            <td><?= $row['tensao']; ?></td>
                          </tr>
                      <?php
                        }
                      } ?>
                    </tbody>
                  </table>
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