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

    public static function login(Login $login)
    {
        LoginDal::connect();
        
        $user = $login->getLogin();
        $password = $login->getSenha();
        
        $sql = "call USP_LOGIN('$user', '$password')";
        
        LoginDal::$connection->executaProcedure($sql);
        
        return LoginDal::$connection->getResultados();
    }
}

$usuario = new Login();
$usuario->setLogin("gabriela");
$usuario->setSenha("123");
$teste = LoginDal::login($usuario);
var_dump($teste);



