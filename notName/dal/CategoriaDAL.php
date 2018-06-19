<?php
require_once __DIR__ . '/../model/Categoria.php';
require_once __DIR__ . '/../library/Conexao.class.php';

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
            CategoriaDAL::$connection = new Database();
        }
    }

    public static function insereCategoriaPai(Categoria $cat): string
    {
        CategoriaDAL::connect();
        
        $nomeCat = $cat->getDescCateg();
        $descCat = $cat->getStatusCateg();
        
        $sql = "INSERT INTO CATEGORIA (CATEGORIA_cDESC, CATEGORIA_cSTATUS,CATEGORIA_nCODPAI) VALUES('$nomeCat','$descCat',NULL)";
        
        return CategoriaDAL::$connection->executarSQL($sql);
    }

    public static function insereCategoriaFilho(Categoria $cat): string
    {
        CategoriaDAL::connect();
        
        $nomeCategfilha = $cat->getDescCateg();
        $statusCategFilha = $cat->getStatusCateg();
        $idCategPai = $cat->getCodPai();
        
        $sql = "INSERT INTO CATEGORIA(CATEGORIA_cDESC,CATEGORIA_cSTATUS,CATEGORIA_nCODPAI) VALUES('$nomeCategfilha','$statusCategFilha','$idCategPai')";
        
        return CategoriaDAL::$connection->executarSQL($sql);
    }

    public static function alteraCategoria(Categoria $cat): string
    {
        CategoriaDAL::connect();
        $idCat = $cat->getIdCateg();
        $descCat = $cat->getDescCateg();
        $statusCat = $cat->getStatusCateg();
        
        $sql = "UPDATE CATEGORIA SET CATEGORIA_cDESC = '$descCat', CATEGORIA_cSTATUS = '$statusCat' WHERE CATEGORIA_nID = $idCat";
        
        return CategoriaDAL::$connection->executarSQL($sql);
    }
    public static function alteraCategoriaFilho(Categoria $cat): string
    {
        CategoriaDAL::connect();
        $idCat = $cat->getIdCateg();
        $descCat = $cat->getDescCateg();
        $statusCat = $cat->getStatusCateg();
        $idPai = $cat->getCodPai();
        
        $sql = "UPDATE CATEGORIA SET CATEGORIA_cDESC = '$descCat', CATEGORIA_cSTATUS = '$statusCat', CATEGORIA_nCODPAI= $idPai WHERE CATEGORIA_nID = $idCat";
        
        return CategoriaDAL::$connection->executarSQL($sql);
    }

    public static function buscaCategoria(): array
    {
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
            $idCodPai = $resultado['CATEGORIA_nCODPAI'];
            
            $cat->setIdCateg($id);
            $cat->setDescCateg($descricao);
            $cat->setStatusCateg($status);
            $cat->setCodPai($idCodPai);
            
            $arrayCategoria[] = $cat;
        }
        return $arrayCategoria;
    }

    public static function buscaCategoriaIndex(): array
    {
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
            $idCodPai = $resultado['CATEGORIA_nCODPAI'];
            
            $cat->setIdCateg($id);
            $cat->setDescCateg($descricao);
            $cat->setStatusCateg($status);
            
            $cat->setCodPai($idCodPai);
            
            if ($cat->getCodPai() != null) {
                $sql = "SELECT CATEGORIA_cDESC FROM CATEGORIA WHERE CATEGORIA_nCODPAI = {$cat->getCodPai()}";
                
                CategoriaDAL::$connection->executarSQL($sql);
                
                $resultados = CategoriaDAL::$connection->getResultados();
                
                if($resultados){
                    $cat->setDescPai($resultado["CATEGORIA_cDESC"]);
                }
            }
            
            $arrayCategoria[] = $cat;
        }
        return $arrayCategoria;
    }

    public static function buscaCategoriaFilha(): array
    {
        CategoriaDAL::connect();
        
        $sql = "SELECT *, fn_buscaDescCategoriaPai(CATEGORIA_nCODPAI) as descCategoriaPai from CATEGORIA where CATEGORIA_nCODPAI is not null";
        
        CategoriaDAL::$connection->executarSQL($sql);
        
        $resultados = CategoriaDAL::$connection->getResultados();
        
        $arrayCategoria = array();
        
        foreach ($resultados as $resultado) {
            $cat = new Categoria();
            
            $id = $resultado['CATEGORIA_nID'];
            $descricao = $resultado['CATEGORIA_cDESC'];
            $status = $resultado['CATEGORIA_cSTATUS'];
            $idCodPai = $resultado['CATEGORIA_nCODPAI'];
            $descPai = $resultado['descCategoriaPai'];
            
            $cat->setIdCateg($id);
            $cat->setDescCateg($descricao);
            $cat->setStatusCateg($status);
            $cat->setCodPai($idCodPai);
            $cat->setDescPai($descPai);
            
            $arrayCategoria[] = $cat;
        }
        return $arrayCategoria;
    }
}
