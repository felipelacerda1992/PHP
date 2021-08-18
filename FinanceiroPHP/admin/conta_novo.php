<?php
require_once '../CONTROLLER/BancoCTRL.php';
require_once '../CONTROLLER/ContaCTRL.php';
require_once '../VO/ContaVO.php';
include_once '_msg.php';

$ctrl_banco = new BancoCTRL();
$bancos = $ctrl_banco->ConsultarBanco();

if (isset($_POST['btnSalvar'])) {
    $objConta = new ContaVO();
    $ctrl = new ContaCTRL();

    $objConta->setAgencia($_POST['agencia_conta']);
    $objConta->setNumero($_POST['numero_conta']);
    $objConta->setSaldo($_POST['saldo_conta']);
    $objConta->setStatus(isset($_POST['status_conta']) ? 1 : 0);
    $objConta->setIdBanco($_POST['id_banco']);


    $ret = $ctrl->SalvarConta($objConta);
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
                            if (isset($ret)) {
                                ExibirMsg($ret);
                            }
                            ?>
                            <h2>NOVA CONTA</h2>   
                            <h5>Aqui você cadastra suas contas!</h5>

                        </div>
                    </div>
                    <!-- /. ROW  -->
                    <hr />
                    <form method="post" action="conta_novo.php">
                        <div class="form-group">
                            <label>Selecione o banco:</label>
                            <select class="form-control" id="banco_conta" name="id_banco">
                                <option value="" selected>Selecione</option>
                                <?php for ($i = 0; $i < count($bancos); $i++) { ?>
                                    <option value="<?= $bancos[$i]['id_banco'] ?>"><?= $bancos[$i]['codigo_banco'] . ' - ' . $bancos[$i]['nome_banco'] ?></option>
                                <?php } ?>
                            </select>
                            <label  id="val_ban_conta" class="estilo-validar" ></label>
                        </div>
                        <div class="form-group">
                            <label>Agência</label>
                            <input class="form-control" placeholder="Digite aqui.." id="agencia_conta" name="agencia_conta"/>
                            <label  id="val_ag_conta" class="estilo-validar" ></label>
                        </div>
                        <div class="form-group">
                            <label>Número conta</label>
                            <input class="form-control" placeholder="Digite aqui.." id="numero_conta" name="numero_conta"/>
                            <label  id="val_num_conta" class="estilo-validar" ></label>
                        </div>
                        <div class="form-group">
                            <label>Saldo</label>
                            <input class="form-control" placeholder="Digite aqui.." id="saldo_conta" name="saldo_conta"/>
                            <label  id="val_saldo_conta" class="estilo-validar" ></label>
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="status_conta" value="1" />Ativo
                                </label>
                            </div>
                        </div>  
                        <button type="submit" class="btn btn-success" name="btnSalvar" onclick="return ValidarCampos(4)">Salvar</button>
                    </form>
                </div>

            </div>
            <!-- /. PAGE INNER  -->
        </div>

    </body>
</html>
