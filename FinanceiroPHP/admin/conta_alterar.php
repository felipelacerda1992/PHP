<?php
require_once '../CONTROLLER/BancoCTRL.php';
require_once '../CONTROLLER/ContaCTRL.php';
require_once '../VO/ContaVO.php';
require_once './_msg.php';

//verifica se existe na URL o COD e se o valor do COD é numérico
if (isset($_GET['cod']) && is_numeric($_GET['cod'])) {
    $ctrl = new ContaCTRL();
    $dados = $ctrl->DetalharConta($_GET['cod']);

    //verifica se encontrou algo
    if (count($dados) == 0) {
        header('location: conta_consultar.php');
    }
}else if (isset($_POST['btnSalvar'])){
    $vo = new ContaVO();
    
    $vo->setIdConta($_POST['cod']);
    $vo->setIdBanco($_POST['id_banco']);
    $vo->setAgencia($_POST['agencia_conta']);
    $vo->setNumero($_POST['numero_conta']);
    $vo->setSaldo($_POST['saldo_conta']);
    $vo->setStatus(isset($_POST['status_conta']) ? 1 : 0);
    
    $ctrl = new ContaCTRL();
    
    $ret = $ctrl->AlterarConta($vo);
    header('location: conta_alterar.php?cod=' . $_POST['cod'] . '&ret=' . $ret);
}else if (isset ($_POST['btnExcluir'])) {
    $cod = $_POST['cod'];
    $ctrl = new ContaCTRL();
    
    $ret = $ctrl->ExcluirConta($cod);
    
    if ($ret == 2) {
        header('location: conta_consultar.php?ret=' . $ret);
    }else{
        header('location: conta_alterar.php?cod=' . $_POST['cod'] . '$ret=' .$ret);
    }
} else {
    //caso a url estaa com algum erro redireciona 
    header('location: conta_consultar.php');
}

$ctrl_banco = new BancoCTRL();
$bancos = $ctrl_banco->ConsultarBanco();
?>
﻿<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <?php
    include_once '_head.php';
    ?>
    <body>
        <div id="wrapper">
            <?php
            include_once '_topo.php';
            include_once '_menu.php';
            ?>
            <div id="page-wrapper" >
                <div id="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                            if (isset($_GET['ret'])) {
                                ExibirMsg($_GET['ret']);
                            }
                            ?>
                            <h2>ALTERAR CONTA</h2>   
                            <h5>Aqui você altera suas contas!</h5>

                        </div>
                    </div>
                    <!-- /. ROW  -->
                    <hr />
                    <form method="post" action="conta_alterar.php">
                        <input type="hidden" name="cod" value="<?= $dados[0]['id_conta'] ?>"/>
                        <div class="form-group">
                            <label>Selecione o banco:</label>
                            <select class="form-control" id="banco_conta" name="id_banco">
                                <option value="" selected>Selecione</option>
                                <?php for ($i = 0; $i < count($bancos); $i++) { ?>
                                    <option value="<?= $bancos[$i]['id_banco'] ?>" <?= $bancos[$i]['id_banco'] == $dados[0]['id_banco'] ? 'selected' : '' ?> ><?= $bancos[$i]['codigo_banco'] . ' - ' . $bancos[$i]['nome_banco'] ?></option>
                                <?php } ?>
                            </select>
                            <label>Agência</label>
                            <input class="form-control" placeholder="Digite aqui.." id="agencia_conta" name="agencia_conta" value="<?= $dados[0]['agencia_conta'] ?>"/>
                            <label  id="val_ag_conta" class="estilo-validar" ></label>
                            <br />
                            <label>Número conta</label>
                            <input class="form-control" placeholder="Digite aqui.." id="numero_conta" name="numero_conta" value="<?= $dados[0]['numero_conta'] ?>"/>
                            <label  id="val_num_conta" class="estilo-validar" ></label>
                            <br />
                            <label>Saldo</label>
                            <input class="form-control" placeholder="Digite aqui.." id="saldo_conta" name="saldo_conta" value="<?= $dados[0]['saldo_conta'] ?>"/>
                            <label  id="val_saldo_conta" class="estilo-validar" ></label>
                            <br />

                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="status_conta" <?= $dados[0]['status_conta'] == 1 ? 'checked' : '' ?> />Ativo
                                </label>
                            </div>
                            <br />
                        </div>
                        <button type="submit" class="btn btn-success" name="btnSalvar" onclick="return ValidarCampos(4)">Salvar</button>
                        <button type="submit" class="btn btn-danger" name="btnExcluir">Excluir</button>
                    </form>
                </div>
                <!-- /. PAGE INNER  -->
            </div>
            <!-- /. PAGE WRAPPER  -->
        </div>



    </body>
</html>
