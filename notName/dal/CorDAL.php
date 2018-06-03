<?php
require_once __DIR__ . '/../model/Cor.php';
require_once __DIR__ . '/../library/Conexao.class.php';

class CorDAL
{
    
    /**
     *
     * @var Database
     */
    private static $connection = null;
    
    private static function connect()
    {
        if (is_null(CorDAL::$connection)) {
            CorDAL::$connection = new Database();
        }
    }
    
    public static function insereCor(Cor $Cor): string
    {
        CorDAL::connect();
        
        $descCor = $Cor->getDescCor();
        $hexCor = $Cor->getHexCor();
        
        $sql = "INSERT INTO COR VALUES (0, '$siglaCor', '$hexCor')";
        return CorDAL::$connection->executarSQL($sql);
    }
    
    public static function alteraCor(Cor $Cor): string
    {
        CorDAL::connect();
        $idCor = $Cor->getIdCor();
        $descCor = $Cor->getDescCor();
        $hexCor = $Cor->getHexCor();
                
        $sql = "";
        
        return CorDAL::$connection->executarSQL($sql);
    }
    
    public static function buscaCor(): array
    {
        CorDAL::connect();
        
        $sql = "SELECT * FROM COR ORDER BY COR_cDESC ASC";
        
        CorDAL::$connection->executarSQL($sql);
        
        $resultados = CorDAL::$connection->getResultados();
        
        $arrayCor = array();
        
        foreach ($resultados as $resultado) {
            $Cor = new Cor();
            
            $id = $resultado['COR_nID'];
            $descricao = $resultado['COR_cDESC'];
            $hexa = $resultado['COR_cHEX'];
            
            $Cor->setIdCor($id);
            $Cor->setDescCor($descricao);
            $Cor->setHexCor($hexa);
            
            $arrayCor[] = $Cor;
        }
        return $arrayCor;
    }
}
