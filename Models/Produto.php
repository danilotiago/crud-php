<?php

class Produto implements DatabaseDAO
{
    private $id;
    private $nome;
    private $valor;
    private $descricao;
    private $foto;

    function __construct($nome = '', $valor = '', $descricao = '', $foto = '')
    {
        $this->nome = $nome;
        $this->valor = $valor;
        $this->descricao = $descricao;
        $this->foto = $foto;
    }

    /**
     * @return string
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
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * @return string
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @return string
     */
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * @param string $id
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
     * @param string $valor
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
    }

    /**
     * @param string $descricao
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    /**
     * @param string $foto
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;
    }

    public function create( $health_connection )
    {
        $stmt = $health_connection->prepare("INSERT INTO produtos (nome, valor, descricao, foto) 
                                             VALUES (:nome, :valor, :descricao, :foto)");

        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':valor', $this->valor);
        $stmt->bindParam(':descricao', $this->descricao);
        $stmt->bindParam(':foto', $this->foto);

        if( $stmt->execute() )
        {
            return true;
        }
        return false;
    }

    public function update($health_connection)
    {
        $stmt = $health_connection->prepare("UPDATE produtos SET nome = :nome, valor = :valor, descricao = :descricao, foto = :foto WHERE id = :id");

        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':valor', $this->valor);
        $stmt->bindParam(':descricao', $this->descricao);
        $stmt->bindParam(':foto', $this->foto);
        $stmt->bindParam(':id', $this->id);

        if( $stmt->execute() )
        {
            return true;
        }
        return false;
    }

    public function get($health_connection, $id)
    {
        $stmt = $health_connection->prepare("SELECT * FROM produtos WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function lists($health_connection)
    {
        return $health_connection->query('SELECT * FROM `produtos` ORDER BY id DESC');
    }

    public function delete($health_connection, $id)
    {
        $stmt = $health_connection->prepare("DELETE FROM produtos WHERE id = :id");
        $stmt->bindParam(':id', $id);

        if( $stmt->execute() )
        {
            return true;
        }
        return false;
    }
}