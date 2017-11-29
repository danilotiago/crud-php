<?php

require '../Database/DAO/DatabaseDAO.php';
require '../Models/Pedido.php';
require '../Validation/validations.php';
require '../Database/Connection/get_health_connection.php';

// simula o roteamento da aplicacao de acordo com o recurso que o solicitou
include '../Redirecionamentos/redirecionamentos.php';
executaRedirecionamentos($health_connection);

function alterarPedido($connection)
{
    $data = [
        $_POST['id_cliente'],
        $_POST['id_produto'],
        $_POST['quantidade'],
        $_POST['valor']
    ];

    if(!valida_dados_vazios($data) )
    {
        header("location:javascript://history.go(-1)");
    }

    $class = new ReflectionClass('Pedido');
    $pedido = $class->newInstanceArgs($data);
    $pedido->setId($_POST['id']);

    $success = $pedido->update($connection);

    if($success)
    {
        header('Location: ../pedidos.php');
    }
    else
    {
        header("location:javascript://history.go(-1)");
    }
}

function deletarPedido($connection)
{
    $instancia = new Pedido();
    $success = $instancia->delete($connection, $_POST['id']);

    if($success)
    {
        header('Location: ../pedidos.php');
    }
    else
    {
        header("location:javascript://history.go(-1)");
    }
}

function adicionaPedido($connection)
{
    $data = [
        $_POST['id_cliente'],
        $_POST['id_produto'],
        $_POST['quantidade'],
        $_POST['valor']
    ];

    // valida dados
    if(!valida_dados_vazios($data) )
    {
        echo "<script>alert('Dados inválidos. Preencha todos os campos');window.history.back();</script>";
        die();
    }

    // instancia classe com o array de dados
    $class = new ReflectionClass('Pedido');
    $pedido = $class->newInstanceArgs($data);

    $success = $pedido->create( $connection );

    if($success)
    {
        header('Location: ../pedidos.php');
    }
    else
    {
        echo "<script>alert('Falha ao inserir pedido, tente novamente');window.history.back();</script>";
        die();
    }
}


