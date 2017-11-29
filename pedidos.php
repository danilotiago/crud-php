<?php
require 'Database/DAO/DatabaseDAO.php';
require 'Models/Pedido.php';
require 'Database/Connection/get_health_connection.php';

$instancia = new Pedido();
$pedidos = $instancia->lists($health_connection);
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
        <li class="breadcrumb-item active">Pedidos</li>
      </ol>
      <!-- Icon Cards-->
        <!-- Example DataTables Card-->
        <a href="pedidos_novo.php" class="btn btn-primary" style="margin-bottom: 15px;">Cadastrar pedido</a>
        <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-table"></i> Pedidos</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                  <th>Cliente</th>
                  <th>Produto</th>
                  <th>Quantidade</th>
                  <th>Valor</th>
                  <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($pedidos as $key => $pedido): ?>
                    <tr>
                        <td><?= $pedido['nome_cliente'] ?></td>
                        <td><?= $pedido['nome_produto'] ?></td>
                        <td><?= $pedido['quantidade'] ?></td>
                        <td><?= $pedido['valor'] ?></td>
                        <td>
                            <a href="pedidos_alterar.php?id=<?=$pedido['id']?>">Editar</a> |
                            <a href="javascript:{}" onclick="document.getElementById('excluir-<?= $key ?>').submit();">Excluir</a>
                        </td>
                    </tr>

                    <form id="excluir-<?= $key ?>" method="POST" action="Controllers/PedidosController.php?deletar=true">
                        <input type="hidden" name="id" value="<?= $pedido['id'] ?>">
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
