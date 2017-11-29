<?php

class Cliente implements DatabaseDAO
{
    private $id;
    private $nome;
    private $email;
    private $data_cadastro;
    private $pagamento_id;

    function __construct($nome = '', $email = '', $data_cadastro = '', $pagamento_id = '')
    {
        $this->nome = $nome;
        $this->email = $email;
        $this->data_cadastro = $data_cadastro;
        $this->pagamento_id = $pagamento_id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param string $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @param string $data_cadastro
     */
    public function setDataCadastro($data_cadastro)
    {
        $this->data_cadastro = $data_cadastro;
    }

    /**
     * @param int $pagamento_id
     */
    public function setPagamentoId($pagamento_id)
    {
        $this->pagamento_id = $pagamento_id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getDataCadastro()
    {
        return $this->data_cadastro;
    }

    /**
     * @return int
     */
    public function getPagamentoId()
    {
        return $this->pagamento_id;
    }

    public function create( $health_connection )
    {
        $stmt = $health_connection->prepare("INSERT INTO clientes (nome, email, data_cadastro, pagamento_id) 
                                             VALUES (:nome, :email, :data_cadastro, :pagamento_id)");

        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':data_cadastro', $this->data_cadastro);
        $stmt->bindParam(':pagamento_id', $this->pagamento_id);

        if( $stmt->execute() )
        {
            return true;
        }
        return false;
    }

    public function update($health_connection)
    {
        $stmt = $health_connection->prepare("UPDATE clientes SET nome = :nome, email = :email, data_cadastro = :data_cadastro, pagamento_id = :pagamento_id WHERE id = :id");

        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':data_cadastro', $this->data_cadastro);
        $stmt->bindParam(':pagamento_id', $this->pagamento_id);
        $stmt->bindParam(':id', $this->id);

        if( $stmt->execute() )
        {
            return true;
        }
        return false;
    }

    public function get($health_connection, $id)
    {
        $stmt = $health_connection->prepare("SELECT * FROM clientes WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function lists($health_connection)
    {
        return $health_connection->query('SELECT clientes.id, clientes.nome, clientes.email, clientes.data_cadastro, pagamentos.nome as pagamento 
                                          FROM clientes INNER JOIN pagamentos ON clientes.pagamento_id = pagamentos.id 
                                          ORDER BY clientes.id DESC');
    }

    public function delete($health_connection, $id)
    {

        $stmt = $health_connection->prepare("DELETE FROM clientes WHERE id = :id");
        $stmt->bindParam(':id', $id);

        if( $stmt->execute() )
        {
            return true;
        }
        return false;
    }

    public function listsPagamentos($health_connection)
    {
        return $health_connection->query('SELECT * FROM pagamentos ORDER BY nome ASC');
    }
}