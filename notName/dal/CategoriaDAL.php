<?php

require_once __DIR__ . '/../model/Categoria.php';
require_once __DIR__ . '/../library/Conexao.class.php';

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
        $descCat = $cat->getStatusCateg();


        $sql = "INSERT INTO CATEGORIA (CATEGORIA_cDESC, CATEGORIA_cSTATUS) VALUES('$nomeCat','$descCat')";

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


        $sql = "SELECT * FROM CATEGORIA";

        CategoriaDAL::$connection->executarSQL($sql);

        $resultados = CategoriaDAL::$connection->getResultados();


        $arrayCategoria = array();

        foreach ($resultados as $resultado) {
            $cat = new Categoria();
            
            $id = $resultado['CATEGORIA_nID'];
            $descricao = $resultado['CATEGORIA_cDESC'];
            $status = $resultado['CATEGORIA_cSTATUS'];

            $cat->setIdCateg($id);
            $cat->setDescCateg($descricao);
            $cat->setStatusCateg($status);

            $arrayCategoria[] = $cat;
        }
        return $arrayCategoria;

    }

}
