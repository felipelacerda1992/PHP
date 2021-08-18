<?php

require_once 'IdUsuarioVO.php';

class UsuarioVO extends IdUsuarioVO {
    
    private $nomeUsuario;
    private $emailUsuario;
    private $senhaUsuario;
    private $dataCadastro;
    private $repetirSenha;




    public function setNome($p){
        $this->nomeUsuario = trim($p);
    }
    public function getNome() {
        return $this->nomeUsuario;
    }
    public function setEmail($p){
        $this->emailUsuario = trim($p);
    }
    public function getEmail() {
        return $this->emailUsuario;
    }
    public function setSenha($p){
        $this->senhaUsuario = trim($p);
    }
    public function getSenha() {
        return $this->senhaUsuario;
    }
    public function setData($p){
        $this->dataCadastro = trim($p);
    }
    public function getData() {
        return $this->dataCadastro;
    }
    public function setRSenha($p){
        $this->repetirSenha = trim($p);
    }
    public function getRSenha() {
        return $this->repetirSenha;
    }
}
