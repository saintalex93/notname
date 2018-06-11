<?php
require_once __DIR__ . '/../model/UsuarioSys.php';
require_once __DIR__ . '/../library/Conexao.class.php';

class UsuarioSysDAL
{

    /**
     *
     * @var Database
     */
    private static $connection = null;

    private static function connect()
    {
        if (is_null(UsuarioSysDAL::$connection)) {
            
            UsuarioSysDAL::$connection = new Database();
        }
    }

    public static function insereUsuario(UsuarioSys $usr)
    {
        UsuarioSysDAL::connect();
        
        $nome = $usr->getNomeUsr();
        $login = $usr->getLoginUsr();
        $senha = $usr->getSenhaUsr();
        $statusUsr = $usr->getStatusUsr();
        $permissao = $usr->getPermissionUsr();
        $email = $usr->getEmail();
        
        $sql = "INSERT INTO USUARIO 
                (USR_cSTATUS,USR_cLOGIN,USR_cSENHA,USR_cNOME,USR_nPERMISSAO,USR_EMAIL)
                VALUES
                ('$statusUsr','$login','$senha','$nome','$permissao','$email')";
        
        return UsuarioSysDAL::$connection->executarSQL($sql);
    }
}