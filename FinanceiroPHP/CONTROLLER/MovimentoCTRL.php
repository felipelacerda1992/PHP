<?php

require_once '../DAO/MovimentoDAO.php';
require_once 'UtilCTRL.php';

class MovimentoCTRL {
    public function SalvarMovimento(MovimentoVO $objMovimento) {
        if ($objMovimento->getTipo() == '' || $objMovimento->getData() == '' || $objMovimento->getValor() == '' ||
                $objMovimento->getIdEmpresa() == '' || $objMovimento->getIdConta() == '' ||
                $objMovimento->getIdCategoria() == '') {
            return 0;
        }
              
        $dao = new MovimentoDAO();
        
        //Pega o usuário Logado
        $objMovimento->setIdUsuario(UtilCTRL::CodigoLogado());
        
        $ret = $dao->RealizarMovimento($objMovimento);
        
        return $ret;
    }
    
    public function ConsultarMovimento($tipo, $dtInicial, $dtFinal) {
        $dao = new MovimentoDAO();
        
        $movimento = $dao->ConsultarMovimento($tipo, $dtInicial, $dtFinal, UtilCTRL::CodigoLogado());
        
        return $movimento;
    }
}
