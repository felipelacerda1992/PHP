<?php
require_once 'IdUsuarioVO.php';

class BancoVO  extends IdUsuarioVO{
    private $idBanco;
    private $codBanco;
    private $nomeBanco;


    public function setIdBanco($p){
        $this->idBanco = $p;
    }
    public function getIdBanco() {
        return $this->idBanco;
    }
    public function setCodBanco($p){
        $this->codBanco = $p;
    }
    public function getCodBanco() {
        return $this->codBanco;
    }
    public function setNome($p){
        $this->nomeBanco = $p;
    }
    public function getNome() {
        return $this->nomeBanco;
    }
}
