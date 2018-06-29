<?php
require_once __DIR__ . '/../library/Conexao.class.php';

class VendaPainelCountDAL{
    /**
     *
     * @var Database
     */
    private static $connection = null;

    private static function connect()
    {
    	if (is_null(VendaPainelCountDAL::$connection)) {
    		VendaPainelCountDAL::$connection = new Database();
    	}
    }



    public static function recuperaVendaAberta()
    {
    	VendaPainelCountDAL::connect();

    	$sql = "SELECT 
    	(SELECT SUM(VENDA_nVLRTOTALVENDA) FROM VENDA) AS VALOR_VENDA,
    	(SELECT count(*) FROM VENDA) AS NUMERO_VENDAS,
    	(SELECT COUNT(DISTINCT CLI_nCOD) FROM VENDA) AS CLI_VENDAS,
    	(SELECT COUNT(*) FROM VENDA_MODELO INNER JOIN VENDA ON VENDA.VENDA_nID = VENDA_MODELO.VENDA_nID) AS NUMERO_MODELOS";


    	VendaPainelCountDAL::$connection->sqlNoTransact($sql);

    	$restulado = VendaPainelCountDAL::$connection->getResultados();

    	return $restulado;
    }

    public static function vendasPainel()
    {
    	VendaPainelCountDAL::connect();

    	$sql = "SELECT VENDA_nID, CLI_cNOME, (VENDA_nVLRTOTALVENDA + VENDA_nVLRFRETE) AS TOTAL, 
    	VENDA_cSTATUS,(SELECT COUNT(*) FROM VENDA_MODELO VM WHERE VM.VENDA_nID = VENDA.VENDA_nID) AS QUANTIDADE FROM VENDA 
    	INNER JOIN CLIENTE C ON C.CLI_nCOD = VENDA.CLI_nCOD";


    	VendaPainelCountDAL::$connection->sqlNoTransact($sql);

    	$restulado = VendaPainelCountDAL::$connection->getResultados();

    	return $restulado;
    }

}



?>