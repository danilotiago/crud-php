<?php

class Pedido implements DatabaseDAO
{
    private $id;
    private $id_cliente;
    private $id_produto;
    private $quantidade;
    private $valor;

    function __construct($id_cliente = '', $id_produto = '', $quantidade = '', $valor = '')
    {
        $this->id_cliente = $id_cliente;
        $this->id_produto = $id_produto;
        $this->quantidade = $quantidade;
        $this->valor = $valor;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $id_cliente
     */
    public function setIdCliente($id_cliente)
    {
        $this->id_cliente = $id_cliente;
    }

    /**
     * @param mixed $id_produto
     */
    public function setIdProduto($id_produto)
    {
        $this->id_produto = $id_produto;
    }

    /**
     * @param mixed $quantidade
     */
    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;
    }

    /**
     * @param mixed $valor
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
    }

    /**
     * @param mixed $id
     */
    public function getId($id)
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getIdCliente()
    {
        return $this->id_cliente;
    }

    /**
     * @return mixed
     */
    public function getIdProduto()
    {
        return $this->id_produto;
    }

    /**
     * @return mixed
     */
    public function getQuantidade()
    {
        return $this->quantidade;
    }

    /**
     * @return mixed
     */
    public function getValor()
    {
        return $this->valor;
    }

    public function create( $health_connection )
    {
        $stmt = $health_connection->prepare("INSERT INTO pedidos (id_cliente, id_produto, quantidade, valor) 
                                             VALUES (:id_cliente, :id_produto, :quantidade, :valor)");

        $stmt->bindParam(':id_cliente', $this->id_cliente);
        $stmt->bindParam(':id_produto', $this->id_produto);
        $stmt->bindParam(':quantidade', $this->quantidade);
        $stmt->bindParam(':valor', $this->valor);

        if( $stmt->execute() )
        {
            return true;
        }
        return false;
    }

    public function update($health_connection)
    {
        $stmt = $health_connection->prepare("UPDATE pedidos SET id_cliente = :id_cliente, id_produto = :id_produto, quantidade = :quantidade, valor = :valor WHERE id = :id");

        $stmt->bindParam(':id_cliente', $this->id_cliente);
        $stmt->bindParam(':id_produto', $this->id_produto);
        $stmt->bindParam(':quantidade', $this->quantidade);
        $stmt->bindParam(':valor', $this->valor);
        $stmt->bindParam(':id', $this->id);

        if( $stmt->execute() )
        {
            return true;
        }
        return false;
    }

    public function get($health_connection, $id)
    {
        $stmt = $health_connection->prepare("SELECT * FROM pedidos WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function lists($health_connection)
    {
        return $health_connection->query('SELECT pedidos.id, pedidos.id_cliente, pedidos.id_produto, pedidos.quantidade, pedidos.valor, clientes.nome as nome_cliente, produtos.nome as nome_produto
                                          FROM pedidos 
                                          INNER JOIN clientes ON pedidos.id_cliente = clientes.id 
                                          INNER JOIN produtos ON pedidos.id_produto = produtos.id 
                                          ORDER BY clientes.id DESC');
    }

    public function delete($health_connection, $id)
    {
        $stmt = $health_connection->prepare("DELETE FROM pedidos WHERE id = :id");
        $stmt->bindParam(':id', $id);

        if( $stmt->execute() )
        {
            return true;
        }
        return false;
    }

    public function listsProdutos($health_connection)
    {
        return $health_connection->query('SELECT * FROM produtos ORDER BY nome ASC');
    }

    public function listsClientes($health_connection)
    {
        return $health_connection->query('SELECT * FROM clientes ORDER BY nome ASC');
    }
}