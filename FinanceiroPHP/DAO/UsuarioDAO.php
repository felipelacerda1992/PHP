<?php
//trazer a conexao
require_once 'Conexao.php';

//herança
class UsuarioDAO extends Conexao {
    public function FinalizarCadastro(UsuarioVO $objUsuario) {
        //cria variavel q recebe o obj de conexao
        $conexao = parent::retornaConexao();
        
        //cria variavel q guarda o comando sql q será executado no banco
        $comando = 'insert into tb_empresa (nome_usuario, email_usuario, senha_usuario, data_cadastro) value (?,?,?,?)';
        
        //cria um obj q será configurado para ser levado para o banco
        $sql = new PDOStatement();
        
        //$sql recebe $conexao preparada para o $comando
        $sql = $conexao->prepare($comando);
        
        //verifica se existe ? na variavel $comandom configura bindValue
        $sql->bindValue(1, $objUsuario->getNome());
        $sql->bindValue(2, $objUsuario->getEmail());
        $sql->bindValue(3, $objUsuario->getSenha());
        $sql->bindValue(4, $objUsuario->getData());
       
        try {
            
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            
            return -1;
        }
    }
    
    public function ValidarLogin($email, $senha) {
        $conexao = parent::retornaConexao();
        $comando = 'select id_usuario from tb_usuario where senha_usuario=? and email_usuario=?';
        
        $sql = new PDOStatement();
        //$sql recebe $conexao preparada para o $comando
        $sql = $conexao->prepare($comando);
        
        $sql->bindValue(1, $senha);
        $sql->bindValue(2, $email);
        
        $sql->execute();
        
        return $sql->fetchAll();
    }
}
