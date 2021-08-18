<?php
require_once '../CONTROLLER/UsuarioCTRL.php';

if (isset($_GET['close']) && $_GET['close'] == 1) {
    UtilCTRL::Deslogar();
}
?>
<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            
            <!--IMAGEM PERFIL USUÁRIO
            <li class="text-center">
                <img src="assets/img/find_user.png" class="user-image img-responsive"/>
            </li>-->

            <li>
                <a href="#"><i class="fa fa-sitemap fa-3x"></i> Gerenciar Categoria<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="categoria_novo.php">Nova Categoria</a>
                    </li>
                    <li>
                        <a href="categoria_consultar.php">Consultar/Alterar</a>
                    </li>
                    
                </ul>
            </li>  
            <li>
                <a href="#"><i class="fa fa-sitemap fa-3x"></i> Gerenciar Empresa<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="empresa_novo.php">Nova Empresa</a>
                    </li>
                    <li>
                        <a href="empresa_consultar.php">Consultar/Alterar</a>
                    </li>
                    
                </ul>
            </li>  
            <li>
                <a href="#"><i class="fa fa-sitemap fa-3x"></i> Gerenciar Banco<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="banco_novo.php">Novo Banco</a>
                    </li>
                    <li>
                        <a href="banco_consultar.php">Consultar/Alterar</a>
                    </li>
                    
                </ul>
            </li>  
            <li>
                <a href="#"><i class="fa fa-sitemap fa-3x"></i> Gerenciar Conta<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="conta_novo.php">Nova Conta</a>
                    </li>
                    <li>
                        <a href="conta_consultar.php">Consultar/Alterar</a>
                    </li>
                    
                </ul>
            </li>  
            <li>
                <a href="#"><i class="fa fa-sitemap fa-3x"></i> Gerenciar Movimento<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="movimento.php">Realizar Movimento</a>
                    </li>
                    <li>
                        <a href="consulta_movimento.php">Consultar/Alterar</a>
                    </li>
                    
                </ul>
            </li>  
            <li  >
                <a href="_menu.php?close=1"><i class="fa fa-close-o fa-3x"></i>  Sair</a>
            </li>	
        </ul>

    </div>

</nav>  