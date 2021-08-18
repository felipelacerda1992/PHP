<?php

require_once '../CONTROLLER/MovimentoCTRL.php';

$tipo = 2;
$dtInicial = '';
$dtFinal = '';


if (isset($_POST['btnPesquisar'])) {
    
    $tipo = $_POST['tipo'];
    $dtInicial = $_POST['dtInicial'];
    $dtFinal = $_POST['dtFinal'];
    
    $ctrl = new MovimentoCTRL();
    $move = $ctrl->ConsultarMovimento($tipo, $dtInicial, $dtFinal);
}
?>﻿
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
                            <h2>CONSULTAR MOVIMENTO</h2>   
                            <h5>Aqui você consulta suas movimentações!</h5>

                        </div>
                    </div>
                    
                    <!-- /. ROW  -->
                    <hr />
                    <form method="post" action="consulta_movimento.php">
                    <div class="form-group">
                        <label>Tipo de movimentação:</label>
                        <select class="form-control" name="tipo">
                            <option value="2" <?= $tipo == 2 ? 'selected' : '' ?>>Todos</option>
                            <option value="0" <?= $tipo == 0 ? 'selected' : '' ?>>Entrada</option>
                            <option value="1" <?= $tipo == 1 ? 'selected' : '' ?> >Saída</option>
                        </select>
                        <br>
                        <label>Data Inicial</label>
                        <input type="date" class="form-control" name="dtInicial" value="<?= $dtInicial ?>"/>
                        <br>
                        <label>Data Final</label>
                        <input type="date" class="form-control" name="dtFinal" value="<?= $dtFinal ?>"/>                                               
                    <br>
                    </div>
                    
                        <button type="submit" class="btn btn-info" name="btnPesquisar">Pesquisar</button>
                    <!-- /. ROW  -->
                    </form>
                    <hr />
                    <?php if (isset($move)){ ?>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Advanced Tables -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Lista de Movimentos
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>Tipo</th>
                                                    <th>Conta/Banco</th>
                                                    <th>Empresa </th>
                                                    <th>Categoria </th>
                                                    <th>Data </th>
                                                    <th>Valor</th>
                                                    <th>Observação</th>
                                 
                                                    <th>Ação</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php for ($i = 0; $i < count($move); $i++) { ?>
                                                <tr class="odd gradeX">
                                                    <td><?= $move[$i]['tipo_movimento'] == 0 ? 'Entrada' : 'Saída' ?></td>
                                                    <td><?= $move[$i]['agencia_conta'] ?> / <?= $move[$i]['nome_banco'] ?></td>
                                                    <td><?= $move[$i]['nome_empresa'] ?></td>
                                                    <td><?= $move[$i]['nome_categoria'] ?></td>
                                                    <td><?= $move[$i]['data_movimento'] ?></td>
                                                    <td><?= $move[$i]['valor_movimento'] ?></td>
                                                    <td><?= $move[$i]['obs_movimento'] ?></td>
                                  
                                                </tr>
                                                <?php } ?> 
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                            <!--End Advanced Tables -->
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <!-- /. PAGE INNER  -->
            </div>
            <!-- /. PAGE WRAPPER  -->
        </div>



    </body>
</html>
