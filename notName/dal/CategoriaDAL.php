<?php
require_once '../model/Categoria.php';
require_once '../library/Conexao.class.php';

class CategoriaDAL
{

    /**
     *
     * @var Database
     */
    private static $connection = null;

    private static function connect()
    {
        if (is_null(CategoriaDAL::$connection)) {
            ClienteDAL::$connection = new Database();
        }
    }

    public static function insereCategoria(Categoria $cat): string
    {
        CategoriaDAL::connect();
        
        $nomeCat = $cat->getDescCateg();
        
        $sql = "";
        
        return CategoriaDAL::$connection->executarSQL($sql);
    }

    public static function alteraCategoria(Categoria $cat): string
    {
        CategoriaDAL::connect();
        $idCat = $cat->getIdCateg();
        $descCat = $cat->getDescCateg();
        
        $sql = "";
        
        return CategoriaDAL::$connection->executarSQL($sql);
    }

    public static function buscaCategoria(Categoria $cat): array
    {
        CategoriaDAL::connect();
        
        $sql = "";
        
        CategoriaDAL::$connection->executarSQL($sql);
        $resultado = CategoriaDAL::$connection->getResultados();
        
        $arrayCategoria = array();
        
        foreach ($resultado as $resultado) {
            $cat->setIdCateg($resultado['CATEGORIA_nID']);
            $cat->setDescCateg($resultado['CATEGORIA_cDESC']);
            
            $arrayCategoria[] = $cat;
        }
        return $arrayCategoria;
    }
}