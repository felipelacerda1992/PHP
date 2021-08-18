<?php
require_once '../VO/EmpresaVO.php';
require_once '../CONTROLLER/EmpresaCTRL.php';

include_once '_msg.php';

if (isset($_POST['btnSalvar'])) {
    $objEmpresa = new EmpresaVO();
    $ctrl = new EmpresaCTRL();
    
    $objEmpresa->setNome($_POST['nome_empresa']);
    $objEmpresa->setEndereco($_POST['endereco_empresa']);
    $objEmpresa->setTelefone($_POST['telefone_empresa']);
    
    $ret = $ctrl->SalvarEmpresa($objEmpresa);
   
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
                                        if (isset($ret)) {
                                            ExibirMsg($ret);
                                        }
                            ?>
                            
                            <h2>NOVA EMPRESA</h2>   
                            <h5>Aqui você cadastra suas empresas!</h5>

                        </div>
                    </div>
                    <!-- /. ROW  -->
                    <hr />
                    <form method="post" action="empresa_novo.php">
                    <div class="form-group">
                        <label>Nome da empresa</label>
                        <input class="form-control" placeholder="Digite aqui.." id="nome_empresa" name="nome_empresa"/>
                        <label  id="val_nome_empresa" class="estilo-validar" ></label>
                        <br>
                        <label>Endereço da empresa</label>
                        <input class="form-control" placeholder="Digite aqui.." id="endereco_empresa" name="endereco_empresa"/>
                        <label  id="val_end_empresa" class="estilo-validar" ></label>
                        <br>
                        <label>Telefone da empresa</label>
                        <input class="form-control" placeholder="Digite aqui.." id="telefone_empresa" name="telefone_empresa"/>
                        <label  id="val_tel_empresa" class="estilo-validar" ></label>
                        <br>
                    </div>
                        <button type="submit" class="btn btn-success" name="btnSalvar" onclick="return ValidarCampos(2)">Salvar</button>
                    </form>
                </div>
                <!-- /. PAGE INNER  -->
            </div>
            <!-- /. PAGE WRAPPER  -->
        </div>
       


    </body>
</html>
