<?php
require_once 'IdUsuarioVO.php';

class CategoriaVO extends IdUsuarioVO{
    
    private $idCategoria;
    private $nomeCategoria;
    
    
    
    public function setNome($p){
        $this->nomeCategoria = $p;
    }
    public function getNome() {
        return $this->nomeCategoria;
    }
    public function setIdCategoria($p){
        $this->idCategoria = $p;
    }
    public function getIdCategoria() {
        return $this->idCategoria;
    }

}
