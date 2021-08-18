<?php

require_once '../DAO/ContaDAO.php';
require_once 'UtilCTRL.php';
class ContaCTRL {
    public function SalvarConta(ContaVO $objConta) {
        if ($objConta->getAgencia() == '' || $objConta->getNumero() == '' || $objConta->getSaldo() == '' || $objConta->getIdBanco() == '') {
            return 0;
        }

        $dao = new ContaDAO();
        
        $objConta->setIdUsuario(UtilCTRL::CodigoLogado());
        
        $ret = $dao->InserirConta($objConta);
        
        return $ret;
    }
    
     public function AlterarConta(ContaVO $objConta) {
        if ($objConta->getAgencia() == '' || $objConta->getNumero() == '' || $objConta->getSaldo() == '' || $objConta->getIdBanco() == '') {
            return 0;
        }

        $dao = new ContaDAO();
        
        $objConta->setIdUsuario(UtilCTRL::CodigoLogado());
        
        $ret = $dao->AlterarConta($objConta);
        
        return $ret;
    }
    
    public function DetalharConta($idConta) {
        $dao = new ContaDAO();
        
        return $dao->DetalharConta($idConta, UtilCTRL::CodigoLogado());
    }
    
    public function ConsultarConta() {
        $dao = new ContaDAO();
        
        $contas = $dao->ConsultarConta(UtilCTRL::CodigoLogado());
        
        return $contas;
    }
    
    public function ConsultarContaAtiva() {
        $dao = new ContaDAO();
        
        $contas = $dao->ConsultarContaAtiva(UtilCTRL::CodigoLogado());
        
        return $contas;
    }
    
    public function ExcluirConta($idConta) {
        $dao = new ContaDAO();
        
        $ret = $dao->ExcluirConta($idConta, UtilCTRL::CodigoLogado());
        
        return $ret;
    }
}
