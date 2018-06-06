<?php
require_once __DIR__ . '/../model/Modelo.php';
require_once __DIR__ . '/../library/Conexao.class.php';

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
        $vlrVendaMod = $mod->getVlrVendaModelo();
        $statusMod = $mod->getStatusModelo();
        $descontoMod = $mod->getDescontoModelo();
        $qtdeEstMod = $mod->getQtdEstoqueModelo();
        $corMod = $mod->getCormodelo();
        $tamanhoMod = $mod->getTamanhoModelo();
        $produtoIdModelo = $mod->getProdutoIdModelo();
        
        $sql = "INSERT INTO MODELO (MODELO_cNOME, MODELO_nVLR_VENDA, MODELO_nSTATUS, MODELO_nDESCONTO, MODELO_nQTD_ESTOQUE,
 COR_nID, TAMANHO_nID, PRODUTO_nID) 
VALUES ('$nomeMod', $vlrVendaMod, '$statusMod', $descontoMod, $qtdeEstMod, $corMod, $tamanhoMod,$produtoIdModelo)";
        
        if (ModeloDAL::$connection->sqlNoTransact($sql)) {
            
            $id = ModeloDAL::$connection->returnID();
            
            return $id;
        }
    }

    public static function buscaModeloTabela()
    {
        ModeloDAL::connect();
        
        $sql = "select *,
 fn_buscaDescTamanho(TAMANHO_nID) as descTamanho, fn_buscaDescProduto(PRODUTO_nID) as descProduto, fn_buscaDescCor(COR_nID) as descCor 
 from MODELO";
        
        ModeloDAL::$connection->executarSQL($sql);
        
        $resultado = ModeloDAL::$connection->getResultados();
        
        $arrayModelo = array();
        
        foreach ($resultado as $resul) {
            
            $resultModelo = new Modelo();
            
            $resultModelo->setIdModelo($resul['MODELO_nID']);
            $resultModelo->setNomeModelo($resul['MODELO_cNOME']);
            $resultModelo->setVlrVendaModelo($resul['MODELO_nVLR_VENDA']);
            $resultModelo->setStatusModelo($resul['MODELO_nSTATUS']);
            $resultModelo->setDescontoModelo($resul['MODELO_nDESCONTO']);
            $resultModelo->setQtdEstoqueModelo($resul['MODELO_nQTD_ESTOQUE']);
            $resultModelo->setCormodelo($resul['COR_nID']);
            $resultModelo->setTamanhoModelo($resul['TAMANHO_nID']);
            $resultModelo->setProdutoIdModelo($resul['PRODUTO_nID']);
            
            $resultModelo->setDescCor($resul['descCor']);
            $resultModelo->setDescProduto($resul['descProduto']);
            $resultModelo->setDescTamanho($resul['descTamanho']);
            
            $arrayModelo[] = $resultModelo;
        }
        
        return $arrayModelo;
    }

    public static function buscaModelo(Modelo $mod): array
    {
        ModeloDAL::connect();
        
        $sql = "select * from MODELO";
        
        ModeloDAL::$connection->executarSQL($sql);
        
        $resultado = ModeloDAL::$connection->getResultados();
        
        $arrayModelo = array();
        
        foreach ($resultado as $resultado) {
            
            $resultModelo = new Modelo();
            
            $resultModelo->setIdModelo($resultado['MODELO_nID']);
            $resultModelo->setNomeModelo($resultado['MODELO_cNOME']);
            $resultModelo->setVlrVendaModelo($resultado['MODELO_nVLR_VENDA']);
            $resultModelo->setStatusModelo($resultado['MODELO_nSTATUS']);
            $resultModelo->setDescontoModelo($resultado['MODELO_nDESCONTO']);
            $resultModelo->setQtdEstoqueModelo('MODELO_nQTD_ESTOQUE');
            $resultModelo->setCormodelo($resultado['COR_nID']);
            $resultModelo->setTamanhoModelo($resultado['TAMANHO_nID']);
            $resultModelo->setProdutoIdModelo($resultado['PRODUTO_nID']);
            
            $arrayModelo[] = $resultModelo;
        }
        
        return $arrayModelo;
    }
    
    public static function buscaModeloIndex(): array
    {
        ModeloDAL::connect();
        
        $sql = "select * from MODELO 
                  where MODELO_nSTATUS like 'Ativo' and MODELO_nQTD_ESTOQUE > 0
                    group by PRODUTO_nID 
                      order by MODELO_tsCRIACAO DESC limit 4";
        
        ModeloDAL::$connection->executarSQL($sql);
        
        $resultado = ModeloDAL::$connection->getResultados();
        
        $arrayModelo = array();
        
        foreach ($resultado as $resultado) {
            
            $resultModelo = new Modelo();
            
            $resultModelo->setIdModelo($resultado['MODELO_nID']);
            $resultModelo->setNomeModelo($resultado['MODELO_cNOME']);
            $resultModelo->setVlrVendaModelo($resultado['MODELO_nVLR_VENDA']);
            $resultModelo->setStatusModelo($resultado['MODELO_nSTATUS']);
            $resultModelo->setDescontoModelo($resultado['MODELO_nDESCONTO']);
            $resultModelo->setQtdEstoqueModelo('MODELO_nQTD_ESTOQUE');
            $resultModelo->setCormodelo($resultado['COR_nID']);
            $resultModelo->setTamanhoModelo($resultado['TAMANHO_nID']);
            $resultModelo->setProdutoIdModelo($resultado['PRODUTO_nID']);
            
            $arrayModelo[] = $resultModelo;
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

    public static function removeModelo(Modelo $mod)
    {
        ModeloDAL::connect();
        
        
        
        $sql = "DELETE FROM MODELO WHERE MODELO_nID = {$mod->getIdModelo()}";
        
        if(!ModeloDAL::$connection->executarSQL($sql)){
          return "Erro ao deletar modelo";  
        }
    }
}