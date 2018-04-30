<?php
require_once '../model/Venda.php';
require_once '../library/Conexao.class.php';

class VendaDAL
{

    public static function efetuaVenda(Venda $venda): string
    {
        $connection = new Database();
        
        $idCli = $venda->getIdCli();
        $totalVenda = $venda->getVlrTotalVenda();
        $dtCompra = $venda->getIdVenda();
        
        $sql = "";
        
        $connection->executarSQL($sql);
        
        $idVenda = $connection->insert_id;
        
        $venda->setIdVenda($idVenda);
    }

    public static function insereClienteVenda(Venda $venda): string
    {
        $connection = new Database();
        
        $idVenda = $venda->getIdVenda();
        $idCli = $venda->getIdCli();
        
        $sql = "";
        
        return $connection->executarSQL($sql);
    }
}
