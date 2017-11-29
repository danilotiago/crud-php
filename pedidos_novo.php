<?php

require 'Database/DAO/DatabaseDAO.php';
require 'Models/Pedido.php';
require 'Database/Connection/get_health_connection.php';

$instancia = new Pedido();
$clientes = $instancia->listsClientes($health_connection);
$produtos = $instancia->listsProdutos($health_connection);
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
        <li class="breadcrumb-item">
          <a href="pedidos.php">Pedidos</a>
        </li>
        <li class="breadcrumb-item active">Novo pedido</li>
      </ol>
      <!-- Icon Cards-->
        <form method="POST" action="Controllers/PedidosController.php">

          <?php include('partials/form_pedidos.php') ?>

        <button type="submit" class="btn btn-primary">Salvar pedido</button>
      </form>
    </div>
</body>

</html>
