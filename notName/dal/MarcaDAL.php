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
        
        $sql = "";
        
        MarcaDAL::$connection->executarSQL($sql);
        
        return MarcaDAL::$connection->returnID();
    }

    public static function buscaMarca() : array
    {
        MarcaDAL::connect();
        
        $sql = "SELECT * FROM MARCA";
        
        MarcaDAL::$connection->executarSQL($sql);
        
        $resultado = MarcaDAL::$connection->getResultados();
        
        $arrayMarca = array();
        
        foreach ($resultado as $resultado) {
            
            $resultMarca = new Marca();
            
            $resultMarca->setIdMarca($resultado['MARCA_nID']);
            $resultMarca->setDescMarca($resultado['MARCA_cDESC']);
            $resultMarca->setStatusMarca($resultado['MARCA_nSTATUS']);
            
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