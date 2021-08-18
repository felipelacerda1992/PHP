<?php

require_once '../DAO/UsuarioDAO.php';
require_once 'UtilCTRL.php';

class UsuarioCTRL {
    public function FinalizarCadastro(UsuarioVO $objUsuario) {
        if ($objUsuario->getNome() == '' || $objUsuario->getEmail() == '' || $objUsuario->getSenha() == '') {
            return 0;
        }
        
        if ($objUsuario->getSenha() != $objUsuario->getRSenha()) {
            return -2;
        }
        
        $objUsuario->setData(date('Y-m-d'));
        
        $dao = new UsuarioDAO();
        
        $ret = $dao->FinalizarCadastro($objUsuario);
        
        return $ret;
    }
    
    public function ValidarLogin($email, $senha) {
        if (trim($email) == '' || trim($senha) == '') {
            return 0;
        }
        
        $dao = new UsuarioDAO();
        $usuario = $dao->ValidarLogin($email, $senha);
        
        if (count($usuario) == 0) {
            return -100;
        }else{
            $cod = $usuario[0]['id_usuario'];
            
            UtilCTRL::CriarSessaoCodLogado($cod);
            
            header('location: consulta_movimento.php');
        }
    }
}
