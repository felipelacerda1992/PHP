<?php
require_once '../VO/MovimentoVO.php';
require_once '../CONTROLLER/MovimentoCTRL.php';
require_once '../CONTROLLER/EmpresaCTRL.php';
require_once '../CONTROLLER/ContaCTRL.php';
require_once '../CONTROLLER/CategoriaCTRL.php';

include_once '_msg.php';

if (isset($_POST['btnSalvar'])) {
    $objMovimento = new MovimentoVO();
    $ctrl = new MovimentoCTRL();
    
    $objMovimento->setTipo($_POST['tipo_mov']);
    $objMovimento->setData($_POST['data_mov']);
    $objMovimento->setValor($_POST['valor_mov']);
    $objMovimento->setIdConta($_POST['conta_mov']);
    $objMovimento->setIdEmpresa($_POST['empresa_mov']);
    $objMovimento->setIdCategoria($_POST['categoria_mov']);
    
    
    $ret = $ctrl->SalvarMovimento($objMovimento);
}

$ctrl_conta = new ContaCTRL();
$contas = $ctrl_conta->ConsultarContaAtiva();

$ctrl_empresa = new EmpresaCTRL();
$empresas = $ctrl_empresa->ConsultarEmpresa();
  
$ctrl_categoria = new CategoriaCTRL();
$categorias = $ctrl_categoria->ConsultarCategoria();
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
                            <h2>NOVO MOVIMENTO</h2>   
                            <h5>Aqui você cadastra suas movimentações!</h5>

                        </div>
                    </div>
                    <!-- /. ROW  -->
                    <hr />
                    <form method="post" action="movimento.php" >
                    <div class="form-group">
                        <div class="form-group">
                        <label>Tipo de movimentação:</label>
                        <select class="form-control" id="tipo_mov" name="tipo_mov">

                            <option value="" selected>Selecione</option>
                            <option value="0" >Entreda</option>
                            <option value="1" >Saída</option>
                        </select>
                        <label  id="val_tipo_mov" class="estilo-validar" ></label>
                        </div>
                        <div class="form-group">
                        <label>Data</label>
                        <input type="date" class="form-control" id="data_mov" name="data_mov"/>
                        <label  id="val_data_mov" class="estilo-validar" ></label>
                        </div>
                        <div class="form-group">
                            <label>Selecione a conta:</label>
                            <select class="form-control" id="conta_mov" name="conta_mov">
                                <option value="" selected>Selecione</option>
                                <?php for ($i = 0; $i < count($contas); $i++) { ?>
                                    <option value="<?= $contas[$i]['id_conta'] ?>"><?= $contas[$i]['agencia_conta'] . ' - ' . $contas[$i]['numero_conta'] ?></option>
                                <?php } ?>
                            </select>
                            <label  id="val_conta_mov" class="estilo-validar" ></label>
                        </div>
                        <div class="form-group">
                            <label>Selecione a empresa:</label>
                            <select class="form-control" id="empresa_mov" name="empresa_mov">
                                <option value="" selected>Selecione</option>
                                <?php for ($i = 0; $i < count($empresas); $i++) { ?>
                                    <option value="<?= $empresas[$i]['id_empresa'] ?>"><?= $empresas[$i]['nome_empresa'] ?></option>
                                <?php } ?>
                            </select>
                            <label  id="val_empresa_mov" class="estilo-validar" ></label>
                        </div>
                        <div class="form-group">
                            <label>Selecione a categoria:</label>
                            <select class="form-control" id="categoria_mov" name="categoria_mov">
                                <option value="" selected>Selecione</option>
                                <?php for ($i = 0; $i < count($categorias); $i++) { ?>
                                    <option value="<?= $categorias[$i]['id_categoria'] ?>"><?= $categorias[$i]['nome_categoria'] ?></option>
                                <?php } ?>
                            </select>
                            <label  id="val_categoria_mov" class="estilo-validar" ></label>
                        </div>
                        <div class="form-group">
                        <label>Valor</label>
                        <input type="text" class="form-control" id="valor_mov" name="valor_mov"/>
                        <label  id="val_valor_mov" class="estilo-validar" ></label>
                        </div>
                        <div class="form-group">
                        <label>Observações</label>
                        <textarea class="form-control" rows="3" name="obs_mov"></textarea>
                        </div>
                    </div>
                        <button type="submit" class="btn btn-success" name="btnSalvar" onclick="return ValidarCampos(99)">Lançar</button>
                    </form>
                </div>
                <!-- /. PAGE INNER  -->
            </div>
            <!-- /. PAGE WRAPPER  -->
        </div>



    </body>
</html>
