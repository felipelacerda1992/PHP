<?php
//trazer a conexao
require_once 'Conexao.php';

//herança
class EmpresaDAO extends Conexao {
    public function InserirEmpresa(EmpresaVO $objEmp) {
        //cria variavel q recebe o obj de conexao
        $conexao = parent::retornaConexao();
        
        //cria variavel q guarda o comando sql q será executado no banco
        $comando = 'insert into tb_empresa (nome_empresa, telefone_empresa, endereco_empresa, id_usuario) value (?,?,?,?)';
        
        //cria um obj q será configurado para ser levado para o banco
        $sql = new PDOStatement();
        
        //$sql recebe $conexao preparada para o $comando
        $sql = $conexao->prepare($comando);
        
        //verifica se existe ? na variavel $comandom configura bindValue
        $sql->bindValue(1, $objEmp->getNome());
        $sql->bindValue(2, $objEmp->getTelefone());
        $sql->bindValue(3, $objEmp->getEndereco());
        $sql->bindValue(4, $objEmp->getIdUsuario());
       
        try {
            
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            
            return -1;
        }
    }
    
    public function AlterarEmpresa(EmpresaVO $objEmp) {
        $conexao = parent::retornaConexao();
        
        //cria variavel q guarda o comando sql q será executado no banco
        $comando = 'update tb_empresa set nome_empresa=?, endereco_empresa=?, telefone_empresa=? where id_empresa=? and id_usuario=?';
        
        //cria um obj q será configurado para ser levado para o banco
        $sql = new PDOStatement();
        
        //$sql recebe $conexao preparada para o $comando
        $sql = $conexao->prepare($comando);
        
        //verifica se existe ? na variavel $comandom configura bindValue
        $sql->bindValue(1, $objEmp->getNome());
        $sql->bindValue(2, $objEmp->getEndereco());
        $sql->bindValue(3, $objEmp->getTelefone());
        $sql->bindValue(4, $objEmp->getIdEmpresa());
        $sql->bindValue(5, $objEmp->getIdUsuario());
       
        try {
            
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            
            return -1;
        }
    }
    
    public function DetalharEmpresa($idEmpresa, $idLogado) {
        $conexao = parent::retornaConexao();
        $comando = 'select id_empresa, nome_empresa, endereco_empresa, telefone_empresa'
                . ' from tb_empresa where id_empresa = ? and id_usuario = ?';
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);
        
        $sql->bindValue(1, $idEmpresa);
        $sql->bindValue(2, $idLogado);
        
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        
        $sql->execute();
        
        return $sql->fetchAll();
    }
    
    public function ConsultarEmpresa($idLogado) {
        $conexao = parent::retornaConexao();
        
        $comando = 'select id_empresa, nome_empresa, endereco_empresa, telefone_empresa from tb_empresa where id_usuario = ?';
        
        $sql = new PDOStatement();
        
        $sql = $conexao->prepare($comando);
        
        $sql->bindValue(1, $idLogado);
        
        //Elimina is indices da pesquisa ficando somente com as colunas com seu nome
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        
        $sql->execute();
        
        return $sql->fetchAll();
    }
    
    public function ExcluirEmpresa($idEmpresa, $idLogado) {
        $conexao = parent::retornaConexao();
        
        //cria variavel q guarda o comando sql q será executado no banco
        $comando = 'delete from tb_empresa where id_empresa=? and id_usuario=?';
        
        //cria um obj q será configurado para ser levado para o banco
        $sql = new PDOStatement();
        
        //$sql recebe $conexao preparada para o $comando
        $sql = $conexao->prepare($comando);
        
        //verifica se existe ? na variavel $comandom configura bindValue
        $sql->bindValue(1, $idEmpresa);
        $sql->bindValue(2, $idLogado);
        
       
        try {
            
            $sql->execute();
            return 2;
        } catch (Exception $ex) {
            
            return -3;
        }
    }
}
