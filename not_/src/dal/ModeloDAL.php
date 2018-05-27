<?php
require_once '../model/Modelo.php';
require_once '../library/Conexao.class.php';

class ModeloDAL
{

    /**
     *
     * @var Database
     */
    private static $connection = null;

    private static function connect()
    {
        if (is_null(ModeloDAL::$connection)) {
            ModeloDAL::$connection = new Database();
        }
    }

    public static function insereModelo(Modelo $mod): string
    
    {
        ModeloDAL::connect();
        
        $nomeMod = $mod->getNomeModelo();
        $tamanhoMod = $mod->getTamanhoModelo();
        $corMod = $mod->getCormodelo();
        $vlrVendaMod = $mod->getVlrVendaModelo();
        $statusMod = $mod->getStatusModelo();
        $vlrCompraMod = $mod->getVlrCompraModelo();
        $dataCompraMod = $mod->getDtCompraModelo();
        $descontoMod = $mod->getDescontoModelo();
        $qtdeEstMod = $mod->getQtdEstoqueModelo();
        
        $sql = "";
        
        ModeloDAL::$connection->executarSQL($sql);
        
        return ModeloDAL::$connection->returnID();
    }

    public static function buscaModelo(Modelo $mod): array
    {
        ModeloDAL::connect();
        
        $sql = "";
        
        ModeloDAL::$connection->executarSQL($sql);
        
        $resultado = ModeloDAL::$connection->getResultados();
        
        $arrayModelo = array();
        
        foreach ($resultadoo as $resultado) {
            
            $resultModelo = new Modelo();
            
            $resultModelo->setIdModelo($resultado['MODELO_nID']);
            $resultModelo->setNomeModelo($resultado['MODELO_cNOME']);
            $resultModelo->setTamanhoModelo($resultado['MODELO_cTAMANHO']);
            $resultModelo->setCormodelo($resultado['MODELO_cCOR']);
            $resultModelo->setVlrVendaModelo($resultado['MODELO_nVLR_VENDA']);
            $resultModelo->setStatusModelo($resultado['MODELO_nSTATUS']);
            $resultModelo->setVlrCompraModelo($resultado['MODELO_nVLR_COMPRA']);
            $resultModelo->setDtCompraModelo($resultado['MODELO_dDATA_COMPRA']);
            $resultModelo->setDescontoModelo($resultado['MODELO_nDESCONTO']);
            $resultModelo->setQtdEstoqueModelo('MODELO_nQTD_ESTOQUE');
            
            $arrayModelo = $resultModelo;
        }
        
        return $arrayModelo;
    }

    public static function atualizaModelo(Modelo $mod): string
    {
        ModeloDAL::connect();
        
        $sql = "";
        
        ModeloDAL::$connection->executarSQL($sql);
        
        return ModeloDAL::$connection->returnID();
    }
}