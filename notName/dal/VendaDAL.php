<?php
require_once __DIR__ . '/../model/Venda.php';
require_once __DIR__ . '/../model/Modelo.php';
require_once __DIR__ . '/../library/Conexao.class.php';


class VendaDAL
{

    /**
     *
     * @var Database
     */
    private static $connection = null;

    private static function connect()
    {
        if (is_null(VendaDAL::$connection)) {
            VendaDAL::$connection = new Database();
        }
    }

    public static function recuperaVendaAberta(Venda $venda)
    {
        VendaDAL::connect();

        $idCli = $venda->getIdCli();

        $sql = "SELECT * FROM VENDA WHERE VENDA_cSTATUS LIKE 'PENDENTE' AND CLI_nCOD = $idCli";

        VendaDAL::$connection->sqlNoTransact($sql);

        $restulado = VendaDAL::$connection->getResultados();

        if ($restulado) {

            foreach ($restulado as $resultado) {

                $resultVenda = new Venda();

                $resultVenda->setIdVenda($resultado['VENDA_nID']);
                $resultVenda->setVlrTotalVenda($resultado['VENDA_nVLRTOTALVENDA']);
                $resultVenda->setDtCompraVenda($resultado['VENDA_dtDTCOMPRA']);
                $resultVenda->setCodRastVenda($resultado['VENDA_cCODRASTREIO']);
                $resultVenda->setStatusVenda($resultado['VENDA_cSTATUS']);
                $resultVenda->setIdCli($resultado['CLI_nCOD']);


                $arrayVenda[] = $resultVenda;
            }
            return $arrayVenda;

        } else {
            return false;
        }
    }

    public static function abreVenda(Venda $venda) : string
    {
        VendaDAL::connect();

        $idCli = $venda->getIdCli();
        $totalVenda = $venda->getVlrTotalVenda();
        $statusVenda = $venda->getStatusVenda();
        $CodRastVenda = $venda->getCodRastVenda();

        $sql = "INSERT VENDA (VENDA_nVLRTOTALVENDA, VENDA_dtDTCOMPRA, VENDA_cCODRASTREIO, VENDA_cSTATUS, CLI_nCOD) VALUES ( 0.00,  NOW(), NULL, 'PENDENTE', $idCli)";

        VendaDAL::$connection->sqlNoTransact($sql);

        return VendaDAL::$connection->returnID();
    }


    public static function buscaVenda(Venda $venda) : array
    {
        VendaDAL::connect();

        $sql = "";

        VendaDAL::$connection->executarSQL($sql);

        $resultado = VendaDAL::$connection->getResultados();

        $arrayVenda = array();

        foreach ($restulado as $resultado) {

            $resultVenda = new Venda();

            $resultVenda->setIdVenda($resultado['VENDA_nID']);
            $resultVenda->setVlrTotalVenda($resultado['VENDA_nVLRTOTALVENDA']);
            $resultVenda->setDtCompraVenda($resultado['VENDA_dtDTCOMPRA']);
            $resultVenda->setCodRastVenda($resultado['VENDA_cCODRASTREIO']);
            $resultVenda->setIdVendaStatus($resultado['VENDA_STA_nID']);
            $resultVenda->setDtAtualizacaoVenda($resultado['VENDA_STATUS_dDT_ATUALIZACAO']);

            $arrayVenda[] = $resultVenda;
        }
        return $arrayVenda;
    }


    public static function insereModeloVenda(Venda $venda, Modelo $modelo)
    {
        VendaDAL::connect();

        // $modelo->setQuantidadeVendaModelo(1);

        // $venda = new Venda();
        // $modelo = new Modelo();

        $idVenda = $venda->getIdVenda();
        $idModelo = $modelo->getIdModelo();
        $qdtVendida = $modelo->getQuantidadeVendaModelo();
        $valorModelo = $modelo->getVlrVendaModelo();

        $sql = "CALL USP_VENDA_MODELO($idModelo, $idVenda, $qdtVendida, $valorModelo)";

       VendaDAL::$connection->executaProcedure($sql);

        $result = VendaDAL::$connection->getResultados();

       if($result){
        return $result;
       }
       else{
        return false;
       }
    }

    public static function recuperaCarrinho($id_venda)
    {
        VendaDAL::connect();

        $sql = "SELECT COUNT(VENDA_nID) as COUNT_MODELOS FROM VENDA_MODELO WHERE VENDA_nID = $id_venda";

        VendaDAL::$connection->sqlNoTransact($sql);

        $result = VendaDAL::$connection->getResultados();

       return $result[0][0];
    }

    public static function apagaModeloVenda(Venda $venda, Modelo $prod) : string
    {
        $connection = new Database();

        $venda->getIdVenda();
        $prod->getIdProd();
        $venda->getDTSeparacaoVendaProduto();
        $venda->getQtdeVendaProduto();

        $sql = "";

        VendaDAL::$connection->executarSQL($sql);

        return VendaDAL::$connection->returnID();
    }
}
