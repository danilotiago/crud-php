<?php

function executaRedirecionamentos($health_connection)
{
    // verifica qual rota chamou este controller
    $recurso_solicitado = $_SERVER['HTTP_REFERER'];
    $recurso_solicitado = explode("/", $recurso_solicitado);

    /**
     * executa os metodos de acordo com o recurso que o solicitou
     */

    // produtos
    if( strpos($recurso_solicitado[count($recurso_solicitado) - 1], 'produtos_novo.php') !== false)
    {
        adicionaProduto($health_connection);
    }
    elseif( strpos($recurso_solicitado[count($recurso_solicitado) - 1], 'produtos.php') !== false)
    {
        deletarProduto($health_connection);
    }
    elseif(strpos($recurso_solicitado[count($recurso_solicitado) - 1], 'produtos_alterar.php') !== false)
    {
        alterarProduto($health_connection);
    }

    // clientes
    if( strpos($recurso_solicitado[count($recurso_solicitado) - 1], 'clientes_novo.php') !== false)
    {
        adicionaCliente($health_connection);
    }
    elseif( strpos($recurso_solicitado[count($recurso_solicitado) - 1], 'clientes.php') !== false)
    {
        deletarCliente($health_connection);
    }
    elseif(strpos($recurso_solicitado[count($recurso_solicitado) - 1], 'clientes_alterar.php') !== false)
    {
        alterarCliente($health_connection);
    }

    // pedidos
    if( strpos($recurso_solicitado[count($recurso_solicitado) - 1], 'pedidos_novo.php') !== false)
    {
        adicionaPedido($health_connection);
    }
    elseif( strpos($recurso_solicitado[count($recurso_solicitado) - 1], 'pedidos.php') !== false)
    {
        deletarPedido($health_connection);
    }
    elseif(strpos($recurso_solicitado[count($recurso_solicitado) - 1], 'pedidos_alterar.php') !== false)
    {
        alterarPedido($health_connection);
    }
}