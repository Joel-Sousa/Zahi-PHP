<?php
require_once 'conexao.php';

class UsuarioDAO {
    
    private $pdo = null;
    
    public function __construct() {
        $this->pdo = Conexao::getInstance();
    }
    
    public function salvar(ClienteDTO $clienteDTO, TelefoneDTO $telefoneDTO) {
        try {
            $sql = "INSERT INTO cliente(nome) "
                . "VALUES (?)";
                $stmt = $this->pdo->prepare($sql);
                $stmt->bindValue(1, $clienteDTO->getNome());
                $stmt->execute();
                $idCliente = $this->pdo->lastInsertId();
                
            $sql1 = "INSERT INTO telefone(cliente_id,ddd,telefone) "
                    . "VALUES (?,?,?)";
                $stmt = $this->pdo->prepare($sql1);
                $stmt->bindValue(1, $idCliente);
                $stmt->bindValue(2, $telefoneDTO->getDdd());
                $stmt->bindValue(3, $telefoneDTO->getTelefone());
                return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function listar() {
        try {
            $sql = "SELECT c.id,c.nome,t.cliente_id,t.ddd,t.telefone FROM cliente c INNER JOIN telefone t 
            ON (c.id = t.cliente_id)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $usuario = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $usuario;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function getById($idCliente) {
        try {
            $sql = "SELECT c.id,c.nome,t.cliente_id,t.ddd,t.telefone FROM cliente c INNER JOIN telefone t
            ON (c.id = t.cliente_id)
            WHERE c.id = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $idCliente);
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            return $usuario;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function alterar(ClienteDTO $clienteDTO, TelefoneDTO $telefoneDTO) {
        try {
            $sql = "UPDATE cliente SET nome = ?
                    WHERE id = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $clienteDTO->getNome());
            $stmt->bindValue(2, $clienteDTO->getId());
            $stmt->execute();
            
            $sql = "UPDATE telefone SET ddd = ?,telefone = ?
                    WHERE cliente_id = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $telefoneDTO->getDdd());
            $stmt->bindValue(2, $telefoneDTO->getTelefone());
            $stmt->bindValue(3, $telefoneDTO->getId());
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function excluir($id,$cliente_id) {
        try {
            /////
            $sql = "DELETE FROM telefone WHERE cliente_id = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $cliente_id);
            $stmt->execute();
            
            $sql = "DELETE FROM cliente WHERE id = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $id);
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
}

?>