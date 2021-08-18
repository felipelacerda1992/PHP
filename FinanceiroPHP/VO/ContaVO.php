<?php
require_once 'IdUsuarioVO.php';

class ContaVO  extends IdUsuarioVO{
    private $idConta;
    private $agencia;
    private $numero;
    private $saldo;
    private $status;
    private $idBanco;


    public function setIdConta($p){
        $this->idConta = $p;
    }
    public function getIdConta() {
        return $this->idConta;
    }
    public function setAgencia($p){
        $this->agencia = $p;
    }
    public function getAgencia() {
        return $this->agencia;
    }
    public function setNumero($p){
        $this->numero = $p;
    }
    public function getNumero() {
        return $this->numero;
    }
    public function setSaldo($p){
        $this->saldo = $p;
    }
    public function getSaldo() {
        return $this->saldo;
    }
    public function setStatus($p){
        $this->status = $p;
    }
    public function getStatus() {
        return $this->status;
    }
    public function setIdBanco($p){
        $this->idBanco = $p;
    }
    public function getIdBanco() {
        return $this->idBanco;
    }
}