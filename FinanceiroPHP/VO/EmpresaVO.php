<?php
require_once 'IdUsuarioVO.php';

class EmpresaVO  extends IdUsuarioVO{
    private $idEmpresa;
    private $nomeEmpresa;
    private $telefone;
    private $endereco;


    public function setIdEmpresa($p){
        $this->idEmpresa = $p;
    }
    public function getIdEmpresa() {
        return $this->idEmpresa;
    }
    public function setNome($p){
        $this->nomeEmpresa = $p;
    }
    public function getNome() {
        return $this->nomeEmpresa;
    }
    public function setTelefone($p){
        $this->telefone = $p;
    }
    public function getTelefone() {
        return $this->telefone;
    }
    public function setEndereco($p){
        $this->endereco = $p;
    }
    public function getEndereco() {
        return $this->endereco;
    }
}