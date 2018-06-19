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

    public static function recuperaVendaAberta(Venda $venda): array
    {
        VendaDAL::connect();

        $idCli = $venda->getIdCli();
        
        $sql = "SELECT VENDA_nID FROM VENDA WHERE VENDA_cSTATUS LIKE 'PENDENTE' AND CLI_nCOD = $idCli";
        

        VendaDAL::$connection->sqlNoTransact($sql);
        
        return VendaDAL::$connection->getResultados();
    }

    public static function abreVenda(Venda $venda): string
    {
        VendaDAL::connect();

        $idCli = $venda->getIdCli();
        $totalVenda = $venda->getVlrTotalVenda();
        $statusVenda = $venda->getStatusVenda();
        $CodRastVenda = $venda->getCodRastVenda();

        $sql = "INSERT VENDA (VENDA_nVLRTOTALVENDA, VENDA_dtDTCOMPRA, VENDA_cCODRASTREIO, VENDA_cSTATUS, CLI_nCOD) VALUES ( 0.00,  NOW(), 'xxx', 'PENDENTE', $idCli)";
        
        return VendaDAL::$connection->sqlNoTransact($sql);
        
        return VendaDAL::$connection->returnID();
    }


    public static function buscaVenda(Venda $venda): array
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


    public static function insereModeloVenda(Venda $venda, Modelo $modelo): string
    {
        VendaDAL::connect();

        $venda = new Venda();
        $modelo = new Modelo();
        
        $idVenda = $venda->getIdVenda();
        $idModelo = $modelo->getIdModelo();
        $qdtVendida = $modelo->getQuantidadeVendaModelo();
        $valorModelo = $modelo->getVlrVendaModelo();

        
        $sql = "INSERT INTO VENDA_MODELO (VENDA_MODELO_tsDT_SEPARACAO, VENDA_MODELO_QDTE, VENDA_MODELO_dVLR_MODELO, 
        VENDA_nID, MODELO_nID)
        VALUES(NOW(), $qdtVendida, $valorModelo, $idVenda, $idModelo)";
        
        VendaDAL::$connection->executarSQL($sql);
        
        return VendaDAL::$connection->returnID();
    }

    public static function apagaModeloVenda(Venda $venda, Modelo $prod): string
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
