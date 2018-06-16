<?php
require_once __DIR__ . '/../model/Venda.php';
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

    public static function abreVenda(Venda $venda): string
    {
        VendaDAL::connect();

        // $dtCompra = $venda->getIdVenda();
        $idCli = $venda->getIdCli();
        $totalVenda = $venda->getVlrTotalVenda();
        $statusVenda = $venda->getStatusVenda();
        $CodRastVenda = $venda->getCodRastVenda();

        // exemplo de chamada de procedure
        $sql = "INSERT VENDA (VENDA_nVLRTOTALVENDA, VENDA_dtDTCOMPRA, VENDA_cCODRASTREIO, VANDA_cSTATUS, CLI_nCOD) VALUES ( $totalVenda,  NOW(), '$CodRastVenda', '$statusVenda', $idCli)";
        
        echo $sql;

        return VendaDAL::$connection->sqlNoTransact($sql);
        
        // return VendaDAL::$connection->returnID();
    }

    public static function insereClienteVenda(Venda $venda)
    {
        VendaDAL::connect();
        
        $idVenda = $venda->getIdVenda();
        $idCli = $venda->getIdCli();
        
        $sql = "";
        
        VendaDAL::$connection->executarSQL($sql);
        
        return VendaDAL::$connection->returnID();
    }

    public static function insereVendaStatus(Venda $venda)
    {
        VendaDAL::connect();
        
        $idStatus = $venda->getIdStatus();
        $idVenda = $venda->getIdVenda();
        $dtAtualizacao = $venda->getDtAtualizacaoVenda();
        
        $sql = "";
        
        VendaDAL::$connection->executarSQL($sql);
        
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

    public static function alteraVendaStatus(Venda $venda): string
    {
        VendaDAL::connect();
        
        $idStatus = $venda->getIdStatus();
        $idVenda = $venda->getIdVenda();
        $dtAtualizacao = $venda->getDtAtualizacaoVenda();
        
        $sql = "";
        
        return $connection->executarSQL($sql);
    }

    public static function insereVendaProduto(Venda $venda, Produto $prod): string
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
