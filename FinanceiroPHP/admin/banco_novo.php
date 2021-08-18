<?php
require_once '../VO/BancoVO.php';
require_once '../CONTROLLER/BancoCTRL.php';

include_once '_msg.php';

if (isset($_POST['btnSalvar'])) {
    $objBanco = new BancoVO();
    $ctrl = new BancoCTRL();
    
    $objBanco->setNome($_POST['nome_banco']);
    $objBanco->setCodBanco($_POST['codigo_banco']);
    
    $ret = $ctrl->SalvarBanco($objBanco);
   
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
                            <h2>NOVO BANCO</h2>   
                            <h5>Aqui você cadastra seus bancos!</h5>

                        </div>
                    </div>
                    <!-- /. ROW  -->
                    <hr />
                    <form method="post" action="banco_novo.php">
                    <div class="form-group">
                        <label>Código do banco</label>
                        <input class="form-control" placeholder="Digite aqui.." id="codigo_banco" name="codigo_banco"/>
                        <label  id="val_cod_banco" class="estilo-validar" ></label>
                        <br>
                        <label>Nome do banco</label>
                        <input class="form-control" placeholder="Digite aqui.." id="nome_banco" name="nome_banco"/>
                        <label  id="val_nome_banco" class="estilo-validar" ></label>
                        <br>                       
                    </div>
                    <button type="submit" class="btn btn-success" name="btnSalvar" onclick="return ValidarCampos(3)">Salvar</button>
                    </form>
                </div>
                <!-- /. PAGE INNER  -->
            </div>
            <!-- /. PAGE WRAPPER  -->
        </div>
       


    </body>
</html>
