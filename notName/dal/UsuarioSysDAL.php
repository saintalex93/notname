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

    public static function buscaUsuarioSys(): array
    {
        UsuarioSysDAL::connect();
        
        $sql = "SELECT * FROM USUARIO";
        
        UsuarioSysDAL::$connection->executarSQL($sql);
        
        $resultado = UsuarioSysDAL::$connection->getResultados();
        
        $arrayUsr = array();
        
        foreach ($resultado as $linha) {
            $usr = new UsuarioSys();
            
            $usr->setIdUsr($linha['USR_nCOD']);
            $usr->setNomeUsr($linha['USR_cNOME']);
            $usr->setLoginUsr($linha['USR_cLOGIN']);
            $usr->setSenhaUsr($linha['USR_cSENHA']);
            $usr->setEmail($linha['USR_EMAIL']);
            $usr->setStatusUsr($linha['USR_cSTATUS']);
            $usr->setPermissionUsr($linha['USR_nPERMISSAO']);
            
            $arrayUsr[] = $usr;
        }
        
        return $arrayUsr;
    }

    public static function alteraUsuarioSys(UsuarioSys $usr)
    {
        UsuarioSysDAL::connect();        
              
        $id = $usr->getIdUsr();
        $nome = $usr->getNomeUsr();
        $login = $usr->getLoginUsr();
        $senha = $usr->getSenhaUsr();
        $statusUsr = $usr->getStatusUsr();
        $permissao = $usr->getPermissionUsr();
        $email = $usr->getEmail();
        
        $sql = "UPDATE USUARIO SET USR_cLOGIN = '$login', USR_cSENHA = '$senha', USR_cNOME = '$nome', USR_EMAIL = '$email', USR_nPERMISSAO='$permissao' WHERE USR_nCOD = $id";
        
        return UsuarioSysDAL::$connection->executarSQL($sql);
    }
}