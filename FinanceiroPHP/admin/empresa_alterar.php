<?php

require_once '../CONTROLLER/EmpresaCTRL.php';
require_once '../VO/EmpresaVO.php';
require_once './_msg.php';

//verifica se existe na URL o COD e se o valor do COD é numérico
if (isset($_GET['cod']) && is_numeric($_GET['cod'])) {
    $ctrl = new EmpresaCTRL();
    $dados = $ctrl->DetalharEmpresa($_GET['cod']);
    
    //verifica se encontrou algo
    if (count($dados) == 0) {
        header('location: empresa_consultar.php');
    }
}else if (isset($_POST['btnSalvar'])){
    $vo = new EmpresaVO();
    
    $vo->setIdEmpresa($_POST['cod']);
    $vo->setNome($_POST['nome_empresa']);
    $vo->setEndereco($_POST['endereco_empresa']);
    $vo->setTelefone($_POST['telefone_empresa']);
    
    $ctrl = new EmpresaCTRL();
    
    $ret = $ctrl->AlterarEmpresa($vo);
    header('location: empresa_alterar.php?cod=' . $_POST['cod'] . '&ret=' . $ret);
}else if (isset ($_POST['btnExcluir'])) {
    $cod = $_POST['cod'];
    $ctrl = new EmpresaCTRL();
    
    $ret = $ctrl->ExcluirEmpresa($cod);
    
    if ($ret == 2) {
        header('location: empresa_consultar.php?ret=' . $ret);
    }else{
        header('location: empresa_alterar.php?cod=' . $_POST['cod'] . '$ret=' .$ret);
    }
}
else {
    //caso a url estaa com algum erro redireciona 
    header('location: empresa_consultar.php');
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
                            <h2>ALTERAR EMPRESA</h2>   
                            <h5>Aqui você altera suas empresas!</h5>

                        </div>
                    </div>
                    <!-- /. ROW  -->
                    <hr />
                    <form method="post" action="empresa_alterar.php">
                        <input type="hidden" name="cod" value="<?= $dados[0]['id_empresa'] ?>"/>
                    <div class="form-group">
                        <label>Nome da empresa</label>
                        <input class="form-control" placeholder="Digite aqui.." id="nome_empresa" name="nome_empresa" value="<?= $dados[0]['nome_empresa'] ?>"/>
                        <label  id="val_nome_empresa" class="estilo-validar" ></label>
                        <br>
                        <label>Endereço da empresa</label>
                        <input class="form-control" placeholder="Digite aqui.." id="endereco_empresa" name="endereco_empresa" value="<?= $dados[0]['endereco_empresa'] ?>"/>
                        <label  id="val_end_empresa" class="estilo-validar" ></label>
                        <br>
                        <label>Telefone da empresa</label>
                        <input class="form-control" placeholder="Digite aqui.." id="telefone_empresa" name="telefone_empresa" value="<?= $dados[0]['telefone_empresa'] ?>"/>
                        <label  id="val_tel_empresa" class="estilo-validar" ></label>
                        <br>
                    </div>
                        <button type="submit" class="btn btn-success" onclick="return ValidarCampos(2)" name="btnSalvar">Salvar</button>
                        <button type="submit" class="btn btn-danger" name="btnExcluir">Excluir</button>
                    </form>
                </div>
                <!-- /. PAGE INNER  -->
            </div>
            <!-- /. PAGE WRAPPER  -->
        </div>
       


    </body>
</html>
