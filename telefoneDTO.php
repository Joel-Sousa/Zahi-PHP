<?php
class TelefoneDTO{
    private $id;
    private $ddd;
    private $telefone;
    
    public function getId() {
        return $this->id;
    }
    
    public function getDdd() {
        return $this->ddd;
    }
    public function getTelefone() {
        return $this->telefone;
    }
    
    //sets
    public function setId($id) {
        $this->id = $id;
    }
    
    public function setDdd($ddd) {
        $this->ddd = $ddd;
    }
    
    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }
    
}
?>