<?php

require_once '../CONTROLLER/CategoriaCTRL.php';
require_once '../VO/CategoriaVO.php';
require_once './_msg.php';

//verifica se existe na URL o COD e se o valor do COD é numérico
if (isset($_GET['cod']) && is_numeric($_GET['cod'])) {
    $ctrl = new CategoriaCTRL();
    $dados = $ctrl->DetalharCategoria($_GET['cod']);
    
    //verifica se encontrou algo
    if (count($dados) == 0) {
        header('location: categoria_consultar.php');
    }
} else if (isset($_POST['btnSalvar'])){
    $vo = new CategoriaVO();
    
    $vo->setIdCategoria($_POST['cod']);
    $vo->setNome($_POST['nome_categoria']);
    
    $ctrl = new CategoriaCTRL();
    
    $ret = $ctrl->AlterarCategoria($vo);
    header('location: categoria_alterar.php?cod=' . $_POST['cod'] . '&ret=' . $ret);
}else if (isset ($_POST['btnExcluir'])) {
    $cod = $_POST['cod'];
    $ctrl = new CategoriaCTRL();
    
    $ret = $ctrl->ExcluirCategoria($cod);
    
    if ($ret == 2) {
        header('location: categoria_consultar.php?ret=' . $ret);
    }else{
        header('location: categoria_alterar.php?cod=' . $_POST['cod'] . '$ret=' .$ret);
    }
}

else {
    //caso a url estaa com algum erro redireciona 
    header('location: categoria_consultar.php');
}

?>
<!DOCTYPE html>
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
                            <h2>ALTERAR CATEGORIA</h2>   
                            <h5>Aqui você altera suas categorias!</h5>

                        </div>
                    </div>
                    <!-- /. ROW  -->
                    <hr />
                    <form method="post" action="categoria_alterar.php">
                        <input type="hidden" name="cod" value="<?= $dados[0]['id_categoria'] ?>"/>
                    <div class="form-group">
                        <label>Nome da categoria</label>
                        <input class="form-control" placeholder="Digite aqui.." id="nome_categoria" name="nome_categoria" value="<?= $dados[0]['nome_categoria'] ?>"/>
                        <label id="val_nome_categoria" class="estilo-validar" ></label>
                    </div>
                    <button type="submit" class="btn btn-success" onclick="return ValidarCampos(1)" name="btnSalvar">Salvar</button>
                    <button type="submit" class="btn btn-danger" name="btnExcluir">Excluir</button>
                    </form>
                </div>
                <!-- /. PAGE INNER  -->
            </div>
            <!-- /. PAGE WRAPPER  -->
        </div>
       


    </body>
</html>
