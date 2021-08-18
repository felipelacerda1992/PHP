<?php
require_once 'IdUsuarioVO.php';

class MovimentoVO  extends IdUsuarioVO{
    private $idMovimento;
    private $tipo;
    private $data;
    private $valor;
    private $observacao;
    private $idEmpresa;
    private $idConta;
    private $idCategoria;


    public function setIdMovimento($p){
        $this->idMovimento = $p;
    }
    public function getIdMovimento() {
        return $this->idMovimento;
    }
    public function setTipo($p){
        $this->tipo = $p;
    }
    public function getTipo() {
        return $this->tipo;
    }
    public function setData($p){
        $this->data = $p;
    }
    public function getData() {
        return $this->data;
    }
    public function setValor($p){
        $this->valor = $p;
    }
    public function getValor() {
        return $this->valor;
    }
    public function setObs($p){
        $this->observacao = $p;
    }
    public function getObs() {
        return $this->observacao;
    }
    public function setIdEmpresa($p){
        $this->idEmpresa = $p;
    }
    public function getIdEmpresa() {
        return $this->idEmpresa;
    }
    public function setIdConta($p){
        $this->idConta = $p;
    }
    public function getIdConta() {
        return $this->idConta;
    }
    public function setIdCategoria($p){
        $this->idCategoria = $p;
    }
    public function getIdCategoria() {
        return $this->idCategoria;
    }
}