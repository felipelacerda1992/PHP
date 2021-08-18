<?php

require_once '../DAO/CategoriaDAO.php';
require_once 'UtilCTRL.php';

class CategoriaCTRL {
    public function SalvarCategoria(CategoriaVO $objCategoria) {
        if ($objCategoria->getNome() == '') {
            return 0;
        }
              
        $dao = new CategoriaDAO();
        
        //Pega o usuário Logado
        $objCategoria->setIdUsuario(UtilCTRL::CodigoLogado());
        
        $ret = $dao->InserirCategoria($objCategoria);
        
        return $ret;
    }
    
    public function AlterarCategoria(CategoriaVO $objCatategoria) {
        if ($objCatategoria->getNome() == '' || $objCatategoria->getIdCategoria() == '') {
            return 0;
        }
        $dao = new CategoriaDAO();
        
        $objCatategoria->setIdUsuario(UtilCTRL::CodigoLogado());
        
        $ret = $dao->AlterarCategoria($objCatategoria);
        
        return $ret;
    }
    
    public function DetalharCategoria($idCategoria) {
        $dao = new CategoriaDAO();
        
        return $dao->DetalharCategoria($idCategoria, UtilCTRL::CodigoLogado());
    }
    
    public function ConsultarCategoria() {
        $dao = new CategoriaDAO();
        
        $categorias = $dao->ConsultarCategoria(UtilCTRL::CodigoLogado());
        
        return $categorias;
    }
    
    public function ExcluirCategoria($idCategoria) {
        $dao = new CategoriaDAO();
        
        $ret = $dao->ExcluirCategoria($idCategoria, UtilCTRL::CodigoLogado());
        
        return $ret;
    }
}
