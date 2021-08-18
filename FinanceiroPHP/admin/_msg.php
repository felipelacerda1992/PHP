<?php

function ExibirMsg($ret) {
    switch ($ret) {
        case -100:
            echo '<div class="alert alert-danger">
            Usuário não encontrado!
            </div>';
            break;
        
        case -3:
            echo '<div class="alert alert-warning">
            Não foi possível excluir o item porque ele está em uso!
            </div>';
            break;
        
        case -2:
            echo '<div class="alert alert-warning">
            Senha não conferem!
            </div>';
            break;
        
        case -1:
            echo '<div class="alert alert-danger">
            Ocorreu um erro na operação!
            </div>';
            break;
        
        case 0:
            echo '<div class="alert alert-warning">
            Preencher todos os campos!
            </div>';
            break;
        
        case 1:
            echo '<div class="alert alert-success">
            Dados gravados com sucesso!
            </div>';
            break;
        
        case 2:
            echo '<div class="alert alert-success">
            Item excluído com sucesso!
            </div>';
            break;
    }
}

