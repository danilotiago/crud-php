<?php
require 'Database/DAO/DatabaseDAO.php';
require 'Models/Cliente.php';
require 'Database/Connection/get_health_connection.php';

$instancia = new Cliente();
$clientes = $instancia->lists($health_connection);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Project</title>

  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <link href="vendor/css/sb-admin.css" rel="stylesheet">
</head>

<body>
    <div class="container" style="margin-top: 50px;">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Clientes</li>
      </ol>
      <!-- Icon Cards-->
        <!-- Example DataTables Card-->
        <a href="clientes_novo.php" class="btn btn-primary" style="margin-bottom: 15px;">Cadastrar cliente</a>
        <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-table"></i> Clientes</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                  <th>Nome</th>
                  <th>E-mail</th>
                  <th>Data cadastro</th>
                  <th>Tipo pagamento</th>
                  <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($clientes as $key => $cliente): ?>
                <tr>
                  <td><?= $cliente['nome'] ?></td>
                  <td><?= $cliente['email'] ?></td>
                  <td><?= $cliente['data_cadastro'] ?></td>
                  <td><?= $cliente['pagamento'] ?></td>
                    <td>
                        <a href="clientes_alterar.php?id=<?=$cliente['id']?>">Editar</a> |
                        <a href="javascript:{}" onclick="document.getElementById('excluir-<?= $key ?>').submit();">Excluir</a>
                    </td>
                </tr>

                    <form id="excluir-<?= $key ?>" method="POST" action="Controllers/ClientesController.php?deletar=true">
                        <input type="hidden" name="id" value="<?= $cliente['id'] ?>">
                    </form>
                <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
</body>

<script src="vendor/datatables/jquery.dataTables.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.js"></script>
<!-- Custom scripts for all pages-->
<script src="js/sb-admin.min.js"></script>
<!-- Custom scripts for this page-->
<script src="js/sb-admin-datatables.min.js"></script>

</html>
