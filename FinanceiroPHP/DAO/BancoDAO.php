<?php
require_once 'Conexao.php';

class BancoDAO extends Conexao{
    public function SalvarBanco(BancoVO $objBanco) {
        //cria variavel q recebe o obj de conexao
        $conexao = parent::retornaConexao();
        
        //cria variavel q guarda o comando sql q será executado no banco
        $comando = 'insert into tb_banco (codigo_banco, nome_banco, id_usuario) value (?,?,?)';
        
        //cria um obj q será configurado para ser levado para o banco
        $sql = new PDOStatement();
        
        //$sql recebe $conexao preparada para o $comando
        $sql = $conexao->prepare($comando);
        
        //verifica se existe ? na variavel $comandom configura bindValue
        $sql->bindValue(1, $objBanco->getCodBanco());
        $sql->bindValue(2, $objBanco->getNome());
        $sql->bindValue(3, $objBanco->getIdUsuario());
       
        try {
            
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            
            return -1;
        }
    }
    
    public function ConsultarBanco($idLogado) {
        $conexao = parent::retornaConexao();
        
        $comando = 'select id_banco, codigo_banco, nome_banco from tb_banco where id_usuario = ?';
        
        $sql = new PDOStatement();
        
        $sql = $conexao->prepare($comando);
        
        $sql->bindValue(1, $idLogado);
        
        //Elimina is indices da pesquisa ficando somente com as colunas com seu nome
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        
        $sql->execute();
        
        return $sql->fetchAll();
    }
    
    public function AlterarBanco(BancoVO $objBanco) {
        $conexao = parent::retornaConexao();
        
        //cria variavel q guarda o comando sql q será executado no banco
        $comando = 'update tb_banco set codigo_banco=?, nome_banco=? where id_banco=? and id_usuario=?';
        
        //cria um obj q será configurado para ser levado para o banco
        $sql = new PDOStatement();
        
        //$sql recebe $conexao preparada para o $comando
        $sql = $conexao->prepare($comando);
        
        //verifica se existe ? na variavel $comandom configura bindValue
        $sql->bindValue(1, $objBanco->getCodBanco());
        $sql->bindValue(2, $objBanco->getNome());
        $sql->bindValue(3, $objBanco->getIdBanco());
        $sql->bindValue(4, $objBanco->getIdUsuario());
       
        try {
            
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            
            return -1;
        }
    }
    
    public function DetalharBanco($idBanco, $idLogado) {
        $conexao = parent::retornaConexao();
        $comando = 'select id_banco, codigo_banco, nome_banco'
                . ' from tb_banco where id_banco = ? and id_usuario = ?';
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);
        
        $sql->bindValue(1, $idBanco);
        $sql->bindValue(2, $idLogado);
        
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        
        $sql->execute();
        
        return $sql->fetchAll();
    }
    
    public function ExcluirBanco($idBanco, $idLogado) {
        $conexao = parent::retornaConexao();
        
        //cria variavel q guarda o comando sql q será executado no banco
        $comando = 'delete from tb_banco where id_banco=? and id_usuario=?';
        
        //cria um obj q será configurado para ser levado para o banco
        $sql = new PDOStatement();
        
        //$sql recebe $conexao preparada para o $comando
        $sql = $conexao->prepare($comando);
        
        //verifica se existe ? na variavel $comandom configura bindValue
        $sql->bindValue(1, $idBanco);
        $sql->bindValue(2, $idLogado);
        
       
        try {
            
            $sql->execute();
            return 2;
        } catch (Exception $ex) {
            
            return -3;
        }
    }
}
