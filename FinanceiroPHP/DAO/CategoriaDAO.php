<?php
//trazer a conexao
require_once 'Conexao.php';

//herança
class CategoriaDAO extends Conexao {
    public function InserirCategoria(CategoriaVO $objCat) {
        //cria variavel q recebe o obj de conexao
        $conexao = parent::retornaConexao();
        
        //cria variavel q guarda o comando sql q será executado no banco
        $comando = 'insert into tb_categoria (nome_categoria, id_usuario) value (?,?)';
        
        //cria um obj q será configurado para ser levado para o banco
        $sql = new PDOStatement();
        
        //$sql recebe $conexao preparada para o $comando
        $sql = $conexao->prepare($comando);
        
        //verifica se existe ? na variavel $comandom configura bindValue
        $sql->bindValue(1, $objCat->getNome());
        $sql->bindValue(2, $objCat->getIdUsuario());
       
        try {
            
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            
            return -1;
        }
    }
    public function AlterarCategoria(CategoriaVO $objCategoria) {
        $conexao = parent::retornaConexao();
        
        //cria variavel q guarda o comando sql q será executado no banco
        $comando = 'update tb_categoria set nome_categoria=? where id_categoria=? and id_usuario=?';
        
        //cria um obj q será configurado para ser levado para o banco
        $sql = new PDOStatement();
        
        //$sql recebe $conexao preparada para o $comando
        $sql = $conexao->prepare($comando);
        
        //verifica se existe ? na variavel $comandom configura bindValue
        $sql->bindValue(1, $objCategoria->getNome());
        $sql->bindValue(2, $objCategoria->getIdCategoria());
        $sql->bindValue(3, $objCategoria->getIdUsuario());
       
        try {
            
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            
            return -1;
        }
    }
    
    public function DetalharCategoria($idCategoria, $idLogado) {
        $conexao = parent::retornaConexao();
        $comando = 'select id_categoria, nome_categoria from tb_categoria where id_categoria = ? and id_usuario = ?';
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);
        
        $sql->bindValue(1, $idCategoria);
        $sql->bindValue(2, $idLogado);
        
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        
        $sql->execute();
        
        return $sql->fetchAll();
    }
    
    public function ConsultarCategoria($idLogado) {
        $conexao = parent::retornaConexao();
        
        $comando = 'select nome_categoria, id_categoria from tb_categoria where id_usuario = ?';
        
        $sql = new PDOStatement();
        
        $sql = $conexao->prepare($comando);
        
        $sql->bindValue(1, $idLogado);
        
        //Elimina is indices da pesquisa ficando somente com as colunas com seu nome
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        
        $sql->execute();
        
        return $sql->fetchAll();
    }
    public function ExcluirCategoria($idCategoria, $idLogado) {
        $conexao = parent::retornaConexao();
        
        //cria variavel q guarda o comando sql q será executado no banco
        $comando = 'delete from tb_categoria where id_categoria=? and id_usuario=?'; //limit para limitar
        
        //cria um obj q será configurado para ser levado para o banco
        $sql = new PDOStatement();
        
        //$sql recebe $conexao preparada para o $comando
        $sql = $conexao->prepare($comando);
        
        //verifica se existe ? na variavel $comandom configura bindValue
        $sql->bindValue(1, $idCategoria);
        $sql->bindValue(2, $idLogado);
        
       
        try {
            
            $sql->execute();
            return 2;
        } catch (Exception $ex) {
            
            return -3;
        }
    }
}
