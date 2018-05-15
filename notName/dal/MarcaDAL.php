<?php
require_once '../model/Marca.php';
require_once '../library/Conexao.class.php';

class MarcaDAL
{

    /**
     *
     * @var Database
     */
    private static $connection = null;

    private static function connect()
    {
        if (is_null(MarcaDAL::$connection)) {
            MarcaDAL::$connection = new Database();
        }
    }

    public static function insereMarca(Marca $marca): string
    {
        MarcaDAL::connect();
        
        $descMarca = $marca->getDescMarca();
        $statusMarca = $marca->getStatusMarca();
        
        $sql = "INSERT INTO MARCA (MARCA_cDESC, MARCA_nSTATUS) VALUES ('$descMarca',$statusMarca)";
        
//         MarcaDAL::$connection->executarSQL($sql);
        
        return MarcaDAL::$connection->executarSQL($sql);
    }

    public static function buscaMarca()
    {
        MarcaDAL::connect();
        
        MarcaDAL::$connection->executarSQL("SELECT * FROM MARCA");
        
        $resultado = MarcaDAL::$connection->getResultados();
        
        $arrayMarca = array();
        
        foreach ($resultado as $linha) {
            
            $resultMarca = new Marca();
            
            $resultMarca->setIdMarca($linha['MARCA_nID']);
            $resultMarca->setDescMarca($linha['MARCA_cDESC']);
            $resultMarca->setStatusMarca($linha['MARCA_nSTATUS']);
            
            $arrayMarca[] = $resultMarca;
        }
        
        return $arrayMarca;
    }

    public static function atualizaMArcac(Marca $marca): string
    {
        MarcaDAL::connect();
        
        $sql = "";
        
        MarcaDAL::$connection->executarSQL($sql);
        
        return MarcaDAL::$connection->returnID();
    }
}