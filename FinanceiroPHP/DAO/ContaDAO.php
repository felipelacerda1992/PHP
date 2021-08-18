<?php

require_once 'Conexao.php';

class ContaDAO extends Conexao{
    public function InserirConta(ContaVO $objConta) {
        //cria variavel q recebe o obj de conexao
        $conexao = parent::retornaConexao();
        
        //cria variavel q guarda o comando sql q será executado no banco
        $comando = 'insert into tb_conta (agencia_conta, numero_conta, saldo_conta, status_conta, id_banco, id_usuario) value (?,?,?,?,?,?)';
        
        //cria um obj q será configurado para ser levado para o banco
        $sql = new PDOStatement();
        
        //$sql recebe $conexao preparada para o $comando
        $sql = $conexao->prepare($comando);
        
        //verifica se existe ? na variavel $comandom configura bindValue
        $sql->bindValue(1, $objConta->getAgencia());
        $sql->bindValue(2, $objConta->getNumero());
        $sql->bindValue(3, $objConta->getSaldo());
        $sql->bindValue(4, $objConta->getStatus());
        $sql->bindValue(5, $objConta->getIdBanco());
        $sql->bindValue(6, $objConta->getIdUsuario());
       
        try {
            
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            
            return -1;
        }
    }
    
    public function AlterarConta(ContaVO $objConta) {
        $conexao = parent::retornaConexao();
        
        //cria variavel q guarda o comando sql q será executado no banco
        $comando = 'update tb_conta set id_banco=?, agencia_conta=?, numero_conta=?, saldo_conta=?, status_conta=? where id_conta=? and id_usuario=?';
        
        //cria um obj q será configurado para ser levado para o banco
        $sql = new PDOStatement();
        
        //$sql recebe $conexao preparada para o $comando
        $sql = $conexao->prepare($comando);
        
        //verifica se existe ? na variavel $comandom configura bindValue
        $sql->bindValue(1, $objConta->getIdBanco());
        $sql->bindValue(2, $objConta->getAgencia());
        $sql->bindValue(3, $objConta->getNumero());
        $sql->bindValue(4, $objConta->getSaldo());
        $sql->bindValue(5, $objConta->getStatus());
        $sql->bindValue(6, $objConta->getIdConta());
        $sql->bindValue(7, $objConta->getIdUsuario());
       
        try {
            
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            
            return -1;
        }
    }
    
    public function DetalharConta($idConta, $idLogado) {
        $conexao = parent::retornaConexao();
        $comando = 'select id_conta, agencia_conta, numero_conta, saldo_conta, status_conta, id_banco from tb_conta where id_conta = ? and id_usuario = ?';
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);
        
        $sql->bindValue(1, $idConta);
        $sql->bindValue(2, $idLogado);
        
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        
        $sql->execute();
        
        return $sql->fetchAll();
    }
    
    public function ConsultarConta($idLogado) {
        $conexao = parent::retornaConexao();
        
        $comando = 'select id_conta, agencia_conta, numero_conta, saldo_conta, status_conta, tb_conta.id_banco, nome_banco from tb_conta, tb_banco '
                . 'where tb_conta.id_banco = tb_banco.id_banco and tb_conta.id_usuario = ?';
        
        
        $sql = new PDOStatement();
        
        $sql = $conexao->prepare($comando);
        
        $sql->bindValue(1, $idLogado);
        
        //Elimina is indices da pesquisa ficando somente com as colunas com seu nome
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        
        $sql->execute();
        
        return $sql->fetchAll();
    }
    
    public function ConsultarContaAtiva($idLogado) {
        $conexao = parent::retornaConexao();
        
        $comando = 'select id_conta, agencia_conta, numero_conta, saldo_conta, status_conta, tb_conta.id_banco, nome_banco from tb_conta, tb_banco '
                . 'where tb_conta.id_banco = tb_banco.id_banco and tb_conta.id_usuario = ? and status_conta=1';
        
        
        $sql = new PDOStatement();
        
        $sql = $conexao->prepare($comando);
        
        $sql->bindValue(1, $idLogado);
        
        //Elimina is indices da pesquisa ficando somente com as colunas com seu nome
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        
        $sql->execute();
        
        return $sql->fetchAll();
    }
    
    public function ExcluirConta($idConta, $idLogado) {
        $conexao = parent::retornaConexao();
        
        //cria variavel q guarda o comando sql q será executado no banco
        $comando = 'delete from tb_conta where id_conta=? and id_usuario=?';
        
        //cria um obj q será configurado para ser levado para o banco
        $sql = new PDOStatement();
        
        //$sql recebe $conexao preparada para o $comando
        $sql = $conexao->prepare($comando);
        
        //verifica se existe ? na variavel $comandom configura bindValue
        $sql->bindValue(1, $idConta);
        $sql->bindValue(2, $idLogado);
        
       
        try {
            
            $sql->execute();
            return 2;
        } catch (Exception $ex) {
            
            return -3;
        }
    }
}
