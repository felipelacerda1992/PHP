<?php
require_once '../CONTROLLER/ContaCTRL.php';
require_once './_msg.php';

$ctrl = new ContaCTRL();

$contas = $ctrl->ConsultarConta();
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
                            <h2>CONSULTAR CONTA</h2>   
                            <h5>Aqui você consulta suas contas!</h5>

                        </div>
                    </div>
                    <!-- /. ROW  -->
                    <hr />
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Advanced Tables -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Lista de Contas
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>Banco</th>
                                                    <th>Agência </th>
                                                    <th>Número </th>
                                                    <th>Saldo </th>
                                                    <th>Status </th>
                                                    <th>Ação</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php for ($i = 0; $i < count($contas); $i++) { ?>
                                                <tr class="odd gradeX">
                                                    <td><?= $contas[$i]['nome_banco'] ?> </td>
                                                    
                                                    <td><?= $contas[$i]['agencia_conta'] ?> </td>
                                                    
                                                    <td><?= $contas[$i]['numero_conta'] ?> </td>
                                                    
                                                    <td><?= $contas[$i]['saldo_conta'] ?> </td>
                                                    
                                                    <td><?= $contas[$i]['status_conta'] ? 'Ativo' : 'Inativo' ?> </td>
                                                    <td>
                                                        <a href="conta_alterar.php?cod=<?= $contas[$i]['id_conta'] ?>" class="btn btn-warning btn-xs">Alterar</a>
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
