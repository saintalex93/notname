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
}