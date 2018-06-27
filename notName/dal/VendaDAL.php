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
                $resultVenda->setFrete($resultado['VENDA_cFRETE']);
                $resultVenda->setVlrFrete($resultado['VENDA_nVLRFRETE']);
                $resultVenda->setFormaPagamento($resultado['VENDA_cFORMA_PAGAMENTO']);

                $arrayVenda[] = $resultVenda;
            }
            return $arrayVenda;

        } else {
            return false;
        }
    }

    public static function abreVenda(Venda $venda): string
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

    public static function atualizaVenda(Venda $venda, $tipo) : bool
    {
        VendaDAL::connect();

        if($tipo == "Entrega"){

            $idVenda = $venda->getIdVenda();
            $frete = $venda->getFrete();
            $valorFrete = $venda->getVlrFrete();
            
            $sql = "UPDATE VENDA SET VENDA_cFRETE = '$frete' , VENDA_nVLRFRETE = $valorFrete WHERE VENDA_nID = $idVenda";

        }

        else{

        }

        $result = VendaDAL::$connection->sqlNoTransact($sql);

        // return VendaDAL::$connection->returnID();
        if($result){
            return true;
        }
        else{
            return false;
        }
    }

    public static function buscaVenda(Venda $venda)
    {
        VendaDAL::connect();

        $idCliente = $venda->getIdCli();

        $sql = "SELECT *, count(M.MODELO_nID) as QDT_MODELO FROM VENDA V
                    INNER JOIN VENDA_MODELO VM ON V.VENDA_nID = VM.VENDA_nID
                    INNER JOIN MODELO M ON M.MODELO_nID = VM.MODELO_nID
                    WHERE V.VENDA_nID = $idCliente AND VENDA_cSTATUS LIKE 'PENDENTE' GROUP BY M.MODELO_nID";

        VendaDAL::$connection->executarSQL($sql);

        $resultado = VendaDAL::$connection->getResultados();

        if (!$resultado) {
            return false;
        }

        $arrayVenda = array();

        foreach ($resultado as $resultado) {

            $resultVenda = new Venda();

            $resultVenda->setIdVenda($resultado['VENDA_nID']);
            $resultVenda->setIdVendaModelo($resultado['VENDA_MODELO_nID']);
            $resultVenda->setVlrTotalVenda($resultado['VENDA_nVLRTOTALVENDA']);
            $resultVenda->setDtCompraVenda($resultado['VENDA_dtDTCOMPRA']);
            $resultVenda->setCodRastVenda($resultado['VENDA_cCODRASTREIO']);
            $resultVenda->setStatusVenda($resultado['VENDA_cSTATUS']);
            $resultVenda->setDtCompraVenda($resultado['VENDA_dtDTCOMPRA']);
            $resultVenda->setFrete($resultado['VENDA_cFRETE']);
            $resultVenda->setVlrFrete($resultado['VENDA_nVLRFRETE']);
            $resultVenda->setFormaPagamento($resultado['VENDA_cFORMA_PAGAMENTO']);

            $modelo = new Modelo();

            $modelo->setIdModelo($resultado['MODELO_nID']);
            $modelo->setNomeModelo($resultado['MODELO_cNOME']);
            $modelo->setVlrVendaModelo($resultado['MODELO_nVLR_VENDA']);
            $modelo->setDescontoModelo($resultado['MODELO_nDESCONTO']);
            $modelo->setQuantidadeVendaModelo($resultado['QDT_MODELO']);
            $modelo->setProdutoIdModelo($resultado['PRODUTO_nID']);
            $modelo->setCormodelo($resultado['COR_nID']);
            $modelo->setQtdEstoqueModelo($resultado['MODELO_nQTD_ESTOQUE']);
            $modelo->setStatusModelo($resultado['MODELO_nSTATUS']);
            $modelo->setTamanhoModelo($resultado['TAMANHO_nID']);

            $resultVenda->setModelo($modelo);

            $arrayVenda[] = $resultVenda;
        }
        return $arrayVenda;
    }

    public static function buscaVendaCarrinho(Venda $venda)
    {
        VendaDAL::connect();

        $idCliente = $venda->getIdCli();

        $sql = "SELECT * FROM VENDA V
                    INNER JOIN VENDA_MODELO VM ON V.VENDA_nID = VM.VENDA_nID
                    INNER JOIN MODELO M ON M.MODELO_nID = VM.MODELO_nID
                    WHERE V.VENDA_nID = $idCliente AND VENDA_cSTATUS LIKE 'PENDENTE'";

        VendaDAL::$connection->executarSQL($sql);

        $resultado = VendaDAL::$connection->getResultados();

        if (!$resultado) {
            return false;
        }

        $arrayVenda = array();

        foreach ($resultado as $resultado) {

            $resultVenda = new Venda();

            $resultVenda->setIdVenda($resultado['VENDA_nID']);
            $resultVenda->setIdVendaModelo($resultado['VENDA_MODELO_nID']);
            $resultVenda->setVlrTotalVenda($resultado['VENDA_nVLRTOTALVENDA']);
            $resultVenda->setDtCompraVenda($resultado['VENDA_dtDTCOMPRA']);
            $resultVenda->setCodRastVenda($resultado['VENDA_cCODRASTREIO']);
            $resultVenda->setStatusVenda($resultado['VENDA_cSTATUS']);
            $resultVenda->setDtCompraVenda($resultado['VENDA_dtDTCOMPRA']);
            $resultVenda->setFrete($resultado['VENDA_cFRETE']);
            $resultVenda->setVlrFrete($resultado['VENDA_nVLRFRETE']);
            $resultVenda->setFormaPagamento($resultado['VENDA_cFORMA_PAGAMENTO']);

            $modelo = new Modelo();

            $modelo->setIdModelo($resultado['MODELO_nID']);
            $modelo->setNomeModelo($resultado['MODELO_cNOME']);
            $modelo->setVlrVendaModelo($resultado['MODELO_nVLR_VENDA']);
            $modelo->setDescontoModelo($resultado['MODELO_nDESCONTO']);
            $modelo->setProdutoIdModelo($resultado['PRODUTO_nID']);
            $modelo->setCormodelo($resultado['COR_nID']);
            $modelo->setQtdEstoqueModelo($resultado['MODELO_nQTD_ESTOQUE']);
            $modelo->setStatusModelo($resultado['MODELO_nSTATUS']);
            $modelo->setTamanhoModelo($resultado['TAMANHO_nID']);

            $resultVenda->setModelo($modelo);

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

        if ($result) {
            return $result;
        } else {
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

    public static function apagaModeloVenda(Venda $venda): string
    {
        VendaDAL::connect();

        $vendaModelo = $venda->getModelo()[0]->getIdModelo();
        $vendaId = $venda->getIdVenda();
        $vendaModeloId = $venda->getIdVendaModelo();
        /*
        PROCEDURE: ID_MODELO, ID_VENDA, ID_VENDA_MODELO
         */
        $sql = "CALL USP_DELETA_MODELO($vendaModelo,$vendaId,$vendaModeloId)";

        VendaDAL::$connection->executaProcedure($sql);

        $resulta = VendaDAL::$connection->getResultados();

        return $resulta[0]["RESULT"];

    }
}
