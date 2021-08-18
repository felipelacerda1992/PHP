<?php
require_once '../VO/CategoriaVO.php';
require_once '../CONTROLLER/CategoriaCTRL.php';

include_once '_msg.php';

if (isset($_POST['btnSalvar'])) {
    $objCategoria = new CategoriaVO();
    $ctrl = new CategoriaCTRL();
    
    $objCategoria->setNome($_POST['nome_categoria']);
    
    $ret = $ctrl->SalvarCategoria($objCategoria);
   
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
                            
                            <h2>NOVA CATEGORIA</h2>   
                            <h5>Aqui você cadastra suas categorias!</h5>
                        </div>
                    </div>
                    <!-- /. ROW  -->
                    <hr />
                    <form method="post" action="categoria_novo.php">
                    <div class="form-group">
                        <label>Nome da categoria</label>
                        <input class="form-control" placeholder="Digite aqui.." id="nome_categoria" name="nome_categoria" />
                        <label  id="val_nome_categoria" class="estilo-validar" ></label>
                    </div>
                    <button type="submit" class="btn btn-success" name="btnSalvar" onclick="return ValidarCampos(1)">Salvar</button>
                    </form>
                </div>
                <!-- /. PAGE INNER  -->
            </div>
            <!-- /. PAGE WRAPPER  -->
        </div>
<!--        <script> 
            function ValidarCampos(){
                if($("#nome_categoria").val().trim() == ""){
                    alert("Preencher o campo NOME");
                    return false;
                }
            }
        </script>-->
    </body>
</html>
