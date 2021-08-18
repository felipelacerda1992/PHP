<?php
require_once '../CONTROLLER/UsuarioCTRL.php';
include_once './_msg.php';

if (isset($_POST['btnAcessar'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    
    $ctrl = new UsuarioCTRL();
    $ret = $ctrl->ValidarLogin($email, $senha);
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <?php
        include_once '_head.php';
    ?>
    <body>
        <div class="container">
            <div class="row text-center ">
                <div class="col-md-12">
                    <br /><br />
                    <?php
                                        if (isset($ret)) {
                                            ExibirMsg($ret);
                                        }
                            ?>
                    <h2> Financeiro PHP</h2>

                    <h5>( Faça seu login para ter acesso )</h5>
                    <br />
                </div>
            </div>
            <div class="row ">

                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong>   Entre com seus dados </strong>  
                        </div>
                        <div class="panel-body">
                            <form action="login.php" method="post">
                                <br />
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                    <input type="text" class="form-control" placeholder="Seu e-mail " id="email_login" name="email"/>
                                    
                                </div>    
                                <label  id="val_email_login" class="estilo-validar" ></label>
                                    <br>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                    <input type="password" class="form-control"  placeholder="Sua senha" id="senha_login" name="senha"/>
                                    
                                </div>
                                <label  id="val_senha_login" class="estilo-validar" ></label>
                                <br>

                                    <button class="btn btn-primary" name="btnAcessar" onclick="return ValidarCampos(6)">Acessar</button>
                                <hr />
                                Não é registrado? <a href="cadastro.php" >click aqui! </a> 
                            </form>
                        </div>

                    </div>
                </div>


            </div>
        </div>


    </body>
</html>
