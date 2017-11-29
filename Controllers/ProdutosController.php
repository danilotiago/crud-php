<?php

require '../Database/DAO/DatabaseDAO.php';
require '../Models/Produto.php';
require '../Models/Media.php';
require '../Validation/validations.php';
require '../Database/Connection/get_health_connection.php';

// simula o roteamento da aplicacao de acordo com o recurso que o solicitou
include '../Redirecionamentos/redirecionamentos.php';
executaRedirecionamentos($health_connection);

function alterarProduto($connection)
{
    $data = [
        $_POST['nome'],
        $_POST['valor'],
        $_POST['descricao']
    ];

    if(!valida_dados_vazios($data) )
    {
        header("location:javascript://history.go(-1)");
    }

    $class = new ReflectionClass('Produto');
    $produto = $class->newInstanceArgs($data);
    $produto->setId($_POST['id']);

    // valida imagem
    if(!empty($_FILES['foto']['tmp_name']))
    {
        $media = new Media();
        $url = $media->upload($_FILES['foto']);
        $produto->setFoto($url);
    }

    $success = $produto->update($connection);

    if($success)
    {
        header('Location: ../produtos.php');
    }
    else
    {
        header("location:javascript://history.go(-1)");
    }
}

function deletarProduto($connection)
{
    $instancia = new Produto();
    $success = $instancia->delete($connection, $_POST['id']);

    if($success)
    {
        header('Location: ../produtos.php');
    }
    else
    {
        header("location:javascript://history.go(-1)");
    }
}

function adicionaProduto($connection)
{
    $data = [
        $_POST['nome'],
        $_POST['valor'],
        $_POST['descricao']
    ];

    // valida dados
    if(!valida_dados_vazios($data) )
    {
        echo "<script>alert('Dados inválidos. Preencha todos os campos');window.history.back();</script>";
        die();
    }

    // instancia classe com o array de dados
    $class = new ReflectionClass('Produto');
    $produto = $class->newInstanceArgs($data);

    // valida imagem
    if(!empty($_FILES['foto']['tmp_name']))
    {
        $media = new Media();
        $url = $media->upload($_FILES['foto']);
        $produto->setFoto($url);
    }

    $success = $produto->create( $connection );

    if($success)
    {
        header('Location: ../produtos.php');
    }
    else
    {
        echo "<script>alert('Falha ao inserir produto, tente novamente');window.history.back();</script>";
        die();
    }
}


