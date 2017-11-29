<?php
require 'Database/DAO/DatabaseDAO.php';
require 'Models/Produto.php';
require 'Database/Connection/get_health_connection.php';

$instancia = new Produto();
$produto = $instancia->get($health_connection, $_GET['id']);

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
            <a href="produtos.php">Produtos</a>
        </li>
        <li class="breadcrumb-item active">Novo produto</li>
    </ol>
    <!-- Icon Cards-->
    <form method="POST" action="Controllers/ProdutosController.php?alterar=true" enctype="multipart/form-data">

        <?php include('partials/form_produtos.php') ?>

        <input type="hidden" name="id" value="<?= $produto['id'] ?>">

        <button type="submit" class="btn btn-warning">Alterar produto</button>
    </form>
</div>
</body>

</html>
