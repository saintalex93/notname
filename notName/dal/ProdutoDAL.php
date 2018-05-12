<?php
require_once '../model/Produto.php';
require_once '../library/Conexao.class.php';

class ProdutoDAL
{

    /**
     *
     * @var Database
     */
    private static $connection = null;

    private static function connect()
    {
        if (is_null(ProdutoDAL::$connection)) {
            ProdutoDAL::$connection = new Database();
        }
    }

    public static function insereProduto(Produto $prod): string
    {
        ProdutoDAL::connect();
        
        $descProd = $prod->getDescProd();
        $descComp = $prod->getDescCompletaProd();
        $prodStatus = $prod->getStatusProd();
        $marcaID = $prod->getIdMarca();
        $modeloID = $prod->getIdModelo();
        $categID = $prod->getIdCateg();
        $categoriaDesc = $prod->getDescCateg();
        
        $sql = "";
        
        ProdutoDAL::$connection->executarSQL($sql);
        
        return ProdutoDAL::$connection->returnID();
    }

    public static function atualizaProduto(Produto $prod): string
    {
        ProdutoDAL::connect();
        
        $idProd = $prod->getIdProd();
        $descProd = $prod->getDescProd();
        $descComp = $prod->getDescCompletaProd();
        $prodStatus = $prod->getStatusProd();
        $marcaID = $prod->getIdMarca();
        $modeloID = $prod->getIdModelo();
        $categID = $prod->getIdCateg();
        $categoriaDesc = $prod->getDescCateg();
        
        $sql = "";
        
        return ProdutoDAL::$connection->executarSQL($sql);
    }
    
    public static function buscaProduto(Produto $prod)
    {
        
    }
}