<?php
class ClienteDTO{
    private $id;
    private $nome;
 
    //gets
    public function getId() {
        return $this->id;
    }
    public function getNome() {
        return $this->nome;
    }
    
    //sets
    public function setId($id) {
        $this->id = $id;
    }
    public function setNome($nome) {
        $this->nome = $nome;
    }
}
?>