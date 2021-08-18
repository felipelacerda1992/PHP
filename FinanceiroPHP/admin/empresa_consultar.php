<?php
require_once '../CONTROLLER/EmpresaCTRL.php';
include_once './_msg.php';

$ctrl = new EmpresaCTRL();

$empresas = $ctrl->ConsultarEmpresa();

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
                            <h2>CONSULTAR EMPRESA</h2>   
                            <h5>Aqui você consulta suas empresas!</h5>

                        </div>
                    </div>
                    <!-- /. ROW  -->
                    <hr />
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Advanced Tables -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Lista de Empresas
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>Nome da empresa</th>
                                                    <th>Endereço </th>
                                                    <th>Telefone </th>
                                                    <th>Ação</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php for ($i = 0; $i < count($empresas); $i++) { ?>                                               
                                                <tr class="odd gradeX">
                                                    <td><?= $empresas[$i]['nome_empresa'] ?></td>
                                                    <td><?= $empresas[$i]['endereco_empresa'] ?></td>
                                                    <td><?= $empresas[$i]['telefone_empresa'] ?></td>
                                                    <td>
                                                        <a href="empresa_alterar.php?cod=<?= $empresas[$i]['id_empresa'] ?>" class="btn btn-warning btn-xs">Alterar</a>
                                                    </td>                                
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
                </div>
                <!-- /. PAGE INNER  -->
            </div>
            <!-- /. PAGE WRAPPER  -->
        </div>



    </body>
</html>
