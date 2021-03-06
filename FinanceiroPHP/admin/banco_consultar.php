<?php
require_once '../CONTROLLER/BancoCTRL.php';
include_once './_msg.php';

$ctrl = new BancoCTRL();

$bancos = $ctrl->ConsultarBanco();
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
                            <h2>CONSULTAR BANCO</h2>   
                            <h5>Aqui você consulta seus bancos!</h5>

                        </div>
                    </div>
                    <!-- /. ROW  -->
                    <hr />
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Advanced Tables -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Lista de Bancos
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>Código banco</th>
                                                    <th>Nome do banco </th>
                                                    <th>Ação</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php for ($i = 0; $i < count($bancos); $i++) { ?>
                                                <tr class="odd gradeX">
                                                    <td><?= $bancos[$i]['codigo_banco'] ?></td>
                                                    <td><?= $bancos[$i]['nome_banco'] ?></td>
                                                    <td>
                                                        <a href="banco_alterar.php?cod=<?= $bancos[$i]['id_banco'] ?>" class="btn btn-warning btn-xs">Alterar</a>
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
