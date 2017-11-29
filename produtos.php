<?php
require 'Database/DAO/DatabaseDAO.php';
require 'Models/Produto.php';
require 'Database/Connection/get_health_connection.php';

$instancia = new Produto();
$produtos = $instancia->lists($health_connection);
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
        <li class="breadcrumb-item active">Produtos</li>
      </ol>
      <!-- Icon Cards-->
        <!-- Example DataTables Card-->
        <a href="produtos_novo.php" class="btn btn-primary" style="margin-bottom: 15px;">Cadastrar produto</a>
        <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-table"></i> Clientes</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Valor</th>
                  <th>Descrição</th>
                  <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($produtos as $key => $produto): ?>
                <tr>
                  <td><?= $produto['nome'] ?></td>
                  <td><?= $produto['valor'] ?></td>
                  <td><?= $produto['descricao'] ?></td>
                  <td>
                      <a href="produtos_alterar.php?id=<?=$produto['id']?>">Editar</a> |
                      <a href="javascript:{}" onclick="document.getElementById('excluir-<?= $key ?>').submit();">Excluir</a>
                  </td>
                </tr>

                <form id="excluir-<?= $key ?>" method="POST" action="Controllers/ProdutosController.php?deletar=true">
                    <input type="hidden" name="id" value="<?= $produto['id'] ?>">
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
