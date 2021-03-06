<?php
require_once __DIR__ . '/../model/Produto.php';
require_once __DIR__ . '/../model/Modelo.php';
require_once __DIR__ . '/../model/Categoria.php';
require_once __DIR__ . '/../library/Conexao.class.php';

class ProdutoDAL extends Modelo
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

    public static function insereProduto(Produto $prod) : string
    {
        ProdutoDAL::connect();

        $descProd = $prod->getDescProd();
        $descComp = $prod->getDescCompletaProd();
        $prodStatus = $prod->getStatusProd();
        $material = $prod->getMaterial();

        $categID = $prod->getIdCateg();

        $sql = "INSERT INTO PRODUTO (PRODUTO_cDESC, PRODUTO_cDESCCOMPLETA, PRODUTO_cSTATUS,PRODUTO_tMATERIAL)
        VALUES ('$descProd','$descComp','$prodStatus','$material')";

        if (ProdutoDAL::$connection->sqlNoTransact($sql)) {

            $id = ProdutoDAL::$connection->returnID();

            foreach ($categID as $cId) {

                $sql = "INSERT INTO PRODUTO_CATEGORIA (CATEGORIA_nID, PRODUTO_nID) VALUES ($cId,$id)";
                ProdutoDAL::$connection->executarSQL($sql);
            }

            return $id;
        }


    }

    public static function atualizaProduto(Produto $prod) : bool
    {
        ProdutoDAL::connect();

        $idProd = $prod->getIdProd();
        $descProd = $prod->getDescProd();
        $descComp = $prod->getDescCompletaProd();
        $prodStatus = $prod->getStatusProd();
        $material = $prod->getMaterial();

        $categID = $prod->getIdCateg();

        $sql = "UPDATE PRODUTO SET PRODUTO_cDESC = '$descProd', PRODUTO_cDESCCOMPLETA = '$descComp',
         PRODUTO_cSTATUS = '$prodStatus',PRODUTO_tMATERIAL = '$material' WHERE PRODUTO_nID = $idProd";

        if (ProdutoDAL::$connection->sqlNoTransact($sql)) {

            $sql = "DELETE FROM PRODUTO_CATEGORIA WHERE PRODUTO_nID = $idProd";

            ProdutoDAL::$connection->executarSQL($sql);

            foreach ($categID as $cId) {

                $sql = "INSERT INTO PRODUTO_CATEGORIA (CATEGORIA_nID, PRODUTO_nID) VALUES ($cId,$idProd)";
                ProdutoDAL::$connection->executarSQL($sql);
            }

            return $idProd;
        }
    }

    public static function buscaProduto($id = null)
    {
        ProdutoDAL::connect();
        // $prod = new Produto();
        if (!empty($id)) {
            
            // $id = $prod->getIdProd();

            $sql = " SELECT * FROM PRODUTO
                                WHERE PRODUTO_cSTATUS LIKE 'Ativo' and PRODUTO_nID = $id order by PRODUTO_tsCRIACAO DESC";

        } else {
            $sql = "SELECT * FROM PRODUTO order by PRODUTO_tsCRIACAO DESC";
        }

        ProdutoDAL::$connection->executarSQL($sql);

        $resultados = ProdutoDAL::$connection->getResultados();

        $arrayProd = array();

        foreach ($resultados as $resultado) {

            $resultProduto = new Produto();

            $resultProduto->setIdProd($resultado['PRODUTO_nID']);
            $resultProduto->setDescProd($resultado['PRODUTO_cDESC']);
            $resultProduto->setDescCompletaProd($resultado['PRODUTO_cDESCCOMPLETA']);
            $resultProduto->setStatusProd($resultado['PRODUTO_cSTATUS']);
            $resultProduto->setMaterial($resultado['PRODUTO_tMATERIAL']);

            $csql =
                "SELECT MODELO_cNOME, MODELO_nID, MODELO_nVLR_VENDA, MODELO_nSTATUS, MODELO_nDESCONTO, MODELO_nQTD_ESTOQUE,
                    COR_nID, MODELO.TAMANHO_nID,TAMANHO_cDESC, TAMANHO.TAMANHO_cTAMANHO AS descTamanho, MODELO.PRODUTO_nID, 
                    fn_buscaDescCor(COR_nID) as descCor, fn_buscaHexCor(COR_nID) as hexCor FROM MODELO
                            INNER JOIN PRODUTO ON PRODUTO.PRODUTO_nID = MODELO.PRODUTO_nID
                            INNER JOIN TAMANHO ON MODELO.TAMANHO_nID = TAMANHO.TAMANHO_nID
                                WHERE PRODUTO_cSTATUS LIKE 'Ativo' and MODELO_nSTATUS like 'Ativo' and 
                                MODELO_nQTD_ESTOQUE > 0 and PRODUTO.PRODUTO_nID =$id";


            ProdutoDAL::$connection->executarSQL($csql);

            $resultadosMod = ProdutoDAL::$connection->getResultados();


            foreach ($resultadosMod as $rsM) {
                $modelo = new Modelo();
                $modelo->setIdModelo($rsM['MODELO_nID']);
                $modelo->setNomeModelo($rsM['MODELO_cNOME']);
                $modelo->setVlrVendaModelo($rsM['MODELO_nVLR_VENDA']);
                $modelo->setStatusModelo($rsM['MODELO_nSTATUS']);
                $modelo->setDescProduto($rsM['MODELO_nDESCONTO']);
                $modelo->setQtdEstoqueModelo($rsM['MODELO_nQTD_ESTOQUE']);
                $modelo->setCormodelo($rsM['COR_nID']);
                $modelo->setTamanhoModelo($rsM['TAMANHO_nID']);
                $modelo->setProdutoIdModelo($rsM['PRODUTO_nID']);
                $modelo->setDescCor($rsM['descCor']);
                $modelo->setDescTamanho($rsM['descTamanho']);
                $modelo->setHexCor($rsM['hexCor']);
                $modelo->setDescTamanhoCompleto($rsM['TAMANHO_cDESC']);


                $resultProduto->setModelo($modelo);


            }

            $arrayProd[] = $resultProduto;
        }

        return $arrayProd;
    }


    public static function buscaProdutoCategoria($id)
    {
        ProdutoDAL::connect();
            // $id = $prod->getIdProd();

        $sql = " SELECT * FROM PRODUTO
                        WHERE PRODUTO_cSTATUS LIKE 'Ativo' and PRODUTO_nID = $id";


        ProdutoDAL::$connection->executarSQL($sql);

        $resultados = ProdutoDAL::$connection->getResultados();

        $arrayProd = array();

        foreach ($resultados as $resultado) {

            $resultProduto = new Produto();

            $resultProduto->setIdProd($resultado['PRODUTO_nID']);
            $resultProduto->setDescProd($resultado['PRODUTO_cDESC']);
            $resultProduto->setDescCompletaProd($resultado['PRODUTO_cDESCCOMPLETA']);
            $resultProduto->setStatusProd($resultado['PRODUTO_cSTATUS']);
            $resultProduto->setMaterial($resultado['PRODUTO_tMATERIAL']);

            $csql =
                "SELECT C.CATEGORIA_nID as cNid, C.CATEGORIA_cDESC as cDesc from PRODUTO_CATEGORIA PC
                 INNER JOIN CATEGORIA C ON C.CATEGORIA_nID = PC.CATEGORIA_nID 
                 WHERE CATEGORIA_cSTATUS = 'ATIVO' AND PC.PRODUTO_nID = $id";


            ProdutoDAL::$connection->executarSQL($csql);

            $resultadosCat = ProdutoDAL::$connection->getResultados();


            foreach ($resultadosCat as $rsC) {
                $categoria = new Categoria();

                $categoria->setIdCateg($rsC['cNid']);
                $categoria->setDescCateg($rsC['cDesc']);

                $resultProduto->setCategoria($categoria);
            }

            $arrayProd[] = $resultProduto;
        }

        return $arrayProd;
    }

    public static function deletaProduto(Produto $prod) : string
    {
        ProdutoDAL::connect();
        $idProd = $prod->getIdProd();
        $sql = "DELETE FROM PRODUTO WHERE PRODUTO_nID = $idProd";

        try {
            ProdutoDAL::$connection->executarSQL($sql);
        } catch (Exception $e) {
            echo $e;
        }
    }
}