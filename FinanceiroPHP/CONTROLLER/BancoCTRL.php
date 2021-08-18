<?php

require_once '../DAO/BancoDAO.php';
require_once 'UtilCTRL.php';
class BancoCTRL {
    public function SalvarBanco(BancoVO $objBanco) {
        if ($objBanco->getNome() == '' || $objBanco->getCodBanco() == '') {
            echo 'ghj';die;
            return 0;
        }
        
        //Pega o usuário Logado
        $objBanco->setIdUsuario(UtilCTRL::CodigoLogado());
        
        $dao = new BancoDAO();
        
        $ret = $dao->SalvarBanco($objBanco);
        
        return $ret;
    }
    
    public function ConsultarBanco() {
        $dao = new BancoDAO();
        
        $bancos = $dao->ConsultarBanco(UtilCTRL::CodigoLogado());
        
        return $bancos;
    }
    
    public function AlterarBanco(BancoVO $objBanco) {
        if ($objBanco->getCodBanco() == '' || $objBanco->getNome() == '') {
            return 0;
        }
        $dao = new BancoDAO();
        
        //Pega o usuário Logado
        $objBanco->setIdUsuario(UtilCTRL::CodigoLogado());
        
        $ret = $dao->AlterarBanco($objBanco);
        
        return $ret;
    }
    
    public function DetalharBanco($idBanco) {
        $dao = new BancoDAO();
        
        return $dao->DetalharBanco($idBanco, UtilCTRL::CodigoLogado());
    }
    
    public function ExcluirBanco($idBanco) {
        $dao = new BancoDAO();
        
        $ret = $dao->ExcluirBanco($idBanco, UtilCTRL::CodigoLogado());
        
        return $ret;
    }
}
