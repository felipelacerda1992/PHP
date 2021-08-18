<?php

require_once '../CONTROLLER/BancoCTRL.php';
require_once '../VO/BancoVO.php';
require_once './_msg.php';

//verifica se existe na URL o COD e se o valor do COD é numérico
if (isset($_GET['cod']) && is_numeric($_GET['cod'])) {
    $ctrl = new BancoCTRL();
    $dados = $ctrl->DetalharBanco($_GET['cod']);
    
    //verifica se encontrou algo
    if (count($dados) == 0) {
        header('location: banco_consultar.php');
    }
}else if (isset($_POST['btnSalvar'])){
    $vo = new BancoVO();
    
    $vo->setIdBanco($_POST['cod']);
    $vo->setCodBanco($_POST['codigo_banco']);
    $vo->setNome($_POST['nome_banco']);
    
    $ctrl = new BancoCTRL();
    
    $ret = $ctrl->AlterarBanco($vo);
    header('location: banco_alterar.php?cod=' . $_POST['cod'] . '&ret=' . $ret);
}else if (isset ($_POST['btnExcluir'])) {
    $cod = $_POST['cod'];
    $ctrl = new BancoCTRL();
    
    $ret = $ctrl->ExcluirBanco($cod);
    
    if ($ret == 2) {
        header('location: banco_consultar.php?ret=' . $ret);
    }else{
        header('location: banco_alterar.php?cod=' . $_POST['cod'] . '$ret=' .$ret);
    }
}
else {
    //caso a url estaa com algum erro redireciona 
    header('location: banco_consultar.php');
}

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
                            <h2>ALTERAR BANCO</h2>   
                            <h5>Aqui você altera seus bancos!</h5>

                        </div>
                    </div>
                    <!-- /. ROW  -->
                    <hr />
                    <form method="post" action="banco_alterar.php">
                        <input type="hidden" name="cod" value="<?= $dados[0]['id_banco'] ?>"/>
                    <div class="form-group">
                       <label>Código do banco</label>
                        <input class="form-control" placeholder="Digite aqui.." id="codigo_banco" name="codigo_banco" value="<?= $dados[0]['codigo_banco'] ?>"/>
                        <label  id="val_cod_banco" class="estilo-validar" ></label>
                        <br>
                        <label>Nome do banco</label>
                        <input class="form-control" placeholder="Digite aqui.." id="nome_banco" name="nome_banco" value="<?= $dados[0]['nome_banco'] ?>"/>
                        <label  id="val_nome_banco" class="estilo-validar" ></label>
                        <br>
                    </div>
                    <button type="submit" class="btn btn-success" onclick="return ValidarCampos(3)" name="btnSalvar">Salvar</button>
                    <button type="submit" class="btn btn-danger" name="btnExcluir">Excluir</button>
                </div>
                <!-- /. PAGE INNER  -->
            </div>
            <!-- /. PAGE WRAPPER  -->
        </div>
       


    </body>
</html>
