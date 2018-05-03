<?php
require_once '../model/Produto.php';
require_once '../model/Categoria.php';
require_once '../model/Marca.php';
require_once '../model/Modelo.php';
require_once '../library/Conexao.class.php';

class ProdutoDAL
{

    public static $conn = Database::conexao();

    public static function insereProduto(Produto $prod, Marca $marca, Modelo $mod): string
    {
        $connection = self::$conn;
        
        $descProd = $prod->getDescProd();
        $descCompleta = $prod->getDescCompletaProd();
        $statusProd = $prod->getStatusProd();
        $marcaProd = $marca->getIdMarca();
        $modeloProd = $mod->getIdModelo();
        
        $sql = "";
        
        $connection->executarSQL($sql);
        
        $idProd = $connection->insert_id;
        
        $prod->setIdProd($idProd);
    }

    public static function atualizaProduto(Produto $prod, Marca $marca, Modelo $mod): string
    {
        $connection = self::$conn;
        
        $descProd = $prod->getDescProd();
        $descCompleta = $prod->getDescCompletaProd();
        $statusProd = $prod->getStatusProd();
        $marcaProd = $marca->getIdMarca();
        $modeloProd = $mod->getIdModelo();
        $idProd = $prod->getIdProd();
        
        $sql = "";
        
        return $connection->executarSQL($sql);
    }
    
}