<?php
require_once '../library/Conexao.class.php';
require_once '../model/Login.php';

class LoginDAL
{

    /**
     *
     * @var Database
     */
    private static $connection = null;

    private static function connect()
    {
        if (is_null(LoginDal::$connection)) {
            LoginDal::$connection = new Database();
        }
    }

    public static function login()
    {
        LoginDal::connect();
        
        $sql = "call USP_LOGIN('gabriela', '123')";
        
        LoginDal::$connection->executaProcedure($sql);
        
        return LoginDal::$connection->getResultados();
    }
}

$teste = LoginDal::login();
var_dump($teste);



