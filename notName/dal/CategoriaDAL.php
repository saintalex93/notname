<?php
require_once '../model/Categoria.php';
require_once '../library/Conexao.class.php';

class CategoriaDAL
{

    public static $conn = Database::conexao();
    
    public static function insereCategoria(Categoria $cat) : string
    {
        
    }

    public static function buscaCategoria(Categoria $cat): array
    {
        $connection = self::$conn;
        
        $sql = "";
        
        $resultado = $connection->executarSQL($sql);
        
        $arrayCategoria = array();
        
        foreach ($resultado as $resultado) {
            $cat->setIdCateg($resultado['CATEGORIA_nID']);
            $cat->setDescCateg($resultado['CATEGORIA_cDESC']);
            
            $arrayCategoria[] = $cat;
        }
        return $arrayCategoria;
    }
}