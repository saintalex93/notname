<?php
require_once __DIR__ . '/../library/Conexao.class.php';

class PainelDAL{
    /**
     *
     * @var Database
     */
    private static $connection = null;

    private static function connect()
    {
    	if (is_null(PainelDAL::$connection)) {
    		PainelDAL::$connection = new Database();
    	}
    }



    public static function recuperaVendaAberta()
    {
    	PainelDAL::connect();

    	$sql = "SELECT 
    	(SELECT SUM(VENDA_nVLRTOTALVENDA) FROM VENDA) AS VALOR_VENDA,
    	(SELECT count(*) FROM VENDA) AS NUMERO_VENDAS,
    	(SELECT COUNT(DISTINCT CLI_nCOD) FROM VENDA) AS CLI_VENDAS,
    	(SELECT COUNT(*) FROM VENDA_MODELO INNER JOIN VENDA ON VENDA.VENDA_nID = VENDA_MODELO.VENDA_nID) AS NUMERO_MODELOS";


    	PainelDAL::$connection->sqlNoTransact($sql);

    	$restulado = PainelDAL::$connection->getResultados();

    	return $restulado;
    }

    public static function vendasPainel()
    {
    	PainelDAL::connect();

    	$sql = "SELECT VENDA_nID, CLI_cNOME, (VENDA_nVLRTOTALVENDA + VENDA_nVLRFRETE) AS TOTAL, 
    	VENDA_cSTATUS,(SELECT COUNT(*) FROM VENDA_MODELO VM WHERE VM.VENDA_nID = VENDA.VENDA_nID) AS QUANTIDADE FROM VENDA 
    	INNER JOIN CLIENTE C ON C.CLI_nCOD = VENDA.CLI_nCOD";


    	PainelDAL::$connection->sqlNoTransact($sql);

    	$restulado = PainelDAL::$connection->getResultados();

    	return $restulado;
    }

     public static function insereEmail($email)
    {
        PainelDAL::connect();

        $sql = "INSERT INTO MAILMARKETING VALUES (0, '$email')";

        PainelDAL::$connection->sqlNoTransact($sql);

        $resultado = PainelDAL::$connection->returnID();

        if($resultado){
            return true;
        }
        else{
            return false;
        }
    }

}



?>