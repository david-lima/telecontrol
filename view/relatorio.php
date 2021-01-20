<?php
require_once('../class/Requisicao.php');

$objLogin = new Requisicao();
$requisicao = $objLogin->getRequisicoes();
$valorTotal = $objLogin->getValorTotalAtendido();
$TotalReq = $objLogin->getCountReq();
$ReqAtendidas = $objLogin->getCountReqAtendidas();
$ReqNaoFinalizadas = $objLogin->getCountReqNaoFinalizadas();
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

    <a class="navbar-brand mr-1" href="index.html">Telecontrol</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
       
      </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow">
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
     
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="telaInicio.php">Pagina Principal</a>
          </li>
          <li class="breadcrumb-item active">Charts</li>
        </ol>
        <div class="row">
          <div class="col-lg-3">
            <div class="panel panel-info">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-md-6">
                    <i class="fa fa-comments fa-5x"></i>
                  </div>
                  <div class="col-md-6 text-right">
                    <p class="announcement-heading"><?=$TotalReq[0]['qtd']?></p>
                    <p class="announcement-text">Total Requisição</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="panel panel-success">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-md-6">
                    <i class="fa fa-check fa-5x"></i>
                  </div>
                  <div class="col-md-6 text-right">
                    <p class="announcement-heading"><?=$ReqAtendidas[0]['qtd']?></p>
                    <p class="announcement-text">Requisição Atendidas</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="panel panel-danger">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-md-6">
                    <i class="fa fa-tasks fa-5x"></i>
                  </div>
                  <div class="col-md-6 text-right">
                    <p class="announcement-heading"><?=$ReqNaoFinalizadas[0]['qtd'];?></p>
                    <p class="announcement-text">Requisição não finalizadas</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="panel panel-success">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-md-6">
                    <i class="fa fa-book-open fa-5x"></i>
                  </div>
                  <div class="col-md-6 text-right">
                    <p class="announcement-heading">R$ <?= number_format($valorTotal[0]['total'], 2, ',', '.')?></p>
                    <p class="announcement-text">Relatório do Valor Faturado</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Area Chart Example-->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Requisições
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Código</th>
                    <th>Cliente</th>
                    <th>Descrição</th>
                    <th>Situação</th>
                    <th>Responsavel</th>
                    <th>Prazo</th>
                    <th>Prioridade</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Código</th>
                    <th>Cliente</th>
                    <th>Descrição</th>
                    <th>Situação</th>
                    <th>Responsavel</th>
                    <th>Prazo</th>
                    <th>Prioridade</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php foreach ($requisicao as  $row) {
                    if (!empty($row['id'])) {
                  ?>
                      <tr>
                        <td> <a href="/view/alteraRequisicao.php?id=<?= $row['id']; ?>"> <?= $row['id']; ?></a></td>
                        <td><a href="/view/alteraRequisicao.php?id=<?= $row['id']; ?>"><?= $row['nome_social']; ?></a></td>
                        <td><a href="/view/alteraRequisicao.php?id=<?= $row['id']; ?>"><?= $row['descricao_req']; ?></a></td>
                        <td><a href="/view/alteraRequisicao.php?id=<?= $row['id']; ?>"><?= $row['descricao_sit']; ?></a></td>
                        <td><a href="/view/alteraRequisicao.php?id=<?= $row['id']; ?>"><?= $row['nome']; ?></a></td>
                        <td><a href="/view/alteraRequisicao.php?id=<?= $row['id']; ?>"><?= date('d/m/Y', strtotime($row['prazo'])); ?></a></td>
                        <td class="pri_<?= $row['descricao_pri']; ?>"><a href="/view/alteraRequisicao.php?id=<?= $row['id']; ?>"><?= $row['descricao_pri']; ?></a></td>
                      </tr>
                  <?php
                    }
                  } ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
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