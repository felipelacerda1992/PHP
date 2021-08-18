<?php
require_once '../CONTROLLER/UsuarioCTRL.php';
require_once '../VO/UsuarioVO.php';
include_once '_msg.php';

if (isset($_POST['btnFinalizar'])) {
    $vo = new UsuarioVO();
    $ctrl = new UsuarioCTRL();
    
    $vo->setNome($_POST['nome']);
    $vo->setEmail($_POST['email']);
    $vo->setSenha($_POST['senha']);
    $vo->setRSenha($_POST['rsenha']);
    
    $ret = $ctrl->FinalizarCadastro($vo);
}
?>

﻿<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <?php
    include_once '_head.php';
    ?>
    <body>
        <div class="container">
            <div class="row text-center  ">
                <div class="col-md-12">
                    <br /><br />
                    <h2> Financeiro PHP : Cadastro</h2>

                    <h5>( Cadastre-se para ter acesso )</h5>
                    <br />
                </div>
            </div>
            <div class="row">

                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong>  Preencha todos os campos </strong>  
                        </div>
                        <div class="panel-body">
                            
                            <?php
                                if (isset($ret)) {
                                ExibirMsg($ret);
                                }
                            ?>
                            <form method="post" action="cadastro.php">
                                <br/>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-circle-o-notch"  ></i></span>
                                    <input type="text" class="form-control" placeholder="Seu nome" id="nome_login" name="nome"/>
                                </div>
                                <label  id="val_nome_login" class="estilo-validar" ></label>
                                <br>
                                
                                <div class="form-group input-group">
                                    <span class="input-group-addon">@</span>
                                    <input type="text" class="form-control" placeholder="Seu e-mail" id="email_login" name="email"/>
                                </div>
                                    <label  id="val_email_login" class="estilo-validar" ></label>
                                <br>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                    <input type="password" class="form-control" placeholder="Sua senha" id="senha_login" name="senha"/>
                                </div>
                                    <label  id="val_senha_login" class="estilo-validar" ></label>
                                    <br>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                    <input type="password" class="form-control" placeholder="Repetir senha" name="rsenha"/>
                                </div>

                                        <button class="btn btn-success" name="btnFinalizar" onclick="return ValidarCampos(7)">Cadastrar</button>
                                <hr />
                                Já possui cadastro?  <a href="login.php" >Faça o login</a>
                            </form>
                        </div>

                    </div>
                </div>


            </div>
        </div>




    </body>
</html>
