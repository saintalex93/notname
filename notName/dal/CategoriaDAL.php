<?php

require_once '../model/Categoria.php';
require_once '../library/Conexao.class.php';

class CategoriaDAL {

    /**
     *
     * @var Database
     */
    private static $connection = null;

    private static function connect() {
        if (is_null(CategoriaDAL::$connection)) {
            CategoriaDAL::$connection = new Database();
        }
    }

    public static function insereCategoria(Categoria $cat): string {
        CategoriaDAL::connect();

        $nomeCat = $cat->getDescCateg();
        $nomeCat = $cat->getStatusCateg();


        $sql = "";

        return CategoriaDAL::$connection->executarSQL($sql);
    }

    public static function alteraCategoria(Categoria $cat): string {
        CategoriaDAL::connect();
        $idCat = $cat->getIdCateg();
        $descCat = $cat->getDescCateg();
        $descCat = $cat->getStatusCateg();


        $sql = "";

        return CategoriaDAL::$connection->executarSQL($sql);
    }

    public static function buscaCategoria(): array {
        CategoriaDAL::connect();

        $sql = "";

        CategoriaDAL::$connection->executarSQL($sql);

        $resultado = CategoriaDAL::$connection->getResultados();

        $arrayCategoria = array();

        foreach ($resultado as $resultado) {
            $cat->setIdCateg($resultado['CATEGORIA_nID']);
            $cat->setDescCateg($resultado['CATEGORIA_cDESC']);
            $cat->setStatusCateg($resultado['CATEGORIA_cStatus']);


            $arrayCategoria[] = $cat;
        }
        return $arrayCategoria;
    }

}
