<?php

require '../Database/DAO/DatabaseDAO.php';
require '../Models/Cliente.php';
require '../Validation/validations.php';
require '../Database/Connection/get_health_connection.php';

// simula o roteamento da aplicacao de acordo com o recurso que o solicitou
include '../Redirecionamentos/redirecionamentos.php';
executaRedirecionamentos($health_connection);

function alterarCliente($connection)
{
    $data = [
        $_POST['nome'],
        $_POST['email'],
        $_POST['data_cadastro'],
        $_POST['pagamento_id']
    ];

    if(!valida_dados_vazios($data) )
    {
        header("location:javascript://history.go(-1)");
    }

    $class = new ReflectionClass('Cliente');
    $cliente = $class->newInstanceArgs($data);
    $cliente->setId($_POST['id']);

    $success = $cliente->update($connection);

    if($success)
    {
        header('Location: ../clientes.php');
    }
    else
    {
        header("location:javascript://history.go(-1)");
    }
}

function deletarCliente($connection)
{
    $instancia = new Cliente();
    $success = $instancia->delete($connection, $_POST['id']);

    if($success)
    {
        header('Location: ../clientes.php');
    }
    else
    {
        header("location:javascript://history.go(-1)");
    }
}

function adicionaCliente($connection)
{
    $data = [
        $_POST['nome'],
        $_POST['email'],
        $_POST['data_cadastro'],
        $_POST['pagamento_id']
    ];

    // valida dados
    if(!valida_dados_vazios($data) )
    {
        echo "<script>alert('Dados inválidos. Preencha todos os campos');window.history.back();</script>";
        die();
    }

    // instancia classe com o array de dados
    $class = new ReflectionClass('Cliente');
    $cliente = $class->newInstanceArgs($data);

    $success = $cliente->create( $connection );

    if($success)
    {
        header('Location: ../clientes.php');
    }
    else
    {
        echo "<script>alert('Falha ao inserir cliente, tente novamente');window.history.back();</script>";
        die();
    }
}


