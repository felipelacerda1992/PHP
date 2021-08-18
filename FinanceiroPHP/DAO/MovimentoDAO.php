<?php

require_once 'Conexao.php';
class MovimentoDAO extends Conexao{
    public function RealizarMovimento(MovimentoVO $objMov) {
        //cria variavel q recebe o obj de conexao
        $conexao = parent::retornaConexao();
        
        //cria variavel q guarda o comando sql q será executado no banco
        $comando = 'insert into tb_movimento (tipo_movimento, data_movimento, valor_movimento, obs_movimento, id_conta, id_empresa, id_categoria, id_usuario) value (?,?,?,?,?,?,?,?)';
        
        //cria um obj q será configurado para ser levado para o banco
        $sql = new PDOStatement();
        
        //$sql recebe $conexao preparada para o $comando
        $sql = $conexao->prepare($comando);
        
        //verifica se existe ? na variavel $comandom configura bindValue
        $sql->bindValue(1, $objMov->getTipo());
        $sql->bindValue(2, $objMov->getData());
        $sql->bindValue(3, $objMov->getValor());
        $sql->bindValue(4, $objMov->getObs());
        $sql->bindValue(5, $objMov->getIdConta());
        $sql->bindValue(6, $objMov->getIdEmpresa());
        $sql->bindValue(7, $objMov->getIdCategoria());
        $sql->bindValue(8, $objMov->getIdUsuario());
        
        $conexao->beginTransaction();
       
        try {
            
            $sql->execute();
            
            if ($objMov->getTipo() == 0) {
                $comando = 'update tb_conta set saldo_conta = saldo_conta +  ? where id_conta = ?';
            } else {
                $comando = 'update tb_conta set saldo_conta = saldo_conta -  ? where id_conta = ?';
            }
            
            $sql = $conexao->prepare($comando);
            $sql->bindValue(1, $objMov->getValor());
            $sql->bindValue(2, $objMov->getIdConta());
            
            $sql->execute();
            
            $conexao->commit();
            return 1;
        } catch (Exception $ex) {
            $conexao->rollBack();
            return -1;
        }
    }
    
    public function ConsultarMovimento($tipo, $dtInicial, $dtFinal, $idLogado) {
        $conexao = parent::retornaConexao();
        
        $comando = 'select agencia_conta, nome_empresa, nome_categoria, valor_movimento, date_format(data_movimento, "%d/%m/%Y") as data_movimento, tipo_movimento, obs_movimento, nome_banco'
                . ' from tb_movimento, tb_conta, tb_categoria, tb_empresa, tb_banco '
                . ' where tb_movimento.id_conta = tb_conta.id_conta'
                . ' and tb_movimento.id_empresa = tb_empresa.id_empresa'
                . ' and tb_movimento.id_categoria = tb_categoria.id_categoria'
                . ' and tb_conta.id_banco = tb_banco.id_banco'
                . ' and data_movimento between ? and ?'
                . ' and tb_movimento.id_usuario = ?';
        
        if ($tipo!= 2) {
            $comando = $comando . ' and tb_movimento.tipo_movimento = ?';
        }
        
        $comando = $comando . ' order by tb_movimento.id_movimento DESC';
        $sql = new PDOStatement();
        
        $sql = $conexao->prepare($comando);
        
        
        $sql->bindValue(1, $dtInicial);
        $sql->bindValue(2, $dtFinal);
        $sql->bindValue(3, $idLogado);
        
        if ($tipo != 2) {
            $sql->bindValue(4, $tipo);
        }
        
        //Elimina is indices da pesquisa ficando somente com as colunas com seu nome
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        
        $sql->execute();
        
        return $sql->fetchAll();
    }
}
