
<?php


class UtilCTRL {
    
    private static function IniciarSession() {
        if (!isset($_SESSION)) {
            session_start();
        }
    }
    
    public static function CriarSessaoCodLogado($cod){
        self::IniciarSession();
        $_SESSION['cod'] = $cod;
        
    }
    
    public static function CodigoLogado() {
        self::IniciarSession();
        return $_SESSION['cod'];
    }
    
    public static function Deslogar() {
        self::IniciarSession();
        unset($_SESSION['cod']);
        header('location: login.php');
    }
    
    public static function VerLogado() {
        self::IniciarSession();
        if (!isset($_SESSION['cod']) || $_SESSION['cod'] == '') {
            header('location: login.php');
        }
    }
    


//    public static function CodigoLogado(){
//        return 1;
//    }
}
