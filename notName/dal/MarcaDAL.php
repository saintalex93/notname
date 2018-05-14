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
        if (is_null(MarcaDAL::connect())) {
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

    public static function buscaMarca(Marca $marca): array
    {
        MarcaDAL::connect();
        
        $sql = "";
        
        $resultado = MarcaDAL::$connection->executarSQL($sql);
        
        $arrayMarca = array();
        
        foreach ($resultado as $resultado) {
            $resultMarca = new Marca();
            
            $resultMarca->setIdMarca($resultado['MARCA_nID']);
            $resultMarca->setDescMarca($resultado);
            $resultMarca->setStatusMarca($resultado['MARCA_nSTATU']);
            
            $arrayMarca = $resultMarca;
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