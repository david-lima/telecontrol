<?php
require_once('../class/Cliente.php');

$objCliente = new Cliente();
$clientes = $objCliente->getClientes($_GET['cliente']);

if(isset($_POST['altera'])){
  $atualiza = $objCliente->atualizaCliente();
  $clientes = $objCliente->getClientes($_GET['cliente']);
}
if(isset($_POST['Excluir'])){
  $atualiza = $objCliente->deleteCliente($_GET['cliente']);
}

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
        <?php
        if (isset($logar)) {
          echo $logar;
        } ?>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="telaInicio.php">Pagina Principal</a>
          </li>
          <li class="breadcrumb-item active">Charts</li>
        </ol>

        <!-- Area Chart Example-->
        <div class="card mx-auto">
          <div class="card-header">Alterar Clientes</div>
          <div class="card-body">
            <form action="" method="POST">
              <input type="hidden" class="form-control" id="altera" name="altera" value="1">
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="Nome">Nome</label>
                  <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" value="<?= $clientes[0]['nome'] ?>">
                </div>
                <div class="form-group col-md-4">
                  <label for="Sobrenome">Sobrenome</label>
                  <input type="text" class="form-control" id="sobrenome" name="sobrenome" placeholder="Sobrenome" value="<?= $clientes[0]['sobrenome'] ?>">
                </div>
                <div class="form-group col-md-4">
                  <label for="Social">Nome Social</label>
                  <input type="text" class="form-control" id="nomesocial" name="nomesocial" placeholder="Nome Social" value="<?= $clientes[0]['nome_social'] ?>">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="Endereço">Endereço</label>
                  <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Endereço" value="<?= $clientes[0]['endereco'] ?>">
                </div>
                <div class="form-group col-md-3">
                  <label for="Bairro">Bairro</label>
                  <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro" value="<?= $clientes[0]['bairro'] ?>">
                </div>
                <div class="form-group col-md-3">
                  <label for="Número">Número</label>
                  <input type="text" class="form-control" id="numero" name="numero" placeholder="Número" value="<?= $clientes[0]['numero'] ?>">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="inputCity">Cidade</label>
                  <input type="text" class="form-control" id="cidade" name="cidade" value="<?= $clientes[0]['cidade'] ?>">
                </div>
                <div class="form-group col-md-3">
                  <label for="Referencia">Referencia</label>
                  <input type="text" class="form-control" id="referencia" name="referencia" value="<?= $clientes[0]['referencia'] ?>">
                </div>
                <div class="form-group col-md-4">
                  <label for="estado">Estado</label>
                  <select id="estado" name="estado" class="form-control">
                    <option value="AC">Acre</option>
                    <option value="AL">Alagoas</option>
                    <option value="AP">Amapá</option>
                    <option value="AM">Amazonas</option>
                    <option value="BA">Bahia</option>
                    <option value="CE">Ceará</option>
                    <option value="DF">Distrito Federal</option>
                    <option value="ES">Espírito Santo</option>
                    <option value="GO">Goiás</option>
                    <option value="MA">Maranhão</option>
                    <option value="MT">Mato Grosso</option>
                    <option value="MS">Mato Grosso do Sul</option>
                    <option value="MG">Minas Gerais</option>
                    <option value="PA">Pará</option>
                    <option value="PB">Paraíba</option>
                    <option value="PR">Paraná</option>
                    <option value="PE">Pernambuco</option>
                    <option value="PI">Piauí</option>
                    <option value="RJ">Rio de Janeiro</option>
                    <option value="RN">Rio Grande do Norte</option>
                    <option value="RS">Rio Grande do Sul</option>
                    <option value="RO">Rondônia</option>
                    <option value="RR">Roraima</option>
                    <option value="SC">Santa Catarina</option>
                    <option value="SP">São Paulo</option>
                    <option value="SE">Sergipe</option>
                    <option value="TO">Tocantins</option>
                    <option value="ES">Estrangeiro</option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <label for="CEP">CEP</label>
                  <input type="text" class="form-control" id="cep" name="cep" value="<?= $clientes[0]['cep'] ?>">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-2">
                  <label for="inputEmail4">E-mail</label>
                  <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="<?= $clientes[0]['email'] ?>">
                </div>
                <div class="form-group col-md-3">
                  <label for="CNPJ">CNPJ</label>
                  <input type="text" class="form-control" id="cnpj" placeholder="CNPJ" name="cnpj" value="<?= $clientes[0]['cnpj'] ?>">
                </div>
                <div class="form-group col-md-3">
                  <label for="CPF">CPF</label>
                  <input type="text" class="form-control" id="cpf" placeholder="CPF" name="cpf" value="<?= $clientes[0]['cpf'] ?>">
                </div>
                <div class="form-group col-md-2">
                  <label for="Telefone">Telefone</label>
                  <input type="text" class="form-control" id="telefone" placeholder="Telefone" name="telefone" value="<?= $clientes[0]['telefone'] ?>">
                </div>
                <div class="form-group col-md-2">
                  <label for="Celular">Celular</label>
                  <input type="text" class="form-control" id="celular" placeholder="Celular" name="celular" value="<?= $clientes[0]['celular'] ?>">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="layout">Importância</label>
                  <select id="layout" name="layout" class="form-control">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="descricao">Descrição</label>
                  <input type="text" class="form-control" id="descricao" name="descricao" value="<?= $clientes[0]['descricao'] ?>">
                </div>
                <div class="form-group col-md-3">
                  <label for="CEP">Valor</label>
                  <input type="text" class="form-control" id="valor" name="valor" value="<?= $clientes[0]['valor'] ?>">
                </div>
              </div>
              <input type="submit" name="Excluir" class="btn btn-danger" value="Excluir">
              <input type="submit" name="Enviar" class="btn btn-primary" value="Alterar">

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