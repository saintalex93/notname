<?php
require_once '../model/Venda.php';
require_once '../model/Produto.php';
require_once '../library/Conexao.class.php';

class VendaDAL
{

    public static function efetuaVenda(Venda $venda): string
    {
        $connection = new Database();
        
        $idCli = $venda->getIdCli();
        $totalVenda = $venda->getVlrTotalVenda();
        $dtCompra = $venda->getIdVenda();
        
        //exemplo de chamada de procedure
        $sql = "CALL atualizando_Dados (‘$action’, ‘$tipoDados’, ‘$numComparativo’, ‘$codProduto’, ‘$valor’, ‘$nomeConcorrente’,‘$obs’, ‘$registro’)";
        
        $connection->executarSQL($sql);
    }

    public static function insereClienteVenda(Venda $venda): string
    {
        $connection = new Database();
        
        $idVenda = $venda->getIdVenda();
        $idCli = $venda->getIdCli();
        
        $sql = "";
        
        return $connection->executarSQL($sql);
    }

    public static function insereVendaStatus(Venda $venda): string
    {
        $connection = new Database();
        
        $idStatus = $venda->getIdStatus();
        $idVenda = $venda->getIdVenda();
        $dtAtualizacao = $venda->getDtAtualizacaoVenda();
        
        $sql = "";
        
        return $connection->executarSQL($sql);
    }

    public static function buscaVenda(Venda $venda): array
    {
        $connection = new Database();
        
        $sql = "";
        
        $resultado = $connection->executarSQL($sql);
        
        $arrayVenda = array();
        
        foreach ($restulado as $resultado) {
            $venda->setIdVenda($resultado['VENDA_nID']);
            $venda->setVlrTotalVenda($resultado['VENDA_nVLRTOTALVENDA']);
            $venda->setDtCompraVenda($resultado['VENDA_dtDTCOMPRA']);
            $venda->setCodRastVenda($resultado['VENDA_cCODRASTREIO']);
            $venda->setIdVendaStatus($resultado['VENDA_STA_nID']);
            $venda->setDtAtualizacaoVenda($resultado['VENDA_STATUS_dDT_ATUALIZACAO']);
            
            $arrayVenda[] = $venda;
        }
        return $arrayVenda;
    }

    public static function alteraVendaStatus(Venda $venda): string
    {
        $connection = new Database();
        
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
        
        return $connection->executarSQL($sql);
    }
}
