<?php

require_once '../DAO/EmpresaDAO.php';
require_once 'UtilCTRL.php';

class EmpresaCTRL {
    public function SalvarEmpresa(EmpresaVO $objEmpresa) {
        if ($objEmpresa->getNome() == '' || $objEmpresa->getTelefone() == '' || $objEmpresa->getEndereco() == '') {
            return 0;
        }

        $dao = new EmpresaDAO();
        
        $objEmpresa->setIdUsuario(UtilCTRL::CodigoLogado());
        
        $ret = $dao->InserirEmpresa($objEmpresa);
        
        return $ret;
    }
    
    public function AlterarEmpresa(EmpresaVO $objEmpresa) {
        if ($objEmpresa->getNome() == '' || $objEmpresa->getTelefone() == '' || $objEmpresa->getEndereco() == '') {
            return 0;
        }
        $dao = new EmpresaDAO();
        
        //Pega o usuário Logado
        $objEmpresa->setIdUsuario(UtilCTRL::CodigoLogado());
        
        $ret = $dao->AlterarEmpresa($objEmpresa);
        
        return $ret;
    }
    
    public function DetalharEmpresa($idEmpresa) {
        $dao = new EmpresaDAO();
        
        return $dao->DetalharEmpresa($idEmpresa, UtilCTRL::CodigoLogado());
    }
    
    public function ConsultarEmpresa() {
        $dao = new EmpresaDAO();
        
        $empresas = $dao->ConsultarEmpresa(UtilCTRL::CodigoLogado());
        
        return $empresas;
    }
    
    public function ExcluirEmpresa($idEmpresa) {
        $dao = new EmpresaDAO();
        
        $ret = $dao->ExcluirEmpresa($idEmpresa, UtilCTRL::CodigoLogado());
        
        return $ret;
    }
}
